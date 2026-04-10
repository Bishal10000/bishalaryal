<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
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
        if (app()->environment('production')) {
            URL::forceScheme('https');

            // Keep generated URLs and Vite assets on the active host (Railway/custom domain).
            if (app()->bound('request')) {
                $rootUrl = request()->getSchemeAndHttpHost();
                URL::forceRootUrl($rootUrl);
                config(['app.url' => $rootUrl]);
                config(['app.asset_url' => null]);
            }
        }
    }
}
