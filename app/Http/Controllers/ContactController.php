<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Ad;
use App\Models\User;
use App\Models\AdsImage;
use App\Models\Contact; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

// use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

class ContactController extends Controller
{
    /**
     * Get ads data for a specific user.
     *
     * @param int $userId
     * @return array
     */
    private function getUserAdsData($userId)
    {
        $viewAdsCount = Ad::where('users_id', $userId)->count();
        $activeAdsCount = Ad::where('users_id', $userId)
                            ->where('ad_status', 'Active')
                            ->count();

        Log::info('$activeAdsCount: ' . $activeAdsCount);
        $ads = Ad::with('images')
                    ->where('users_id', $userId)
                    ->get();

        return compact('ads', 'viewAdsCount', 'activeAdsCount');
    }

public function adminIndex(){
    $user = Auth::user();
    $data = $this->getUserAdsData($user->id);
    return view('admin.index', $data);
}

    public function index()
    {
            $users = User::all()->map(function ($user) {
            $userAdsData = $this->getUserAdsData($user->id);
            $user->activeAdsCount = $userAdsData['activeAdsCount'];
            $user->inactiveAdsCount = $userAdsData['viewAdsCount'] - $userAdsData['activeAdsCount'];
            return $user;
        });
        return view('admin.index', [
            'users' => $users,
        ]);
    }

    public function showContactForm()
    {
        return view('contact');
    }

    
    
  
    public function save(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            // Create a new Contact model instance
            $contact = new Contact();
            $contact->name = $validatedData['name'];
            $contact->email = $validatedData['email'];
            $contact->subject = $validatedData['subject'];
            $contact->message = $validatedData['message'];

            // Save the contact to the database
            $contact->save();

            // Prepare mail data
            $mailData = [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'subject' => $validatedData['subject'],
                'message' => $validatedData['message']
            ];

            // Send an email to the admin
            Mail::to('naeemahmadm98765@gmail.com')->send(new ContactUs($mailData));

            // Redirect to the contact form with success message
            return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Error sending email: ' . $e->getMessage());

            // Redirect back with input and error message
            return back()->withInput()->withErrors(['email' => 'Error sending email. Please try again later.']);
        }
    }
    
    

    public function adsall($encryptedUserId)
{
    try {
        $userId = Crypt::decrypt($encryptedUserId);
        $user = User::findOrFail($userId);
        $ads = Ad::where('users_id', $userId)->get();

        return view('admin.user_ads', [
            'user' => $user,
            'ads' => $ads,
        ]);
    } catch (DecryptException $e) {
        return redirect()->route('admin.index')->with('error', 'Invalid User ID');
    }
}

public function updateAdStatus(Request $request)
{
    // Validate input
    $validatedData = $request->validate([
        'ads.*.status' => 'required|string|in:Active,Inactive',
        'ads.*.id' => 'required|integer|exists:ads,id',
        'userId' => 'required|integer|exists:users,id',
    ]);

    // Update each ad status
    foreach ($validatedData['ads'] as $adData) {
        Ad::where('id', $adData['id'])->update(['ad_status' => $adData['status']]);
    }

    // Redirect with success message
    return redirect()->route('admin.user_ads', ['userId' => $request->userId])
                     ->with('success', 'Statuses updated successfully!');
}

    public function create($id)
{
    $decryptedId = decrypt($id);
    $ad = Ad::with('images')->findOrFail($decryptedId);
    return view('product_detail', compact('ad'));
}

}