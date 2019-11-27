<?php

namespace ProtestSoftware\LaravelMediaModels;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use ProtestSoftware\LaravelMediaModels\Http\Controllers\MediaController;

class LaravelMediaModelsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('laravel-media-models.php'),
            ], 'config');


            if (!class_exists('CreateMediaTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_media_table.php.stub' => database_path('/migrations/' . date("Y_m_d_His", time()) . '_create_media_table.php'),
                ], 'migrations');
            }
        }

        Route::post('api/media', '\ProtestSoftware\LaravelMediaModels\Http\Controllers\MediaController@store')->middleware('auth:api');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'laravel-media-models');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-media-models', function () {
            return new LaravelMediaModels;
        });
    }
}
