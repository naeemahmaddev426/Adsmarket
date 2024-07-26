<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Ad;
use App\Models\User;
use App\Models\AdsImage; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Log;
class AdminController extends Controller
{
    public function profile()
    {
        return view('admin.admin_profile');
    }

    public function index()
{
    // Fetch total ads, total active ads, and total inactive ads
    $totalAds = Ad::count();
    $totalActiveAds = Ad::where('ad_status', 'Active')->count();
    $totalInactiveAds = $totalAds - $totalActiveAds;

    // Calculate percentage of active ads
    $percentageActiveAds = $totalAds > 0 ? ($totalActiveAds / $totalAds) * 100 : 0;

    // Fetch all users and calculate active/inactive ads for each
    $users = User::all()->map(function ($user) {
        $activeAdsCount = Ad::where('users_id', $user->id)
                            ->where('ad_status', 'Active')
                            ->count();
        $viewAdsCount = Ad::where('users_id', $user->id)->count();
        $user->activeAdsCount = $activeAdsCount;
        $user->inactiveAdsCount = $viewAdsCount - $activeAdsCount;
        return $user;
    });

    // Pass data to the view
    return view('admin.index', compact('totalAds', 'totalActiveAds', 'totalInactiveAds', 'users', 'percentageActiveAds'));
}

}