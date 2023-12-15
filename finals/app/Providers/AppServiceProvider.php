<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // You can register bindings or services here
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Set a default string length for database migrations
        Schema::defaultStringLength(191);
    }
}
