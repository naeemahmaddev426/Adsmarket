<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\VerifyEmail;

class CustomRegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
{
    // Check if the user is registering normally or via Google
    $isGoogleLogin = $request->has('google_token'); // Adjust this to how you identify Google login

    $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'phone_no' => ['required', 'string', 'max:15'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'role' => ['required', 'in:admin,user'],
        'terms' => ['accepted'],
    ];

    // Only add the uniqueness rule for the email if it's a regular registration (not Google login)
    if (!$isGoogleLogin) {
        $rules['email'][] = 'unique:users';
    }

    // Validate the request data
    $request->validate($rules);

    // Prepend the +92 prefix to the phone number
    $phone_no = '+92' . ltrim($request->phone_no, '0');

    // Generate a unique verification token
    $token = Str::random(64);

    // Remove any existing record with the same email
    DB::table('email_verifications')->where('email', $request->email)->delete();

    // Insert new record in email_verifications table
    DB::table('email_verifications')->insert([
        'name' => $request->name,
        'email' => $request->email,
        'phone_no' => $phone_no,
        'password' => Hash::make($request->password),
        'role' => $request->role,
        'token' => $token,
        'created_at' => now(),
    ]);

    // Send the verification email
    Mail::to($request->email)->send(new VerifyEmail($token));

    // Redirect to a "check your email" page
    return redirect()->route('verification.notice');
}


public function verifyEmail($token)
{
    // Look up the token in the email_verifications table
    $verificationData = DB::table('email_verifications')->where('token', $token)->first();

    if (!$verificationData) {
        return redirect('/')->withErrors(['invalid_token' => 'Invalid or expired verification link.']);
    }

    // Create or update the user record in the main users table
    $user = User::updateOrCreate(
        ['email' => $verificationData->email],
        [
            'name' => $verificationData->name,
            'phone_no' => $verificationData->phone_no,
            'password' => $verificationData->password, // already hashed
            'role' => $verificationData->role,
            'email_verified_at' => now(), // Set the verification timestamp
        ]
    );

    // Delete the temporary verification record
    DB::table('email_verifications')->where('token', $token)->delete();

    // Log the user in
    Auth::login($user);

    return redirect('/')->with('message', 'Email verified successfully. You are now logged in.');
}



public function resendVerificationEmail(Request $request)
{
    // Ensure the user is logged in
    $user = Auth::user();

    // Check if the user is already verified
    if ($user->email_verified_at) {
        return redirect('/')->with('message', 'Your email is already verified.');
    }

    // Generate a new token
    $token = Str::random(64);

    // Remove any previous verification records for this user
    DB::table('email_verifications')->where('email', $user->email)->delete();

    // Insert a new verification record
    DB::table('email_verifications')->insert([
        'name' => $user->name,
        'email' => $user->email,
        'phone_no' => $user->phone_no,
        'password' => $user->password,
        'role' => $user->role,
        'token' => $token,
        'created_at' => now(),
    ]);

    // Resend the verification email
    Mail::to($user->email)->send(new VerifyEmail($token));

    return back()->with('message', 'A new verification email has been sent to your email address.');
}

    

    
}

