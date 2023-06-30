<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ResponseProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('ResponseService', 'App\Services\Response\ResponseService');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
