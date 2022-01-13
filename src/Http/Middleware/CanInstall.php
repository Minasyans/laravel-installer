<?php

namespace Minasyans\LaravelInstaller\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Minasyans\LaravelInstaller\Traits\AppStatusCheck;

class CanInstall
{
    use AppStatusCheck;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $installerEnabled = filter_var(config('laravel-installer.installerEnabled', true), FILTER_VALIDATE_BOOLEAN);
        $ignoreAlreadyInstalled = filter_var(config('laravel-installer.ignoreAlreadyInstalled', false), FILTER_VALIDATE_BOOLEAN);

        if (!$ignoreAlreadyInstalled && ($this->alreadyInstalled() || !$installerEnabled)) {
            $installedRedirect = config('laravel-installer.installedAlreadyAction');

            switch ($installedRedirect) {
                case 'route':
                    $routeName = config('laravel-installer.installed.redirectOptions.route.name');
                    $data = config('laravel-installer.installed.redirectOptions.route.message');

                    return redirect()->route($routeName)->with(['data' => $data]);
                    break;
                case 'abort':
                    abort(config('laravel-installer.installed.redirectOptions.abort.type'));
                    break;
                case 'dump':
                    $dump = config('laravel-installer.installed.redirectOptions.dump.data');
                    dd($dump);
                    break;
                case '404':
                case 'default':
                default:
                    abort(404);
                    break;
            }
        }

        return $next($request);
    }
}
