<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Ad;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use App\Models\adsimage;
use App\Models\SubCategoryNameType;
use App\Models\SubCategory;
use App\Notifications\AdUpdatedOrCreated;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Facades\Image;

class post_adController extends Controller
{
    public function index(Request $request)
{
    $cat = $request->query('cat');
    $sub_cat = $request->query('sub_cat');
    $sub_cat_type = $request->query('sub_cat_type');
    $subCategories = SubCategory::all();
    $subCategoryNameTypes = SubCategoryNameType::all();
    // Logging query parameters for debugging
    Log::info('Query parameters: ', $request->all());

    return view('post_ad_attributes', compact('cat', 'sub_cat', 'sub_cat_type','subCategories','subCategoryNameTypes'));
}


    public function create()
    {
        // Fetch all categories with their related subcategories and subcategory name types
        $categories = Category::with('subcategories.subCategoryNameTypes')->get();
    
        // Pass the fetched categories to the view
        return view('post_ad', compact('categories'));
    }
    
    public function main()
    {
        $categories = Category::all(); // Fetch all categories
        return view('post_ad', compact('categories'));
    }
public function store(Request $request)
{
    try {
        // Ensure the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to perform this action.');
        }

        // Retrieve authenticated user
        $user = auth()->user();
        $userId = $user->id;
        Log::info('Authenticated User ID: ' . $userId);

        // Validate incoming request data
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
            'price' => 'nullable|string|max:255',
            'phone_no' => 'nullable|numeric',
            'location' => 'nullable|string|max:255',
            'ad_status' => 'nullable|string|max:255',
            'deliverable' => 'nullable|string|max:255',
            'image_path.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif,webp',
        ]);
        $phoneNo = $request->input('phone_no');
            if ($phoneNo && !str_starts_with($phoneNo, '+92')) {
                $phoneNo = '+92' . $phoneNo;
            }
    
            // Save phone number if user is logged in with Google and phone_no is not already saved
            if ($user->google_id && !$user->phone_no && $phoneNo) {
                $user->phone_no = $phoneNo;
                $user->save();
            }
        // Default ad status to 'active' if not provided
        $validatedData['ad_status'] = $validatedData['ad_status'] ?? 'active';
    
        // Create a new ad record in the database
        $ad = new Ad();
        $ad->users_id = $userId;
        $ad->title = $validatedData['title'] ?? null;
        $ad->description = $validatedData['description'] ?? null;
        $ad->category_name = $validatedData['category_name'] ?? null;
        $ad->sub_category_name = $validatedData['sub_category_name'] ?? null;
        $ad->sub_category_name_type = $validatedData['sub_category_name_type'] ?? null;
        $ad->brand = $validatedData['brand'] ?? null;
        $ad->condition = $validatedData['condition'] ?? null;
        $ad->type = $validatedData['type'] ?? null;
        $ad->device = $validatedData['device'] ?? null;
        $ad->make_car = $validatedData['make_car'] ?? null;
        $ad->year_update = implode('', $validatedData['year_update'] ?? []);
        $ad->kms_driven_no = implode('', $validatedData['kms_driven_no'] ?? []);
        $ad->feature = implode(',', $request->input('feature', [])); 
        $ad->area_unit = $validatedData['area_unit'] ?? null;
        $ad->area_square = implode('', $validatedData['area_square'] ?? []);
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
        $ad->price = $validatedData['price'] ?? null;
        $ad->location = $validatedData['location'] ?? null;
        $ad->ad_status = $validatedData['ad_status'];
        $ad->deliverable = $validatedData['deliverable']?? null;
    
        $ad->save();

        Log::info('Ad created successfully: ' . $ad->id);

        // Notify the user
        $user->notify(new AdUpdatedOrCreated($ad));
        Log::info('Notification sent to user.');

        // Handle file uploads
        if ($request->hasFile('image_path')) {
            $destinationPath = public_path('assets/images/' . $userId); // Save in the user's folder

            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            foreach ($request->file('image_path') as $image) {
                $originalName = $image->getClientOriginalName();
                $fileName = time() . '-' . $originalName;
                $image->move($destinationPath, $fileName);

                // Save image details in ads_images table
                AdsImage::create([
                    'ad_id' => $ad->id,
                    'image_path' => 'assets/images/' . $userId . '/' . $fileName,
                    'original_name' => $originalName,
                ]);
            }
        }

        // Redirect with success message
        return redirect()->route('index')->with('success', 'Ad and images uploaded successfully.');
    } catch (\Exception $e) {
        // Log the error with details for debugging
        Log::error('Error creating ad: ', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        // Redirect back with error message
        return redirect()->back()->withInput()->with('error', 'An error occurred while posting your ad. Please try again.');
    }
}

}