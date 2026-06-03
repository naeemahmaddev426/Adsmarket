<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Banner;
use App\Models\FavoriteView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class PostCategory extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Fetch all categories
        return view('post_ad', compact('categories'));
    }
	
    public function search(Request $request)
{
    try {
        // Get inputs and normalize query and location
        $location = trim($request->input('location'));
        $query = trim($request->input('query'));
        $brand = $request->input('brand', []);
        $condition = $request->input('condition', []);

        // Ensure brand and condition are arrays
        if (!is_array($brand)) {
            $brand = $brand ? [$brand] : [];
        }
        if (!is_array($condition)) {
            $condition = $condition ? [$condition] : [];
        }

        // Query initialization
        $adsQuery = Ad::query()->where('ad_status', 'active');

        // Apply brand and condition filters if provided
        if (!empty($brand)) {
            $adsQuery->whereIn('brand', $brand);
        }
        if (!empty($condition)) {
            $adsQuery->whereIn('condition', $condition);
        }

        // If the query is provided, perform 100% exact match on specified fields
        if (!empty($query)) {
            $adsQuery->where(function ($q) use ($query) {
                $q->where('category_name', '=', $query)
                  ->orWhere('sub_category_name', '=', $query)
                  ->orWhere('sub_category_name_type', '=', $query);
            });
        }

        // If location is provided, apply a location filter
        if (!empty($location)) {
            $adsQuery->where('location', 'LIKE', '%' . htmlspecialchars($location) . '%');
        }

        // Handle sorting (default: recently added)
        $sortOption = $request->input('sort', 'recently_added');
        switch ($sortOption) {
            case 'highest':
                $adsQuery->orderBy('price', 'desc'); // Highest price first
                break;
            case 'lowest':
                $adsQuery->orderBy('price', 'asc'); // Lowest price first
                break;
            case 'recently_added':
            default:
                $adsQuery->orderBy('created_at', 'desc'); // Most recent ads first
                break;
        }

        // Fetch the results
        $ads = $adsQuery->with('images')->get();

        // Handle AJAX requests
        if ($request->ajax()) {
            $html = view('partials.ads-list', compact('ads'))->render();
            return response()->json(['html' => $html]);
        }

        // Calculate distinct categories and subcategories for the filters
        $categories = Ad::where('ad_status', 'active')->distinct()->pluck('category_name');
        $subcategories = !empty($query) 
            ? $adsQuery->where('category_name', $query)->distinct()->pluck('sub_category_name')
            : collect();
        $subCategoryCounts = $adsQuery->get()->groupBy('sub_category_name')->map->count();
        $subCategoryTypes = $adsQuery->get()->groupBy('sub_category_name_type')->map->count();

        // Calculate price range for the ads
        $priceRange = [
            'min' => $ads->min('price') ?? 0,
            'max' => $ads->max('price') ?? 0,
        ];

        // Render the search-results view with all relevant data
        return view('search-results', [
            'ads' => $ads,
            'categories' => $categories,
            'category_name' => $query,
            'sub_category_name' => $subcategories,
            'subcategories' => $subcategories,
            'subCategoryCounts' => $subCategoryCounts,
            'subCategoryTypes' => $subCategoryTypes,
            'priceRange' => $priceRange,
            'min_price' => $priceRange['min'],
            'max_price' => $priceRange['max'],
        ]);
    } catch (\Exception $e) {
        // Log the error for debugging purposes
        \Log::error('Error in search:', [
            'message' => $e->getMessage(),
            'stack' => $e->getTraceAsString(),
        ]);

        // Handle AJAX errors with a JSON response
        if ($request->ajax()) {
            return response()->json([
                'error' => 'An error occurred while processing your request.'
            ], 500);
        }

        // Redirect back with an error message
        return redirect()->back()->with('error', 'An error occurred while processing your request. Please try again later.');
    }
}



    public function category_search($category_name)
    {
        try {
            $ads = Ad::where('category_name', $category_name)
                ->where('ad_status', 'active')
                ->with('images')
                ->orderBy('created_at', 'desc')
                ->get();
            $noAdsFound = $ads->isEmpty();
            $categories = Ad::distinct()->pluck('category_name');
            $subCategories = Ad::where('category_name', $category_name)
                ->distinct()
                ->pluck('sub_category_name');

            $priceRange = [
                'min' => $ads->min('price') ?? 0,
                'max' => $ads->max('price') ?? 0,
            ];

            return view('search-results', [
                'ads' => $ads,
                'categories' => $categories,
                'subCategories' => $subCategories,
                'priceRange' => $priceRange,
                'noAdsFound' => $noAdsFound,
            ]);
        } catch (\Exception $e) {
            \Log::error('Error in category_search:', [
                'message' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
            ]);

            return redirect()->back()->with('error', 'An error occurred while processing your request. Please try again later.');
        }
    }

    public function subcategory_search($category_name, $sub_category_name)
    {
        try {
            $ads = Ad::where('category_name', $category_name)
                ->where('sub_category_name', $sub_category_name)
                ->where('ad_status', 'active')
                ->with('images')
                ->orderBy('created_at', 'desc')
                ->get();

            $noAdsFound = $ads->isEmpty();

            $categories = Ad::distinct()->pluck('category_name');
            $subCategories = Ad::where('category_name', $category_name)
                ->distinct()
                ->pluck('sub_category_name');

            $priceRange = [
                'min' => $ads->min('price') ?? 0,
                'max' => $ads->max('price') ?? 0,
            ];

            return view('search-results', [
                'ads' => $ads,
                'categories' => $categories,
                'subCategories' => $subCategories,
                'priceRange' => $priceRange,
                'noAdsFound' => $noAdsFound,
            ]);
        } catch (\Exception $e) {
            \Log::error('Error in subcategory_search:', [
                'message' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
            ]);

            return redirect()->back()->with('error', 'An error occurred while processing your request. Please try again later.');
        }
    }

    public function subcategorynametype_search(Request $request)
    {
        try {
            $request->validate([
                'category_name' => 'required|string|max:255',
                'sub_category_name' => 'required|string|max:255',
                'sub_category_name_type' => 'required|string|max:255',
            ]);

            $adsQuery = Ad::where('category_name', $request->category_name)
                ->where('sub_category_name', $request->sub_category_name)
                ->where('sub_category_name_type', $request->sub_category_name_type)
                ->where('ad_status', 'active');

            $ads = $adsQuery->get();
            $noAdsFound = $ads->isEmpty();

            $categories = Ad::distinct()->pluck('category_name');
            $subCategories = Ad::where('category_name', $request->category_name)
                ->distinct()
                ->pluck('sub_category_name');
            $subCategoryTypes = Ad::where('sub_category_name', $request->sub_category_name)
                ->distinct()
                ->pluck('sub_category_name_type');

            return view('search-results', [
                'ads' => $ads,
                'categories' => $categories,
                'subCategories' => $subCategories,
                'subCategoryTypes' => $subCategoryTypes,
                'noAdsFound' => $noAdsFound,
            ]);
        } catch (\Exception $e) {
            \Log::error('Error in subcategorynametype_search:', [
                'message' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
            ]);

            return redirect()->back()->with('error', 'An error occurred while processing your request. Please try again later.');
        }
    }
    


public function filter(Request $request)
{
    try{
    $userId = Auth::id();
    
    // Build base query
    $adsQuery = Ad::query()->where('ad_status', 'active');

    if ($request->has('category_name') && !empty($request->category_name)) {
        $adsQuery->where('category_name', $request->category_name);
    }

    // Apply Subcategory filter
    if ($request->has('sub_category_name') && !empty($request->sub_category_name)) {
        $adsQuery->where('sub_category_name', $request->sub_category_name);
    }

    // Apply Subcategory Type filter
    if ($request->has('sub_category_name_type') && !empty($request->sub_category_name_type)) {
        $adsQuery->where('sub_category_name_type', $request->sub_category_name_type);
    }
    
    // Apply Location filter only if the user selected a location
    if ($request->has('location') && !empty($request->location)) {
        $adsQuery->where('location', $request->location);
    }
    
    // Apply Price Range filter with flexibility for min/max
    if ($request->has('price_min') && !empty($request->price_min)) {
        $adsQuery->where('price', '>=', $request->price_min);  // Enforce minimum price
    }
    if ($request->has('price_max') && !empty($request->price_max)) {
        $adsQuery->where('price', '<=', $request->price_max);  // Enforce maximum price
    }
    if ($request->has('min_year') && $request->has('max_year')) {
        $adsQuery->whereBetween('year_update', [$request->min_year, $request->max_year]);
    }
    if ($request->has('kms_driven_no_min') && $request->has('kms_driven_no_max')) {
        $adsQuery->whereBetween('kms_driven_no', [$request->kms_driven_no_min, $request->kms_driven_no_max]);
    }
    // Apply Deliverable filter (if both Yes and No are selected)
    if ($request->has('deliverable')) {
        $adsQuery->whereIn('deliverable', $request->deliverable); // expects an array of [1, 0]
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('brand')) {
        $adsQuery->whereIn('brand', $request->brand); // expects an array of model IDs or names
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('condition')) {
        $adsQuery->whereIn('condition', $request->condition); // expects an array of model IDs or names
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('type')) {
        $adsQuery->whereIn('type', $request->type); // expects an array of model IDs or names
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('make_car')) {
        $adsQuery->whereIn('make_car', $request->make_car); // expects an array of model IDs or names
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('feature')) {
        $adsQuery->whereIn('feature', $request->feature); // expects an array of model IDs or names
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('area_unit')) {
        $adsQuery->whereIn('area_unit', $request->area_unit); // expects an array of model IDs or names
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('area_square')) {
        $adsQuery->whereIn('area_square', $request->area_square); // expects an array of model IDs or names
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('furnished')) {
        $adsQuery->whereIn('furnished', $request->furnished); // expects an array of model IDs or names
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('pro_sale_house_bedroom')) {
        $adsQuery->whereIn('pro_sale_house_bedroom', $request->pro_sale_house_bedroom); // expects an array of model IDs or names
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('pro_sale_house_bathroom')) {
        $adsQuery->whereIn('pro_sale_house_bathroom', $request->model); // expects an array of model IDs or names
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('pro_sale_appart_bedroom')) {
        $adsQuery->whereIn('pro_sale_appart_bedroom', $request->pro_sale_appart_bedroom); // expects an array of model IDs or names
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('pro_sale_appart_floor_level')) {
        $adsQuery->whereIn('pro_sale_appart_floor_level', $request->pro_sale_appart_floor_level); // expects an array of model IDs or names
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('pro_sale_shope_floor_level')) {
        $adsQuery->whereIn('pro_sale_shope_floor_level', $request->pro_sale_shope_floor_level); // expects an array of model IDs or names
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('pro_sale_portion_bedroom')) {
        $adsQuery->whereIn('pro_sale_portion_bedroom', $request->pro_sale_portion_bedroom); // expects an array of model IDs or names
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('pro_sale_portion_bathroom')) {
        $adsQuery->whereIn('pro_sale_portion_bathroom', $request->pro_sale_portion_bathroom); // expects an array of model IDs or names
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('pro_sale_portion_floor_level')) {
        $adsQuery->whereIn('pro_sale_portion_floor_level', $request->pro_sale_portion_floor_level); // expects an array of model IDs or names
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('pro_rent_house_bedroom')) {
        $adsQuery->whereIn('pro_rent_house_bedroom', $request->pro_rent_house_bedroom); // expects an array of model IDs or names
    }
    // Apply model filter (if multiple models are selected)
    if ($request->has('no_storeys')) {
        $adsQuery->whereIn('no_storeys', $request->no_storeys); // expects an array of model IDs or names
    }
    if ($request->has('device')) {
        $adsQuery->whereIn('device', $request->device); // expects an array of model IDs or names
    }
    if ($request->has('construction_state_new_rent_house')) {
        $adsQuery->whereIn('construction_state_new_rent_house', $request->construction_state_new_rent_house); // expects an array of model IDs or names
    }
    if ($request->has('pro_rent_house_bathroom')) {
        $adsQuery->whereIn('pro_rent_house_bathroom', $request->pro_rent_house_bathroom); // expects an array of model IDs or names
    }
    if ($request->has('pro_rent_apart_bathroom')) {
        $adsQuery->whereIn('pro_rent_apart_bathroom', $request->pro_rent_apart_bathroom); // expects an array of model IDs or names
    }
    if ($request->has('pro_rent_appart_floor')) {
        $adsQuery->whereIn('pro_rent_appart_floor', $request->pro_rent_appart_floor); // expects an array of model IDs or names
    }
    if ($request->has('bedroom2')) {
        $adsQuery->whereIn('bedroom2', $request->bedroom2); // expects an array of model IDs or names
    }
    if ($request->has('bathroom2')) {
        $adsQuery->whereIn('bathroom2', $request->bathroom2); // expects an array of model IDs or names
    }
    if ($request->has('floor_level2')) {
        $adsQuery->whereIn('floor_level2', $request->floor_level2); // expects an array of model IDs or names
    }
    if ($request->has('rent_shope_bathroom')) {
        $adsQuery->whereIn('rent_shope_bathroom', $request->rent_shope_bathroom); // expects an array of model IDs or names
    }
    if ($request->has('floor_level_shope_rent')) {
        $adsQuery->whereIn('floor_level_shope_rent', $request->floor_level_shope_rent); // expects an array of model IDs or names
    }
    if ($request->has('bedroom_vacation_rent')) {
        $adsQuery->whereIn('bedroom_vacation_rent', $request->bedroom_vacation_rent); // expects an array of model IDs or names
    }
    if ($request->has('bathroom_vacation_rent')) {
        $adsQuery->whereIn('bathroom_vacation_rent', $request->bathroom_vacation_rent); // expects an array of model IDs or names
    }
    if ($request->has('make_bike')) {
        $adsQuery->whereIn('make_bike', $request->make_bike); // expects an array of model IDs or names
    }
    if ($request->has('engine_type')) {
        $adsQuery->whereIn('engine_type', $request->engine_type); // expects an array of model IDs or names
    }
    if ($request->has('engine_capacity')) {
        $adsQuery->whereIn('engine_capacity', $request->engine_capacity); // expects an array of model IDs or names
    }
    if ($request->has('ignition_type')) {
        $adsQuery->whereIn('ignition_type', $request->ignition_type); // expects an array of model IDs or names
    }
    if ($request->has('origin')) {
        $adsQuery->whereIn('origin', $request->origin); // expects an array of model IDs or names
    }
    if ($request->has('registration_city')) {
        $adsQuery->whereIn('registration_city', $request->registration_city); // expects an array of model IDs or names
    }
    if ($request->has('product')) {
        $adsQuery->whereIn('model', $request->model); // expects an array of model IDs or names
    }
    if ($request->has('model')) {
        $adsQuery->whereIn('model', $request->model); // expects an array of model IDs or names
    }
    
   $userId = Auth::id();

   $sortOption = $request->get('sort', 'recently_added'); // Default to 'recently_added'
    switch ($sortOption) {
        case 'lowest':
            $adsQuery->orderBy('price', 'asc'); // Lowest price first
            break;
        case 'highest':
            $adsQuery->orderBy('price', 'desc'); // Highest price first
            break;
        case 'recently_added':
        default:
            $adsQuery->orderBy('created_at', 'desc'); // Most recent ads first
            break;
        }


   // Retrieve ads
   $ads = $adsQuery->get();
   $noAdsFound = $ads->isEmpty();

   // Retrieve additional data
   $recentlyViewed = FavoriteView::whereIn('id', function ($query) use ($userId) {
           $query->select(DB::raw('MAX(id)'))
               ->from('favorite_view')
               ->where('users_id', $userId)
               ->where('view', '>', 0)
               ->groupBy('ad_id');
       })
       ->orderBy('created_at', 'desc')
       ->take(3)
       ->get();

   $productBanners = Banner::where('type', 'product')->get();
   $categories = $ads->pluck('category_name')->unique();
   $subCategories = $ads->pluck('sub_category_name')->unique();
   $subCategoryTypes = $ads->pluck('sub_category_name_type')->unique();

   if ($request->ajax()) {
       // Render partial views for AJAX requests
       $filtersView = view('search-results', compact('ads', 'recentlyViewed','noAdsFound'))->render();
       $adsView = view('partials.ads-list', compact('ads','noAdsFound'))->render();

       return response()->json([
           'adsView' => $adsView,
           'filtersView' => $filtersView,
           'categories' => $categories,
           'subCategories' => $subCategories,
           'subCategoryTypes' => $subCategoryTypes,
           'productBanners' => $productBanners,
           'noAdsFound' => $noAdsFound,
       ]);
   }

   // Return standard view for non-AJAX requests
   return view('search-results', compact(
       'ads', 'recentlyViewed', 'categories', 
       'subCategories', 'subCategoryTypes', 'productBanners', 'noAdsFound',
   ));
} catch (\Exception $e) {
    // Log the error for debugging purposes
    \Log::error('Error in filterads:', [
        'message' => $e->getMessage(),
        'stack' => $e->getTraceAsString(),
    ]);

    // Return an error response or redirect to an error page
    return redirect()->back()->with('error', 'An error occurred while processing your request. Please try again later.');
}
}

public function checkAdsAvailability(Request $request)
    {
        $category = $request->input('category');
        

        // Check if the category is valid (exists in the database)
        $isValidCategory = Ad::where('ad_status', 'active')
            ->where(function ($query) use ($category) {
                $query->where('category_name', $category)
                    ->orWhere('sub_category_name', $category)
                    ->orWhere('sub_category_name_type', $category);
            })->exists();

        if (!$isValidCategory) {
            return response()->json([
                'validCategory' => false,
                'exists' => false
            ]);
        }

        // Check if any ads exist for the category
        $adsExist = Ad::where('ad_status', 'active')
            ->where(function ($query) use ($category) {
                $query->where('category_name', $category)
                    ->orWhere('sub_category_name', $category)
                    ->orWhere('sub_category_name_type', $category);
            })->exists();
        return response()->json([
            'validCategory' => true,
            'exists' => $adsExist
        ]);
    }

}



