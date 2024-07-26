<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ad;
use Illuminate\Http\Request;


    class AdshomeController extends Controller
{
    public function index()
    {
        $images = Category::all();

        $categories = Ad::select('category_name')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('category_name')
            ->get();

        foreach ($categories as $category) {
            $category->subcategories = Ad::select('sub_category_name')
                ->selectRaw('COUNT(*) as count')
                ->where('category_name', $category->category_name)
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

        $totalAds = Ad::count();

        return view('index', compact('images', 'orderedCategories', 'totalAds'));
    }

    public function showBySubcategory($category_name, $sub_category_name)
    {
        $ads = Ad::with('images')
            ->where('category_name', $category_name)
            ->where('sub_category_name', $sub_category_name)
            ->get();

        $totalAds = $ads->count();

        if ($ads->isEmpty()) {
            return view('product', [
                'ads' => [],
                'message' => 'No ads found for this subcategory',
                'category_name' => $category_name,
                'sub_category_name' => $sub_category_name,
                'totalAds' => $totalAds
            ]);
        }

        return view('product', compact('ads', 'category_name', 'sub_category_name', 'totalAds'));
    }
    
}

