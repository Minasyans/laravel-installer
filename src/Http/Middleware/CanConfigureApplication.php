<?php

namespace Minasyans\LaravelInstaller\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Minasyans\LaravelInstaller\Traits\AppStatusCheck;

class CanConfigureApplication
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
        if ($this->starterKitSelected()) {
            $installedRedirect = config('laravel-installer.installedAlreadyAction');

            switch ($installedRedirect) {

                case 'route':
                    $routeName = config('laravel-installer.installed.redirectOptions.route.name');
                    $data = config('laravel-installer.installed.redirectOptions.route.message');

                    return redirect()->route($routeName)->with(['data' => $data]);

                case 'abort':
                    abort(config('laravel-installer.installed.redirectOptions.abort.type'));
                    break;

                case 'dump':
                    $dump = config('laravel-installer.installed.redirectOptions.dump.data');
                    dd($dump);

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
