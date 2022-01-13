<?php

namespace Minasyans\LaravelInstaller;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Component;
use Livewire\Livewire;
use Minasyans\LaravelInstaller\Http\Commands\StarterKitCommand;
use Minasyans\LaravelInstaller\Http\Middleware\Localization;
use Minasyans\LaravelInstaller\Http\Middleware\CanConfigureApplication;
use Minasyans\LaravelInstaller\Http\Middleware\CanInstall;
use Minasyans\LaravelInstaller\Http\Middleware\CanUpdate;
use Minasyans\LaravelInstaller\Http\Middleware\CheckPermissions;
use Minasyans\LaravelInstaller\Http\Middleware\CheckRequirements;
use ReflectionClass;
use SplFileInfo;

class LaravelInstallerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    protected $packageDir;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot(): void
    {
        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('web', Localization::class);

         $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-installer');
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-installer');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
         $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->app['router']->aliasMiddleware('install', CanInstall::class);
        $this->app['router']->aliasMiddleware('update', CanUpdate::class);
        $this->app['router']->aliasMiddleware('checkRequirements', CheckRequirements::class);
        $this->app['router']->aliasMiddleware('checkPermissions', CheckPermissions::class);
        $this->app['router']->aliasMiddleware('configureApplication', CanConfigureApplication::class);

        $this->registerPackageDir();
        $this->configureComponents();
        $this->configureCommands();
        $this->publish();

        $this->loadViewComponentsAs('limpio', [
            Button::class,
        ]);

        if (class_exists(Livewire::class)) {
            $this->registerLivewireComponentDirectory(__DIR__ . '/Http/Livewire', 'Minasyans\\LaravelInstaller\\Http\\Livewire', '');
        }
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
     * Configure the Laravel Installer Blade components.
     *
     * @return void
     */
    protected function configureComponents()
    {
        $this->callAfterResolving(BladeCompiler::class, function () {
            $this->registerComponent('input');
        });
    }

    /**
     * Register the given component.
     *
     * @param  string  $component
     * @return void
     */
    protected function registerComponent(string $component)
    {
        Blade::component('laravel-installer::components.'.$component, 'installer-'.$component);
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
    }

    /**
     * Configure the commands offered by the application.
     *
     * @return void
     */
    protected function configureCommands()
    {
        $this->commands([
            StarterKitCommand::class
        ]);
    }

    /**
     * Define package directory.
     *
     * @return string
     */
    protected function registerPackageDir(): string
    {
        return $this->packageDir = base_path().'/vendor/minasyans/laravel-installer/';
    }

    /**
     * @param $directory
     * @param $namespace
     * @param string $aliasPrefix
     * @return void
     */
    protected function registerLivewireComponentDirectory($directory, $namespace, string $aliasPrefix = '')
    {
        $filesystem = new Filesystem();

        if (! $filesystem->isDirectory($directory)) {
            return;
        }

        collect($filesystem->allFiles($directory))
            ->map(function (SplFileInfo $file) use ($namespace) {
                return (string) Str::of($namespace)
                    ->append('\\', $file->getRelativePathname())
                    ->replace(['/', '.php'], ['\\', '']);
            })
            ->filter(function ($class) {
                return is_subclass_of($class, Component::class) && ! (new ReflectionClass($class))->isAbstract();
            })
            ->each(function ($class) use ($namespace, $aliasPrefix) {
                $alias = Str::of($class)
                    ->after($namespace . '\\')
                    ->replace(['/', '\\'], '.')
                    ->prepend($aliasPrefix)
                    ->explode('.')
                    ->map([Str::class, 'kebab'])
                    ->implode('.');

                Livewire::component($alias, $class);
            });
    }

    /**
     * If the Package files are published do not do it again.
     *
     * @return void
     */
    protected function publish()
    {
        $config = config_path('laravel-installer.php');
        $assets = public_path('vendor'.DIRECTORY_SEPARATOR.'laravel-installer');
        $views = resource_path('views'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'laravel-installer');

        if (!File::isFile($config) || File::ensureDirectoryExists($assets) || File::ensureDirectoryExists($views)) {
            $this->bootForConsole();

            Artisan::call('vendor:publish', ['--provider' => 'Minasyans\LaravelInstaller\LaravelInstallerServiceProvider']);
        }
    }
}
