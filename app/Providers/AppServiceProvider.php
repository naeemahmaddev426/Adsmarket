<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\AdminLayout;
use App\View\Components\UserLayout;
use Illuminate\Support\Facades\View;
use App\Models\FavoriteView;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('app-user-layout', UserLayout::class);
        Blade::component('app-admin-layout', AdminLayout::class);
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->line('Click the button below to verify your email address.')
                ->action('Verify Email Address', $url);
        });
        View::composer('search-results', function ($view) {
            $userId = Auth::id();
        
            // Fetch recently viewed ads with ad details and images
            $recentlyview = FavoriteView::whereIn('id', function ($query) use ($userId) {
                    $query->select(DB::raw('MAX(id)'))
                        ->from('favorite_view')
                        ->where('users_id', $userId)
                        ->where('view', '>', 0)
                        ->groupBy('ad_id'); // Get the latest entry for each ad_id
                })
                ->with(['ad', 'ad.images']) // Load ad and its associated images
                ->orderBy('created_at', 'desc')
                ->take(3) // Limit to 3 ads
                ->get();
        
            $view->with('recentlyview', $recentlyview);
        });
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    
}

