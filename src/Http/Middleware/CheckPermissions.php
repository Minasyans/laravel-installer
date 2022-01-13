<?php

namespace Minasyans\LaravelInstaller\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Minasyans\LaravelInstaller\Manager\PermissionsChecker;

class CheckPermissions
{
    private $permissionChecker;

    /**
     * CheckPermissions constructor.
     * @param PermissionsChecker $checker
     */
    public function __construct(PermissionsChecker $checker)
    {
        $this->permissionChecker = $checker;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $permissionInfo = $this->permissionChecker->check(config('laravel-installer.permissions'));

        if ($permissionInfo) {
            return $next($request);
        } else {
            return redirect(route('LaravelInstaller::permissions'))->with('error', trans('laravel-installer::installer.permissions.errorMessage'));
        }
    }
}
