<?php

namespace App\Socialite;

use Laravel\Socialite\Two\GoogleProvider as BaseGoogleProvider;

/**
 * Uses Google's current OAuth token endpoint while retaining Socialite's
 * standard Google authorization, state, scopes, and user mapping behavior.
 */
class GoogleProvider extends BaseGoogleProvider
{
    protected function getTokenUrl()
    {
        return 'https://oauth2.googleapis.com/token';
    }
}
