<?php

namespace LaravelHealth;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class HealthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/health.php',
            'health'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('vendor/health'),
        ], 'health');

        Route::group(['namespace' => 'LaravelHealth\Http\Controllers'], function () {
            $this->loadRoutesFrom(__DIR__ . '/../src/routes/web.php');
        });

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'health');
    }
}
