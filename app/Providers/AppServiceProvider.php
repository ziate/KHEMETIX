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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /**
         * Fix for older MySQL / MariaDB limits with utf8mb4 indexes:
         * "Specified key was too long" (e.g., max key length 1000 bytes)
         */
        Schema::defaultStringLength(191);
    }
}
