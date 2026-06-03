<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ad;
use App\Models\Banner;
use Illuminate\Http\Request;


    class AdshomeController extends Controller
{


    
    public function index()
    {
        $images = Category::all();
    
        // Count only active ads for each category
        $categories = Ad::select('category_name')
            ->where('ad_status', 'active')  // Filter for active ads
            ->selectRaw('COUNT(*) as count')
            ->groupBy('category_name')
            ->get();
    
        foreach ($categories as $category) {
            $category->subcategories = Ad::select('sub_category_name')
                ->where('category_name', $category->category_name)
                ->where('ad_status', 'active')  // Filter for active ads
                ->selectRaw('COUNT(*) as count')
                ->groupBy('sub_category_name')
                ->get();
        }
    
        $order = [
            'Mobiles' => 1,
            'Vehicles' => 2,
            'property_for_sale' => 3,
            'property_for_rent' => 4,
            'Bikes' => 5,
            'Furniture' => 6,
            'Fashion' => 7
        ];
    
        $orderedCategories = $categories->sortBy(function ($category) use ($order) {
            return $order[$category->category_name] ?? 999;
        });
    
        $totalAds = Ad::where('ad_status', 'active')->count(); // Count only active ads
        $homeBanners = Banner::where('type', 'home')->get();
    $ads = Ad::all();
        return view('index', compact('images', 'ads', 'orderedCategories', 'totalAds' , 'homeBanners'));
    }

    public function showBySubcategory($category_name, $sub_category_name)
    {
        $ads = Ad::with('images')
            ->where('category_name', $category_name)
            ->where('sub_category_name', $sub_category_name)
            ->get();

        $totalAds = $ads->count();
        $productBanners = Banner::where('type', 'home')->get();
        if ($ads->isEmpty()) {
            return view('search', [
                'ads' => [],
                'message' => 'No ads found for this subcategory',
                'category_name' => $category_name,
                'sub_category_name' => $sub_category_name,
                'totalAds' => $totalAds
            ]);
        }

        return view('search-results', compact('ads', 'category_name', 'sub_category_name', 'totalAds', 'productBanners'));
    }
//     public function showBySubcategorySearch($category_name, $sub_category_name)
// {
//     $ads = Ad::with('images')
//         ->where('category_name', $category_name)
//         ->where('sub_category_name', $sub_category_name)
//         ->get();

//     $totalAds = $ads->count();
//     $productBanners = Banner::where('type', 'home')->get();
//     $categories = Category::all(); // Fetch categories
//     $subcategories = Subcategory::all(); // Fetch subcategories

//     if ($ads->isEmpty()) {
//         return view('search-results', [
//             'ads' => [],
//             'message' => 'No ads found for this subcategory',
//             'category_name' => $category_name,
//             'sub_category_name' => $sub_category_name,
//             'totalAds' => $totalAds,
//             'categories' => $categories,
//             'subcategories' => $subcategories
//         ]);
//     }

//     return view('search-results', compact('ads', 'category_name', 'sub_category_name', 'totalAds', 'productBanners', 'categories', 'subcategories'));
// }



    
}

