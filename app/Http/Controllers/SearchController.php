<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;

class SearchController extends Controller
{
   public function search(Request $request)
    {
        $query = $request->input('query');
        $category_name = $request->input('category_name');
        $sub_category_name = $request->input('sub_category_name');
        $location = $request->input('location');
    
        // Normalize input values
        $normalizedQuery = strtolower(trim($query));
        $normalizedCategoryName = $category_name ? strtolower(str_replace(' ', '_', $category_name)) : null;
        $normalizedLocation = $location ? strtolower(trim($location)) : null;
    
        // Initialize query builder for active ads
        $adsQuery = Ad::where('ad_status', 'active');
    
        // Check if any meaningful input is provided
        if ($normalizedQuery || $normalizedLocation || $normalizedCategoryName) {
            // Apply location filter if provided
            if ($normalizedLocation) {
                $adsQuery->whereRaw('LOWER(location) = ?', [$normalizedLocation]);
            }
    
            // Apply category filter if provided
            if ($normalizedCategoryName) {
                $adsQuery->whereRaw('LOWER(REPLACE(category_name, " ", "_")) = ?', [$normalizedCategoryName]);
            }
    
            // Add search conditions for query
            if ($normalizedQuery) {
                $adsQuery->where(function ($q) use ($normalizedQuery) {
                    $q->whereRaw('LOWER(category_name) LIKE ?', [$normalizedQuery . '%'])
                      ->orWhereRaw('LOWER(sub_category_name) LIKE ?', [$normalizedQuery . '%'])
                      ->orWhereRaw('LOWER(sub_category_name_type) LIKE ?', [$normalizedQuery . '%'])
                      ->orWhereRaw('LOWER(title) LIKE ?', [$normalizedQuery . '%']);
                });
            }
            
        } else {
            // If no meaningful input is provided, set an empty result set
            $ads = collect();
        }
        if ($category_name) {
            $adsQuery->where('category_name', $category_name);
        }
        
        if ($sub_category_name) {
            $adsQuery->where('sub_category_name', $sub_category_name);
        }
        $ads = $adsQuery->with('images')->get();
        $categories = Ad::distinct()->pluck('category_name');
        
        // Get subcategories for the selected category
        $subcategories = $category_name ? Ad::where('category_name', $category_name)
                                        ->distinct()
                                        ->pluck('sub_category_name') : collect();
        // Fetch ads based on the constructed query
        $ads = $adsQuery->get();
        // Return the view with search results
        return view('search-results', [
            'ads' => $ads,
            'query' => $query,
            'categories' => $categories,
            'category_name' => $category_name,
            'sub_category_name' => $sub_category_name,
            'subcategories' => $subcategories,
            'location' => $location,
            'message' => $ads->isEmpty() ? 'No results found for your search query.' : null
        ]);
    }
    public function showAdsByCategory(Request $request)
{
    $category_name = $request->input('category_name');
    $sub_category_name = $request->input('sub_category_name');
    
    // Get ads filtered by active status and selected category
    $adsQuery = Ad::where('ad_status', 'active');
    
    if ($category_name) {
        $adsQuery->where('category_name', $category_name);
    }
    
    if ($sub_category_name) {
        $adsQuery->where('sub_category_name', $sub_category_name);
    }
    
    $ads = $adsQuery->with('images')->get();
    $categories = Ad::distinct()->pluck('category_name');
    
    // Fetch all subcategories for the selected category and calculate their counts
    $subcategories = $category_name ? Ad::where('category_name', $category_name)
                                    ->distinct()
                                    ->pluck('sub_category_name') : collect();

    // Calculate counts for all subcategories (active and inactive)
    $subCategoryCounts = Ad::where('category_name', $category_name)
                            ->groupBy('sub_category_name')
                            ->select('sub_category_name', \DB::raw('count(*) as total'))
                            ->pluck('total', 'sub_category_name');
    
    return view('search-results', [
        'ads' => $ads,
        'categories' => $categories,
        'category_name' => $category_name,
        'sub_category_name' => $sub_category_name,
        'subcategories' => $subcategories,
        'subCategoryCounts' => $subCategoryCounts, // Pass counts to view
    ]);
}
    
}



