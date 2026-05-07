<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
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
        //
        Blade::if('permission', function () {
            return User::getCurrentUser()->role_id == 1;
        });
        
        Blade::if('doctor', function () {
            return User::getCurrentUser()->role_id == 2;
        });
        
        Blade::if('reception', function () {
            return User::getCurrentUser()->role_id == 3;
        });
    }
}
