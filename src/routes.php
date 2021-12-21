<?php

use Illuminate\Support\Facades\Route;

use Minasyans\LaravelInstaller\Controllers\StarterKitController;
use Minasyans\LaravelInstaller\Controllers\AccountController;
use Minasyans\LaravelInstaller\Controllers\CommandController;
use Minasyans\LaravelInstaller\Controllers\DatabaseController;
use Minasyans\LaravelInstaller\Controllers\EnvironmentController;
use Minasyans\LaravelInstaller\Controllers\FinalController;
use Minasyans\LaravelInstaller\Controllers\PermissionsController;
use Minasyans\LaravelInstaller\Controllers\RequirementsController;
use Minasyans\LaravelInstaller\Controllers\WelcomeController;

Route::group(['prefix' => 'install', 'as' => 'LaravelInstaller::', 'namespace' => 'Minasyans\LaravelInstaller\Controllers'], function () {

    Route::middleware(['web'])->group(function () {
        Route::middleware(['install'])->group(function () {
            Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

            Route::get('requirements', [RequirementsController::class, 'requirements'])->name('requirements');

            Route::get('permissions', [PermissionsController::class, 'permissions'])->name('permissions')->middleware('checkRequirements');

            Route::middleware('checkPermissions')->group(function () {
                Route::get('environment', [EnvironmentController::class, 'environmentMenu'])->name('environment');
                Route::get('environment/wizard', [EnvironmentController::class, 'environmentWizard'])->name('environmentWizard');
                Route::get('environment/classic', [EnvironmentController::class, 'environmentClassic'])->name('environmentClassic');
            });

            Route::post('environment/saveWizard', [EnvironmentController::class, 'saveWizard'])->name('environmentSaveWizard');
            Route::post('environment/saveClassic', [EnvironmentController::class, 'saveClassic'])->name('environmentSaveClassic');

            Route::get('database', [DatabaseController::class, 'database'])->name('database');

            Route::get('command', [
                'as' => 'command',
                'uses' => 'CommandController@commands',
            ]);

            Route::get('final', [
                'as' => 'final',
                'uses' => 'FinalController@finish',
            ]);
        });

        Route::middleware(['configureApplication'])->group(function () {
            Route::get('starter-kit', [StarterKitController::class, 'chooseStarterKit'])->name('chooseStarterKit');
            Route::post('starter-kit', [StarterKitController::class, 'useTheme'])->name('useTheme');
            Route::get('starter-kit/final', [StarterKitController::class, 'finish'])->name('starterKit.final');

            Route::get('create-account', [AccountController::class, 'createAccount'])->name('createAccount');
            Route::post('create-account', [AccountController::class, 'store'])->name('store');
        });
    });

});

Route::group(['prefix' => 'update', 'as' => 'LaravelUpdater::', 'namespace' => 'Minasyans\LaravelInstaller\Controllers', 'middleware' => 'web'], function () {
    Route::group(['middleware' => 'update'], function () {
        Route::get('/', [
            'as' => 'welcome',
            'uses' => 'UpdateController@welcome',
        ]);

        Route::get('overview', [
            'as' => 'overview',
            'uses' => 'UpdateController@overview',
        ]);

        Route::get('database', [
            'as' => 'database',
            'uses' => 'UpdateController@database',
        ]);
    });

    // This needs to be out of the middleware because right after the migration has been
    // run, the middleware sends a 404.
    Route::get('final', [
        'as' => 'final',
        'uses' => 'UpdateController@finish',
    ]);
});
