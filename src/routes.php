<?php

use Illuminate\Support\Facades\Route;

use Minasyans\LaravelInstaller\Http\Controllers\LanguageController;
use Minasyans\LaravelInstaller\Http\Controllers\DatabaseController;
use Minasyans\LaravelInstaller\Http\Controllers\StarterKitController;
use Minasyans\LaravelInstaller\Http\Controllers\EnvironmentController;
use Minasyans\LaravelInstaller\Http\Controllers\PermissionsController;
use Minasyans\LaravelInstaller\Http\Controllers\RequirementsController;
use Minasyans\LaravelInstaller\Http\Controllers\WelcomeController;

Route::group(['prefix' => 'install', 'as' => 'LaravelInstaller::', 'namespace' => 'Minasyans\LaravelInstaller\Http\Controllers'], function () {

    Route::middleware(['web'])->group(function () {

        Route::get('localization/{locale}', ['as' => 'localization.switch', 'uses' => 'LocalizationController@switchLanguage']);

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
            Route::post('starter-kit/blank', [StarterKitController::class, 'blank'])->name('starterKit.blank');
            Route::get('starter-kit/final', [StarterKitController::class, 'finish'])->name('starterKit.final');
        });
    });
});

Route::group(['prefix' => 'update', 'as' => 'LaravelUpdater::', 'namespace' => 'Minasyans\LaravelInstaller\Http\Controllers', 'middleware' => 'web'], function () {
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
