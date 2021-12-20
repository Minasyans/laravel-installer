<?php

namespace Minasyans\LaravelInstaller;

use Illuminate\Support\ServiceProvider;
use Minasyans\LaravelInstaller\Commands\StarterKitCommand;
use Minasyans\LaravelInstaller\Middleware\CanConfigureApplication;
use Minasyans\LaravelInstaller\Middleware\CanInstall;
use Minasyans\LaravelInstaller\Middleware\CanSetupWeb;
use Minasyans\LaravelInstaller\Middleware\CanUpdate;
use Minasyans\LaravelInstaller\Middleware\CheckPermissions;
use Minasyans\LaravelInstaller\Middleware\CheckRequirements;

class LaravelInstallerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
         $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-installer');
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-installer');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->app['router']->aliasMiddleware('install', CanInstall::class);
        $this->app['router']->aliasMiddleware('update', CanUpdate::class);
        $this->app['router']->aliasMiddleware('checkRequirements', CheckRequirements::class);
        $this->app['router']->aliasMiddleware('checkPermissions', CheckPermissions::class);
        $this->app['router']->aliasMiddleware('configureApplication', CanConfigureApplication::class);

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        $this->commands([
            StarterKitCommand::class
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-installer.php', 'laravel-installer');

        // Register the service the package provides.
        $this->app->singleton('laravel-installer', function ($app) {
            return new LaravelInstaller;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['laravel-installer'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravel-installer.php' => config_path('laravel-installer.php'),
        ], 'laravel-installer.config');

        // Publishing the views.
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/laravel-installer'),
        ], 'laravel-installer.views');

        // Publishing assets.
        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/laravel-installer'),
        ], 'laravel-installer.views');

        // Publishing the translation files.
        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-installer'),
        ], 'laravel-installer.views');

        // Registering package commands.
         $this->commands([]);
    }
}
