<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\adsimage;
use App\Models\Banner;
use App\Models\Category;
use App\Models\SubCategoryNameType;
use App\Models\SubCategory;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\FavoriteView;
use App\Notifications\AdUpdatedOrCreated;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Facades\Image;

class PostAdController extends Controller
{
    public function toggleLike(Request $request, $adId)
{
    if (!auth()->check()) {
        return response()->json(['success' => false, 'message' => 'User not authenticated'], 403);
    }

    $userId = auth()->id();
    $favorite = FavoriteView::where('users_id', $userId)->where('ad_id', $adId)->first();

    if ($request->input('action') === 'like') {
        if (!$favorite) {
            // Create a new entry if it doesn't exist
            FavoriteView::create([
                'users_id' => $userId,
                'ad_id' => $adId,
                'like' => 1
            ]);
        } else {
            // Update the "like" column to 1
            $favorite->update(['like' => 1]);
        }
    } elseif ($request->input('action') === 'unlike') {
        if ($favorite) {
            // Update the "like" column to 0
            $favorite->update(['like' => 0]);
        }
    }

    return response()->json(['success' => true]);
}
    

public function savePhoneView(Request $request)
{
    $userId = auth()->id();
    $adId = $request->input('ad_id');

    // Check if the entry already exists in the favorite_view table
    $favorite = FavoriteView::where('users_id', $userId)->where('ad_id', $adId)->first();

    if (!$favorite) {
        // Create a new entry with phone_view = 1 if it doesn't exist
        FavoriteView::create([
            'users_id' => $userId,
            'ad_id' => $adId,
            'like' => 0, 
            'view' => 0, 
            'phone_view' => 1
        ]);
    } elseif ($favorite->phone_view == 0) {
        // Update phone_view to 1 if it exists but is 0
        $favorite->update(['phone_view' => 1]);
    }

    return response()->json(['success' => true]);
}
public function saveView(Request $request)
{
    // Get the authenticated user's ID (the person who clicked the ad)
    $userId = auth()->id();

    // Get the ad ID from the request
    $adId = $request->input('ad_id');

    // Find the ad by ID
    $ad = Ad::find($adId);

    // Check if the ad exists
    if (!$ad) {
        return response()->json(['success' => false, 'message' => 'Ad not found.']);
    }

    // Check if the user is the owner of the ad
    if ($ad->users_id === $userId) {
        // If the user is the owner, do NOT save the view
        return redirect()->route('product.detail', ['id' => encrypt($adId)]); // Redirect to product detail page for the owner without saving view
    }

    // For non-owner users, save the view
    $view = FavoriteView::where('users_id', $userId)
                        ->where('ad_id', $adId)
                        ->first();

    if ($view) {
        // If a view already exists, increment the count
        $view->increment('view');
    } else {
        // Create a new view record
        FavoriteView::create([
            'users_id' => $userId,
            'ad_id' => $adId,
            'like' => 0,
            'view' => 1,
            'phone_view' => 0,
        ]);
    }

    // Redirect the user to the product detail page
    return redirect()->route('product.detail', ['id' => encrypt($adId)]);
}
// public function getRecentlyViewedAds()
// {
//     // Get the logged-in user's ID
//     $userId = Auth::id();

//     // Fetch the recent ads
//     $recentAds = DB::table('favorite_view')
//         ->join('ads', 'favorite_view.ad_id', '=', 'ads.id') // Join favorite_view with ads
//         ->join('adsimages', 'ads.id', '=', 'adsimages.ad_id') // Join ads with adsimages
//         ->where('favorite_view.users_id', $userId) // Filter by user's ID
//         ->where('ads.ad_status', 'active') // Ensure the ad is active
//         ->select(
//             'ads.id', 
//             'ads.title', 
//             'ads.description', 
//             'ads.price', 
//             'ads.location', 
//             'ads.created_at', 
//             'adsimages.image_path'
//         )
//         ->orderBy('favorite_view.created_at', 'desc') // Sort by most recently viewed
//         ->take(3) // Limit to 3 ads
//         ->get()
//         ->map(function ($ad) {
//             $ad->created_at = Carbon::parse($ad->created_at); // Convert created_at to Carbon
            
//         });

//     // Pass the $recentAds to the Blade view using compact
//     return view('search-results', compact('recentAds'));

//     }
    public function show($id)
{
    $decryptedId = decrypt($id);
    $ad = Ad::findOrFail($decryptedId);
    return view('search-results', compact('ad'));
}


public function product()
{
    // Retrieve only active ads
    $ads = Ad::where('ad_status', 'active')->get();
    return view('search-results', compact('ads'));
}

public function showByCategory($category_name)
{
    // Start the query with filtering by category and active status
    $query = Ad::with('images')
                ->where('category_name', $category_name)
                ->where('ad_status', 'active');  // Only include active ads

    // // Apply sorting based on request
    // if (request('sort')) {
    //     switch (request('sort')) {
    //         case 'low_to_high':
    //             $query->orderBy('price', 'asc');
    //             break;
    //         case 'high_to_low':
    //             $query->orderBy('price', 'desc');
    //             break;
    //         case 'recently_added':
    //             $query->orderBy('created_at', 'desc');
    //             break;
    //         case 'mostly_viewed':
    //             $query->orderBy('views', 'desc');
    //             break;
    //         default:
    //             $query->orderBy('created_at', 'desc');
    //             break;
    //     }
    // } else {
        
    //     $query->orderBy('created_at', 'desc');
    // }

    // $ads = $query->get();

    // foreach ($ads as $ad) {
    //     echo "Ad ID: {$ad->id}, Price: {$ad->price}, Created At: {$ad->created_at}, Views: {$ad->views} <br>";
    // }

    $totalAds = Ad::where('category_name', $category_name)
                  ->where('ad_status', 'active')  // Only include active ads
                  ->count();

    $productBanners = Banner::where('type', 'product')->get();

    // Return the view with ads data and additional variables
    return view('search-results', compact('ads', 'category_name', 'totalAds', 'productBanners'));
}

public function showDetail($id)
{
   
    $adId = decrypt($id);
    
    $ad = Ad::with('images')->findOrFail($adId);

    $productDetailBanners = Banner::where('type', 'product_detail')->get();

    $favoriteViews = FavoriteView::where('ad_id', $adId)->get();

    $userLiked = $favoriteViews->where('users_id', auth()->id())->isNotEmpty();

    $totalViews = $favoriteViews->sum('view'); 
    $totalPhoneViews = $favoriteViews->sum('phone_view');

    return view('product_detail', compact('ad', 'productDetailBanners', 'userLiked', 'favoriteViews', 'totalViews', 'totalPhoneViews'));
}


public function edit(Request $request, $id)
{
    // Retrieve the ad based on decrypted ID
    $decryptedId = decrypt($id);

    // Retrieve the ad based on decrypted ID
    $ad = Ad::where('id', $decryptedId)->where('users_id', Auth::id())->first();

    if (!$ad) {
        return redirect()->back()->with('error', 'Ad not found or you do not have permission to edit this ad.');
    }

    // Ensure features are properly converted to array
    $selectedFeatures = $ad->feature ? explode(',', $ad->feature) : [];
    $adImages = AdsImage::where('ad_id', $ad->id)->get();
    $categories = Category::all()->toArray();
    $subCategories = SubCategory::all()->toArray();
    $subCategoryNameTypes = SubCategoryNameType::all()->toArray();

    return view('edit_post_attributes', compact('ad', 'selectedFeatures', 'adImages', 'categories', 'subCategories', 'subCategoryNameTypes'));
}
// Method to handle the update
public function update(Request $request, $id)
{
    $decryptedId = decrypt($id);

    $ad = Ad::where('id', $decryptedId)->where('users_id', Auth::id())->first();
   

 // Check if the ad exists
    if (!$ad) {
        // Redirect back with an error message if ad is not found
        return redirect()->back()->with('error', 'Ad not found or you do not have permission to edit this ad.');
    }

    // Check if the user is authenticated
    if (!auth()->check()) {
        Log::error('User not authenticated.');
        return redirect()->route('login')->with('error', 'You need to be logged in to perform this action.');
    }
    Auth::user()->notify(new AdUpdatedOrCreated($ad));
    // Retrieve authenticated user ID
    $userId = auth()->id();
    Log::info('Authenticated User ID: ' . $userId);
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category_name' => 'nullable|string|max:255',
        'sub_category_name' => 'nullable|string|max:255',
        'sub_category_name_type' => 'nullable|string|max:255',
        'brand' => 'nullable|string|max:255',
        'condition' => 'nullable|string|max:255',
        'type' => 'nullable|string|max:255',
        'device' => 'nullable|string|max:255',
        'make_car' => 'nullable|string|max:255',
        'year_update.*' => 'nullable|string',
        'kms_driven_no.*' => 'nullable|string',
        'feature.*' => 'nullable|string',
        'area_unit' => 'nullable|string|max:255',
        'area_square.*' => 'nullable|string',
        'furnished' => 'nullable|string|max:255',
        'pro_rent_house_bedroom' => 'nullable|string|max:255',
        'pro_rent_house_bathroom' => 'nullable|string|max:255',
        'pro_rent_appart_bedroom' => 'nullable|string|max:255',
        'pro_rent_apart_bathroom' => 'nullable|string|max:255',
        'pro_rent_appart_floor' => 'nullable|string|max:255',
        'bedroom2' => 'nullable|string|max:255',
        'bathroom2' => 'nullable|string|max:255',
        'floor_level2' => 'nullable|string|max:255',
        'rent_shope_bathroom' => 'nullable|string|max:255',
        'floor_level_shope_rent' => 'nullable|string|max:255',
        'bedroom_vacation_rent' => 'nullable|string|max:255',
        'bathroom_vacation_rent' => 'nullable|string|max:255',
        'make_bike' => 'nullable|string|max:255',
        'make_bike2' => 'nullable|string|max:255',
        'pro_sale_house_bedroom' => 'nullable|string',
        'pro_sale_house_bathroom' => 'nullable|string',
        'pro_sale_appart_bedroom' => 'nullable|string',
        'pro_sale_appart_bathroom' => 'nullable|string',
        'construction_state_new' => 'nullable|string',
        'construction_state_new_rent_house' => 'nullable|string',
        'pro_sale_appart_floor_level' => 'nullable|string|max:255',
        'pro_sale_shope_floor_level' => 'nullable|string|max:255',
        'pro_sale_portion_bedroom' => 'nullable|string',
        'pro_sale_portion_bathroom' => 'nullable|string|max:255',
        'pro_sale_portion_floor_level' => 'nullable|string|max:255',
        'no_storeys' => 'nullable|string|max:255',
        'engine_type' => 'nullable|string|max:255',
        'engine_capacity' => 'nullable|string|max:255',
        'ignition_type' => 'nullable|string|max:255',
        'origin' => 'nullable|string|max:255',
        'registration_city' => 'nullable|string|max:255',
        'product' => 'nullable|string|max:255',
        'price' => 'nullable|numeric',
        'location' => 'nullable|string|max:255',
        'ad_status' => 'nullable|string|max:255',
        'deliverable' => 'nullable|string|max:255',
        'image_path.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif,webp',
    ]);

    // Default ad status to 'active' if not provided
    $validatedData['ad_status'] = $validatedData['ad_status'] ?? 'active';

    // Create a new ad record in the database
    $ad->title = $validatedData['title'];
    $ad->description = $validatedData['description'] ?? null;
    $ad->category_name = $validatedData['category_name'] ?? null;
    $ad->sub_category_name = $validatedData['sub_category_name'] ?? null;
    $ad->sub_category_name_type = $validatedData['sub_category_name_type'] ?? null;
    $ad->brand = $validatedData['brand'] ?? $ad->brand;
    $ad->condition = $validatedData['condition'] ?? null;
    $ad->type = $validatedData['type'] ?? null;
    $ad->device = $validatedData['device'] ?? null;
    $ad->make_car = $validatedData['make_car'] ?? null;
    $ad->year_update = implode(' ', $validatedData['year_update'] ?? []);
    $ad->kms_driven_no = implode('', $validatedData['kms_driven_no'] ?? []);
    $ad->feature = implode(',', $request->input('feature', [])); 
    $ad->area_unit = $validatedData['area_unit'] ?? null;
    $ad->area_square = implode(',', $validatedData['area_square'] ?? []);
    $ad->furnished = $validatedData['furnished'] ?? null;
    $ad->pro_rent_house_bedroom = $validatedData['pro_rent_house_bedroom'] ?? null;
    $ad->pro_rent_house_bathroom = $validatedData['pro_rent_house_bathroom'] ?? null;
    $ad->pro_sale_house_bedroom = $validatedData['pro_sale_house_bedroom'] ?? null;
    $ad->pro_sale_house_bathroom = $validatedData['pro_sale_house_bathroom'] ?? null;
    $ad->pro_sale_appart_bedroom = $validatedData['pro_sale_appart_bedroom'] ?? null;
    $ad->pro_sale_appart_bathroom = $validatedData['pro_sale_appart_bathroom'] ?? null;
    $ad->construction_state_new = $validatedData['construction_state_new'] ?? null;
    $ad->pro_rent_appart_bedroom = $validatedData['pro_rent_appart_bedroom'] ?? null;
    $ad->pro_rent_apart_bathroom = $validatedData['pro_rent_apart_bathroom'] ?? null;
    $ad->pro_rent_appart_floor = $validatedData['pro_rent_appart_floor'] ?? null;
    $ad->bedroom2 = $validatedData['bedroom2'] ?? null;
    $ad->bathroom2 = $validatedData['bathroom2'] ?? null;
    $ad->floor_level2 = $validatedData['floor_level2'] ?? null;
    $ad->rent_shope_bathroom = $validatedData['rent_shope_bathroom'] ?? null;
    $ad->floor_level_shope_rent = $validatedData['floor_level_shope_rent'] ?? null;
    $ad->bedroom_vacation_rent = $validatedData['bedroom_vacation_rent'] ?? null;
    $ad->bathroom_vacation_rent = $validatedData['bathroom_vacation_rent'] ?? null;
    $ad->make_bike = $validatedData['make_bike'] ?? null;
    $ad->make_bike2 = $validatedData['make_bike2'] ?? null;
    $ad->construction_state_new_rent_house = $validatedData['construction_state_new_rent_house'] ?? null;
    $ad->pro_sale_appart_floor_level = $validatedData['pro_sale_appart_floor_level'] ?? null;
    $ad->pro_sale_shope_floor_level = $validatedData['pro_sale_shope_floor_level'] ?? null;
    $ad->pro_sale_portion_bedroom = $validatedData['pro_sale_portion_bedroom'] ?? null;
    $ad->pro_sale_portion_bathroom = $validatedData['pro_sale_portion_bathroom'] ?? null;
    $ad->pro_sale_portion_floor_level = $validatedData['pro_sale_portion_floor_level'] ?? null;
    $ad->no_storeys = $validatedData['no_storeys'] ?? null;
    $ad->engine_type = $validatedData['engine_type'] ?? null;
    $ad->engine_capacity = $validatedData['engine_capacity'] ?? null;
    $ad->ignition_type = $validatedData['ignition_type'] ?? null;
    $ad->origin = $validatedData['origin'] ?? null;
    $ad->registration_city = $validatedData['registration_city'] ?? null;
    $ad->product = $validatedData['product'] ?? null;
    $ad->price = $request->input('price');
    $ad->location = $validatedData['location'] ?? null;
    $ad->ad_status = $validatedData['ad_status'];
    $ad->deliverable = $validatedData['deliverable'] ?? null;
    $ad->save();

    // Log success message with ad details
    Log::info('Ad created successfully: ', $ad->toArray());
    Log::info('Request data: ', $request->all());

    // Upload and store images if provided
    if ($request->hasFile('image_path')) {
        $userId = auth()->id(); // Get the current user's ID
        $destinationPath = public_path('assets/images/' . $userId);
    
        // Ensure the directory exists
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }
        foreach ($request->file('image_path') as $image) {
            $originalName = $image->getClientOriginalName();
            $fileName = time() . '-' . $originalName; // Make sure file names are unique
            $image->move($destinationPath, $fileName); // Move the image to the public directory
    
            AdsImage::create([
                'ad_id' => $ad->id,
                'image_path' => 'assets/images/' . $userId . '/' . $fileName, // Save relative path
                'original_name' => $originalName,
            ]);
        }
    }

    return redirect()->route('product.detail', ['id' => encrypt($ad->id)])
    ->with('success', 'Ad with images updated successfully.');

}
public function destroyImage($id)
{
    $image = AdsImage::findOrFail($id);

    // Delete the image file from the storage
    Storage::delete($image->image_path);

    // Remove image from the database
    $image->delete();

    return response()->json(['success' => true]);
}
public function softDelete($id)
    {
        $ad = Ad::find($id);

        if ($ad) {
            $ad->delete();  // This will perform a soft delete if soft deletes are enabled in the model
            return response()->json(['message' => 'Ad soft deleted successfully.'], 200);
        }

        return response()->json(['error' => 'Ad not found.'], 404);
    }
}





