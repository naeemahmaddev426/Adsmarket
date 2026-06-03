<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Ad;
use App\Models\User;
use App\Models\AdsImage; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Log;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage; 
class AdminController extends Controller
{
    public function profile()
    {
        return view('admin.admin_profile');
    }
    public function updateUserProfile(Request $request, $id)
{
    $user = User::findOrFail($id);

    if ($request->has('delete_image')) {
        // Handle image deletion
        if ($user->profile_image) {
            Storage::delete('public/' . $user->profile_image);
            $user->profile_image = null;
        }
    } else {
        // Handle image upload
        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                Storage::delete('public/' . $user->profile_image);
            }
            $path = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $path;
        }

        // Update other fields
        $user->name = $request->input('fullName');
        $user->phone_no = $request->input('phone_no');
        $user->email = $request->input('email');
    }

    $user->save();

    return redirect()->back()->with('success', 'Profile updated successfully');
}

public function index()
{
    // Total counts across all users for each ad status
    $totalActiveAds = Ad::where('ad_status', 'active')->count();
    $totalInactiveAds = Ad::where('ad_status', 'inactive')->count();
    $totalnonepostedAds = Ad::where('ad_status', 'Not_posted')->count();
    $totaldisableAds = Ad::where('ad_status', 'disable')->count();

    // Get each user's ad counts by status
    $users = User::all()->map(function ($user) {
        $user->activeAdsCount = Ad::where('users_id', $user->id)->where('ad_status', 'active')->count();
        $user->inactiveAdsCount = Ad::where('users_id', $user->id)->where('ad_status', 'inactive')->count();
        $user->not_postedAdsCount = Ad::where('users_id', $user->id)->where('ad_status', 'Not_posted')->count();
        $user->disableAdsCount = Ad::where('users_id', $user->id)->where('ad_status', 'disable')->count();

        return $user;
    });

    // Count active ads without user association (for debugging purposes)
    $unassignedActiveAdsCount = Ad::whereNull('users_id')->where('ad_status', 'active')->count();

    return view('admin.index', compact('totalActiveAds', 'totalInactiveAds', 'totalnonepostedAds', 'totaldisableAds', 'users', 'unassignedActiveAdsCount'));
}




public function homeBanner()
{
    $banners = Banner::where('type', 'home')->get();
    return view('admin.home_banner', compact('banners'));
}

public function uploadHomeBanner(Request $request)
{
    $request->validate([
        'banner' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
    ]);

    $file = $request->file('banner');
    $path = $file->store('banners', 'public');

    Banner::create([
        'path' => $path,
        'type' => 'home'
    ]);

    return redirect()->route('admin.home_banner')->with('success', 'Banner uploaded successfully.');
}

// Repeat for productBanner, productDetailBanner, and contactBanner methods

public function productBanner()
{
    $banners = Banner::where('type', 'product')->get();
    return view('admin.product_banner', compact('banners'));
}

public function uploadProductBanner(Request $request)
{
    $request->validate([
        'banner' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
    ]);

    $file = $request->file('banner');
    $path = $file->store('banners', 'public');

    Banner::create([
        'path' => $path,
        'type' => 'product'
    ]);

    return redirect()->route('admin.product_banner')->with('success', 'Banner uploaded successfully.');
}

public function productDetailBanner()
{
    $banners = Banner::where('type', 'product_detail')->get();
    return view('admin.product_detail_banner', compact('banners'));
}

public function uploadProductDetailBanner(Request $request)
{
    $request->validate([
        'banner' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
    ]);

    $file = $request->file('banner');
    $path = $file->store('banners', 'public');

    Banner::create([
        'path' => $path,
        'type' => 'product_detail'
    ]);

    return redirect()->route('admin.product_detail_banner')->with('success', 'Banner uploaded successfully.');
}

public function contactBanner()
{
    $banners = Banner::where('type', 'contact')->get();
    return view('admin.contact_banner', compact('banners'));
}

public function uploadContactBanner(Request $request)
{
    $request->validate([
        'banner' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
    ]);

    $file = $request->file('banner');
    $path = $file->store('banners', 'public');

    Banner::create([
        'path' => $path,
        'type' => 'contact'
    ]);

    return redirect()->route('admin.contact_banner')->with('success', 'Banner uploaded successfully.');
}


}