<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(): RedirectResponse
{
    $user = Socialite::driver('google')->user();

    // Check if the user already exists
    $existingUser = User::where('google_id', $user->id)->first();

    if ($existingUser) {
        // Log in the existing user
        auth()->login($existingUser, true);
    } else {
        // Create a new user with the "user" role
        $newUser = new User();
        $newUser->name = $user->name;
        $newUser->email = $user->email;
        $newUser->google_id = $user->id;
        $newUser->role = 'user'; // Set the default role to "user"
        $newUser->password = bcrypt(Str::random(16)); // Generate a random password since it's not required

        $newUser->save();

        // Log in the new user
        auth()->login($newUser, true);
    }

    return redirect()->intended('/');
}

}
