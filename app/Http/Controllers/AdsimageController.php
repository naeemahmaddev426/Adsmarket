<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Ad;
use App\Models\AdsImage; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Log;
class AdsimageController extends Controller
{
    
    private function getUserAdsData($userId)
    {
        // Count total ads for the user
        $viewAdsCount = Ad::where('users_id', $userId)->count();
    
        // Count active ads
        $activeAdsCount = Ad::where('users_id', $userId)
                            ->where('ad_status', 'Active')
                            ->count();
    
        // Count inactive ads
        $inactiveAdsCount = Ad::where('users_id', $userId)
                              ->where('ad_status', 'Inactive')
                              ->count();
    
        // Log the count of active ads (optional)
        Log::info('$activeAdsCount: ' . $activeAdsCount);
    
        // Log the count of inactive ads (optional)
        Log::info('$inactiveAdsCount: ' . $inactiveAdsCount);
    
        $ads = Ad::with('images')
                 ->where('users_id', $userId)
                 ->get();
    
        return compact('ads', 'viewAdsCount', 'activeAdsCount', 'inactiveAdsCount');
    }
    

    /**
     * Display a listing of the user's ads.
     */
    public function index()
    {
        $user = Auth::user();
    
        $data = $this->getUserAdsData($user->id);
    
        return view('user.index', $data);
    }
    

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image_path.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        try {
            if ($request->hasFile('image_path')) {
                foreach ($request->file('image_path') as $image) {

                $originalName = $image->getClientOriginalName();
                $imageName = time() . '_' . $originalName;
                    $directory = public_path('assets/images/48');
                    $savedImage = AdsImage::create([
                        'ad_id' => '48', 
                        'image_path' => 'assets/images/48/' . $imageName, 
                    ]);

                    if ($savedImage) {
                        $image->move($directory, $imageName); 
                        Log::info('Image saved: ' . $imageName);
                    } else {
                        Log::error('Failed to save image to database.');
                    }
                }

                return redirect()->back()->with('success', 'Images uploaded successfully.');
            } else {
                Log::error('No images found in the request.');
                return redirect()->back()->withErrors(['No images found in the request.']);
            }

            Log::debug(DB::getQueryLog());
        } catch (\Exception $e) {
            Log::error('Exception while saving image: ' . $e->getMessage());
            return redirect()->back()->withErrors(['Failed to upload images. Please try again.']);
        }
    }

    


    

    /**
     * Display the specified resource.
     */
    public function show(adsimage $adsimage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(adsimage $adsimage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, adsimage $adsimage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(adsimage $adsimage)
    {
        //
    }
}
