<?php

namespace App\Providers;

use App\CustomFacade\DateClass;
use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //binding custom services
        $this->app->bind('App\CustomServices\CustomServiceInterface', 'App\CustomServices\CustomService');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // binding custom facade
        $this->app->bind('dateclass', function(){
            return new DateClass();
        });

    }
}
