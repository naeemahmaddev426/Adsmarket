<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Ad;
use App\Models\AdsImage; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\FavoriteView;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Log;

class AdsImageController extends Controller
{
   private function getUserAdsData($userId)
    {
        // Count total ads for the user
        $viewAdsCount = Ad::where('users_id', $userId)->count();

        // Count active ads
        $activeAdsCount = Ad::where('users_id', $userId)
                            ->where('ad_status', 'Active')
                            ->count();

        // Count inactive ads
        $inactiveAdsCount = Ad::where('users_id', $userId)
                            ->where('ad_status', 'Inactive')
                            ->count();

        // Count Not_posted ads
        $notPostedAdsCount = Ad::where('users_id', $userId)
                            ->where('ad_status', 'Not_posted')
                            ->count();

        // Fetch all ads for the user with images
        $ads = Ad::with('images')
                ->where('users_id', $userId)
                ->get();

        return compact('ads', 'viewAdsCount', 'activeAdsCount', 'inactiveAdsCount', 'notPostedAdsCount');
    }


    public function index()
{
    $user = Auth::user();

    if ($user) {
        // Retrieve the ads for the authenticated user
        $data = $this->getUserAdsData($user->id);

        foreach ($data['ads'] as $ad) {
            // Get total views and phone views for this specific ad
            $favoriteViews = FavoriteView::where('ad_id', $ad->id)->get();
            $ad->totalViews = $favoriteViews->sum('view');
            $ad->totalPhoneViews = $favoriteViews->sum('phone_view');
        }

        return view('user.index', $data);
    }

    return redirect()->route('login');
}

    
    
    public function home()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get banners for the home page
            $banners = Banner::where('type', 'home')->get();
            // Return the home page view with the banners
            return view('index', compact('banners')); 
        }
    
        // Redirect to the login page if the user is not authenticated
        return redirect()->route('login');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image_path.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            if ($request->hasFile('image_path')) {
                foreach ($request->file('image_path') as $image) {
                    $originalName = $image->getClientOriginalName();
                    $imageName = time() . '_' . $originalName;
                    $directory = public_path('assets/images/48');
                    $savedImage = AdsImage::create([
                        'ad_id' => '48', 
                        'image_path' => 'assets/images/48/' . $imageName, 
                    ]);

                    if ($savedImage) {
                        $image->move($directory, $imageName); 
                        Log::info('Image saved: ' . $imageName);
                    } else {
                        Log::error('Failed to save image to database.');
                    }
                }

                return redirect()->back()->with('success', 'Images uploaded successfully.');
            } else {
                Log::error('No images found in the request.');
                return redirect()->back()->withErrors(['No images found in the request.']);
            }

            Log::debug(DB::getQueryLog());
        } catch (\Exception $e) {
            Log::error('Exception while saving image: ' . $e->getMessage());
            return redirect()->back()->withErrors(['Failed to upload images. Please try again.']);
        }
    }
    public function updateProfile(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'fullName' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'profileImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get the currently authenticated user
        $user = Auth::user();

        // Update user profile details
        $user->name = $request->input('fullName');
        $user->phone_no = $request->input('phone');
        $user->email = $request->input('email');

        // Handle the profile image upload
        if ($request->hasFile('profileImage')) {
            $image = $request->file('profileImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $directory = public_path('assets/images/profiles');
            $image->move($directory, $imageName);

            // Set the profile image path
            $user->profile_image = 'assets/images/profiles/' . $imageName;
        }

        // Save the updated user data to the database
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }


    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($validatedData['currentPassword'], $user->password)) {
            return redirect()->back()->withErrors(['currentPassword' => 'Current password is incorrect.']);
        }

        $user->password = Hash::make($validatedData['newPassword']);
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully.');
    }

    public function show(AdsImage $adsimage)
    {
        //
    }

    public function edit(AdsImage $adsimage)
    {
        //
    }

    public function update(Request $request, AdsImage $adsimage)
    {
        //
    }

    public function destroy(AdsImage $adsimage)
    {
        //
    }
}
