<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
{
    if (env('APP_ENV') === 'production') {
        \URL::forceScheme('https');
    }

    
    \View::composer('*', function ($view) {
        if (\Illuminate\Support\Facades\Auth::check()) {
            $view->with('sidebarTrips', \Illuminate\Support\Facades\Auth::user()->trips()->latest()->take(5)->get());
        }
    });

    
}
}