<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\AdsImage;
use Illuminate\Support\Facades\Auth;

class PostAdController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();
        $ads = Ad::with('images')->where('users_id', $user->id)->get();

        return view('user.my_ads', compact('ads'));
    }

    public function show($id)
{
    $decryptedId = decrypt($id);
    $ad = Ad::findOrFail($decryptedId);
    return view('product', compact('ad'));
}

public function product()
{
    $ads = Ad::all();
    return view('product', compact('ads'));
}

public function showByCategory($category_name)
{
    $query = Ad::with('images')->where('category_name', $category_name);

    if (request('sort')) {
        switch (request('sort')) {
            case 'low_to_high':
                $query->orderBy('price', 'asc');
                break;
            case 'high_to_low':
                $query->orderBy('price', 'desc');
                break;
            case 'recently_added':
                $query->orderBy('created_at', 'desc');
                break;
            case 'mostly_viewed':
                $query->orderBy('views', 'desc');
                break;
        }
    }

    $ads = $query->get();
    $totalAds = $ads->count();

    if ($ads->isEmpty()) {
        return view('product', [
            'ads' => [],
            'message' => 'No ads found for this category',
            'category_name' => $category_name,
            'totalAds' => $totalAds
        ]);
    }

    return view('product', compact('ads', 'category_name', 'totalAds'));
}

    public function showDetail($id)
    {
        $ad = Ad::with('images')->findOrFail($id);
        return view('product_detail', compact('ad'));
    }

}

