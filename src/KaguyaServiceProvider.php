<?php

/**
 * @author   Panji Setya Nur Prawira
 * @package  Kaguya
 */

namespace PanjiNamjaElf\Kaguya;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class KaguyaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::middlewareGroup('kaguya', config('kaguya.middleware', []));

        $this->registerRoutes();
        $this->registerPublishing();

        Setting::observe(SettingObserver::class);

        $this->loadTranslationsFrom(
            __DIR__ . '/../resources/lang', 'kaguya'
        );

        $this->loadViewsFrom(
            __DIR__ . '/../resources/views', 'kaguya'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/kaguya.php', 'kaguya');

        $this->app->singleton('kaguya', function () {
            return new Kaguya();
        });

        $this->commands([
            Console\InstallCommand::class,
            Console\ResetCommand::class,
        ]);
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            Route::get('/', 'SettingController@index')->name('settings');
            Route::post('/', 'SettingController@store')->name('settings');
        });
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    private function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ], 'kaguya-migrations');

            $this->publishes([
                __DIR__ . '/../public' => public_path('vendor/kaguya'),
            ], 'kaguya-assets');

            $this->publishes([
                __DIR__ . '/../config/kaguya.php' => config_path('kaguya.php'),
            ], 'kaguya-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/kaguya'),
            ], 'kaguya-views');

            $this->publishes([
                __DIR__ . '/../resources/lang' => resource_path('lang/vendor/kaguya'),
            ], 'kaguya-translations');
        }
    }

    /**
     * Get the route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            'namespace'  => 'PanjiNamjaElf\Kaguya\Http\Controllers',
            'prefix'     => config('kaguya.path'),
            'middleware' => 'kaguya',
        ];
    }
}
