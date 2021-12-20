<?php

namespace Minasyans\LaravelInstaller\Middleware;

use Closure;
use Illuminate\Http\Request;
use Minasyans\LaravelInstaller\Helpers\AppStatusCheck;
use Minasyans\LaravelInstaller\Helpers\MigrationsHelper;

class CanUpdate
{
    use MigrationsHelper,
        AppStatusCheck;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $updateEnabled = filter_var(config('laravel-installer.updaterEnabled'), FILTER_VALIDATE_BOOLEAN);
        switch ($updateEnabled) {
            case true:
                // if the application has not been installed,
                // redirect to the installer
                if (! $this->alreadyInstalled()) {
                    return redirect()->route('LaravelInstaller::welcome');
                }

                if ($this->alreadyUpdated()) {
                    abort(404);
                }
                break;

            case false:
            default:
                abort(404);
                break;
        }

        return $next($request);
    }

    /**
     * If application is already updated.
     *
     * @return bool
     */
    public function alreadyUpdated(): bool
    {
        $migrations = $this->getMigrations();
        $dbMigrations = $this->getExecutedMigrations();

        // If the count of migrations and dbMigrations is equal,
        // then the update as already been updated.
        if (count($migrations) == count($dbMigrations)) {
            return true;
        }

        // Continue, the app needs an update
        return false;
    }
}
