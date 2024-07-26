<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\AdminLayout;
use App\View\Components\UserLayout;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('app-user-layout', UserLayout::class);
        Blade::component('app-admin-layout', AdminLayout::class);
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    
}

