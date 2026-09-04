<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Ad;
use App\Models\User;
use App\Models\AdsImage;
use App\Models\Contact; 
use App\Models\Banner; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Log;
use App\Models\FavoriteView;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        $contactBanners = Banner::where('type', 'contact')->get();
        return view('contact', compact('contactBanners'));
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
    
    

    public function adsall($userId = null)
{
    try {
        // An ID is supplied from the users table; without one, show every ad.
        $user = $userId ? User::findOrFail($userId) : null;
        $ads = Ad::with('user')
            ->when($userId, fn ($query) => $query->where('users_id', $userId))
            ->get();

        // Calculate total views and phone views from the favorite_view table for each ad
        foreach ($ads as $ad) {
            // Sum views from favorite_view table for this ad
            $ad->totalViews = DB::table('favorite_view')
                ->where('ad_id', $ad->id)
                ->sum('view');

            // Sum phone views from the 'phone_view' column in favorite_view table for this ad
            $ad->totalPhoneViews = DB::table('favorite_view')
                ->where('ad_id', $ad->id)
                ->sum('phone_view');
        }
        return view('admin.user_ads', [
            'user' => $user,
            'ads' => $ads,
        ]);
    } catch (ModelNotFoundException $e) {
        return redirect()->route('admin.index')->with('error', 'Invalid User ID');
    }
}

public function updateAdStatus(Request $request)
{
    // Validate input with all possible status values
    $validatedData = $request->validate([
        'ads.*.status' => 'required|string|in:active,inactive,Not_posted,disable',
        'ads.*.id' => 'required|integer|exists:ads,id',
        'userId' => 'required|integer|exists:users,id',
    ]);

    // Update each ad's status
    foreach ($validatedData['ads'] as $adData) {
        $ad = Ad::find($adData['id']);
        if ($ad->ad_status !== $adData['status']) {  // Update only if status changed
            $ad->update(['ad_status' => $adData['status']]);
        }
    }

    // Redirect back with success message
    return redirect()->route('admin.user_ads', ['userId' => $request->userId])
                     ->with('success', 'Statuses updated successfully!');
}

   public function create($id)
{
    $adId = decrypt($id);
    
    // Fetch the ad details along with related images
    $ad = Ad::with('images')->findOrFail($adId);

    // Fetch banners for product detail page
    $productDetailBanners = Banner::where('type', 'product_detail')->get();

    // Fetch all records from the favorite_view table for the ad
    $favoriteViews = FavoriteView::where('ad_id', $adId)->get();

    // Check if the user has liked the ad
    $userLiked = $favoriteViews->where('users_id', auth()->id())->isNotEmpty();

    // Calculate total views and phone views
    $totalViews = $favoriteViews->sum('view');  // Assuming 'view_count' holds the number of views
    $totalPhoneViews = $favoriteViews->sum('phone_view');  // Assuming 'phone_view_count' holds the number of phone views

    return view('product_detail', compact('ad', 'productDetailBanners','userLiked', 'favoriteViews', 'totalViews', 'totalPhoneViews'));
}

}
