<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Ad;
use App\Models\User;
use App\Models\AdsImage; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Log;

class AdController extends Controller
{
    private function getUserAdsData($userId, $category)
    {
        $viewAdsCount = Ad::where('users_id', $userId)->count();

        // Count active ads
        $activeAdsCount = Ad::where('users_id', $userId)
                            ->where('ad_status', 'Active')
                            ->count();

        // Fetch ads for the user (including images relation)
        $ads = Ad::with('images')
                ->where('users_id', $userId)
                ->where('category_name', $category)
                ->get();

        return compact('ads', 'viewAdsCount', 'activeAdsCount', 'category');
    }

    public function showCategory()
    {
        // Define the category name you want to filter by
        $categoryName = 'Mobiles'; // Adjust this as needed

        // Fetch ads where the category_name matches the specified category, case-insensitive
        $ads = Ad::where('category_name', 'like', $categoryName)->get();

        // Pass the ads and category name to the view
        return view('admin.mobiles', [
            'ads' => $ads,
            'category' => $categoryName
        ]);
    }
    public function showCategoryvahicle()
    {
        // Define the category name you want to filter by
        $categoryName = 'Vehicles'; // Adjust this as needed

        // Fetch ads where the category_name matches the specified category, case-insensitive
        $ads = Ad::where('category_name', 'like', $categoryName)->get();

        // Pass the ads and category name to the view
        return view('admin.vehicles', [
            'ads' => $ads,
            'category' => $categoryName
        ]);
    }
    public function propertysale()
    {
        // Define the category name you want to filter by
        $categoryName = 'Property_For_Sale'; // Adjust this as needed

        // Fetch ads where the category_name matches the specified category, case-insensitive
        $ads = Ad::where('category_name', 'like', $categoryName)->get();

        // Pass the ads and category name to the view
        return view('admin.property_sale', [
            'ads' => $ads,
            'category' => $categoryName
        ]);
    }
    public function propertyrent()
    {
        // Define the category name you want to filter by
        $categoryName = 'Property_For_Rent'; // Adjust this as needed

        // Fetch ads where the category_name matches the specified category, case-insensitive
        $ads = Ad::where('category_name', 'like', $categoryName)->get();

        // Pass the ads and category name to the view
        return view('admin.property_rent', [
            'ads' => $ads,
            'category' => $categoryName
        ]);
    }
    public function bike()
    {
        // Define the category name you want to filter by
        $categoryName = 'Bikes'; // Adjust this as needed

        // Fetch ads where the category_name matches the specified category, case-insensitive
        $ads = Ad::where('category_name', 'like', $categoryName)->get();

        // Pass the ads and category name to the view
        return view('admin.bikes', [
            'ads' => $ads,
            'category' => $categoryName
        ]);
    }
    public function furniture()
    {
        // Define the category name you want to filter by
        $categoryName = 'Furniture_Home_Decor'; // Adjust this as needed

        // Fetch ads where the category_name matches the specified category, case-insensitive
        $ads = Ad::where('category_name', 'like', $categoryName)->get();

        // Pass the ads and category name to the view
        return view('admin.furniture', [
            'ads' => $ads,
            'category' => $categoryName
        ]);
    }
    public function fashion()
    {
        // Define the category name you want to filter by
        $categoryName = 'Fashion_Beauty'; // Adjust this as needed

        // Fetch ads where the category_name matches the specified category, case-insensitive
        $ads = Ad::where('category_name', 'like', $categoryName)->get();

        // Pass the ads and category name to the view
        return view('admin.fashion', [
            'ads' => $ads,
            'category' => $categoryName
        ]);
    }
}
