<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function (?User $user) {
            return $user?->profileable_type === 'App\Models\Admin';
        });

        Blade::if('admin', function () {
            return Gate::allows('admin');
        });

        Gate::define('customer', function (?User $user) {
            return $user?->profileable_type === 'App\Models\Customer';
        });

        Blade::if('customer', function () {
            return Gate::allows('customer');
        });
    }
}
