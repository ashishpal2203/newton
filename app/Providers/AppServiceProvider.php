<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share Settings with all views
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $settings = \Illuminate\Support\Facades\Cache::remember('global_settings', 60*60, function () {
                return clone \App\Models\Setting::pluck('value', 'key');
            });
            
            $activePopup = \App\Models\AnnouncementPopup::where('is_active', true)->first();
            
            $view->with([
                'global_settings' => $settings,
                'activePopup' => $activePopup
            ]);
        });
    }
}
