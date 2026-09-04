<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class GoogleController extends Controller
{
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $googleId = (string) $googleUser->getId();
            $email = Str::lower(trim((string) $googleUser->getEmail()));

            if ($googleId === '' || ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw ValidationException::withMessages([
                    'email' => 'Google did not return a valid account email. Please use email and password instead.',
                ]);
            }

            $user = DB::transaction(function () use ($googleId, $email, $googleUser) {
                // Case 1: this Google account is already linked.
                $user = User::where('google_id', $googleId)->lockForUpdate()->first();

                if ($user) {
                    return $user;
                }

                // Case 2: retain an existing password account and link it once.
                $user = User::where('email', $email)->lockForUpdate()->first();

                if ($user) {
                    if (filled($user->google_id) && $user->google_id !== $googleId) {
                        throw ValidationException::withMessages([
                            'email' => 'This email address is already linked to another Google account.',
                        ]);
                    }

                    $user->forceFill(['google_id' => $googleId])->save();

                    return $user;
                }

                // Case 3: create a regular User model for a new Google account.
                return User::create([
                    'name' => $googleUser->getName() ?: Str::before($email, '@'),
                    'email' => $email,
                    'google_id' => $googleId,
                    'password' => Hash::make(Str::random(40)),
                    'role' => 'user',
                    'email_verified_at' => now(),
                ]);
            });

            // Use the exact same stateful web guard as Fortify's password login.
            Auth::guard('web')->login($user);
            $request->session()->regenerate();

            return redirect()->intended(route('index'));
        } catch (ValidationException $exception) {
            return redirect()->route('login')->withErrors($exception->errors());
        } catch (Throwable $exception) {
            Log::error('Google OAuth callback failed.', [
                'exception' => $exception::class,
                'message' => $exception->getMessage(),
            ]);

            return redirect()->route('login')->withErrors([
                'email' => 'Google sign-in could not be completed. Please try again.',
            ]);
        }
    }

}
