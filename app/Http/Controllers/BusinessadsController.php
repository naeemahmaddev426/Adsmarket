<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Notification;
use App\Models\Adsbusiness;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Notifications\AdsbusinessNotification;

class BusinessadsController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('/ads_for_business', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            // Validate request
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'phone_no' => 'required|string|regex:/^03[0-9]{9}$/', // Pakistani mobile number format
                'category_name' => 'required|string|max:255',
                'interests' => 'nullable|array',
                'interests.*' => 'string', // Ensure each interest is a string
            ]);

            // Save data to the database
            $adsbusiness = Adsbusiness::create([
                'name' => $validatedData['name'],
                'phone_no' => $validatedData['phone_no'],
                'category_name' => $validatedData['category_name'],
                'interests' => implode(',', $validatedData['interests'] ?? []),
            ]);

            // Notify users with the 'admin' role
            $admins = User::where('role', 'admin')->get();
            if ($admins->isNotEmpty()) {
                Notification::send($admins, new AdsbusinessNotification($adsbusiness));
                \Log::info('Notification sent to admins for Adsbusiness: ' . $adsbusiness->name);
            }
            // Redirect to the success page with a success message
            return redirect()->route('business_form_success')->with('success', 'Ad posted successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error creating ad: ', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            // Redirect back with the error message
            return redirect()->back()->withInput()->with('error', 'An error occurred while posting your ad. Please try again.');
        }
    }
    public function show(Request $request, $id)
{
    // Fetch the adbusiness record by id
    $adsbusiness = Adsbusiness::findOrFail($id);

    // Pass the data to the view
    return view('admin.user_data', compact('adsbusiness'));
}


}
