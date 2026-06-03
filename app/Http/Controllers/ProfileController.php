<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function sendVerificationCode(Request $request)
{
    $request->validate([
        'new_phone' => 'required|numeric|digits:10',
    ]);

    // Get the authenticated user
    $user = Auth::user();
    
    // Update the phone number with the +92 prefix
    $user->phone_no = '+92' . $request->input('new_phone');
    $user->save(); // Save the updated user record

    // Generate a verification code
    $verificationCode = rand(100000, 999999);

    // Save verification code and phone number to session
    Session::put('verification_code', $verificationCode);
    Session::put('phone_number', $user->phone_no);

    // TODO: Implement SMS sending logic here

    // Redirect back with a success message
    return redirect()->back()->with('status', 'Verification code sent.');
}


    public function verifyPhoneCode(Request $request)
{
    $request->validate([
        'verification_code' => 'required|array|min:6|max:6',
        'verification_code.*' => 'required|digits:1'
    ]);

    $storedCode = Session::get('verification_code');
    $newPhone = Session::get('phone_number');
    $enteredCode = implode('', $request->verification_code);

    if ($enteredCode == $storedCode) {
        $user = Auth::user();
        $user->phone_no = $newPhone;
        $user->phone_verified = true;
        $user->save();

        // Clear the session codes
        Session::forget('verification_code');
        Session::forget('phone_number');

        return response()->json(['success' => true], 200);
    }

    return response()->json(['success' => false], 400);
}

    public function nowPage()
{
    return view('now-page');
}
}
