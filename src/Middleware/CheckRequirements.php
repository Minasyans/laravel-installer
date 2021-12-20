<?php

namespace Minasyans\LaravelInstaller\Middleware;

use Closure;
use Illuminate\Http\Request;
use Minasyans\LaravelInstaller\Helpers\RequirementsChecker;

class CheckRequirements
{
    private $requirementChecker;

    /**
     * CheckRequirements constructor.
     * @param RequirementsChecker $checker
     */
    public function __construct(RequirementsChecker $checker)
    {
        $this->requirementChecker = $checker;
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
        $phpVersionInfo = $this->requirementChecker->checkPHPversion(config('laravel-installer.core.minPhpVersion'));
        $packagesInfo = $this->requirementChecker->check(config('laravel-installer.requirements'));

        if ($phpVersionInfo && $packagesInfo) {
            return $next($request);
        } else {
            return redirect(route('LaravelInstaller::requirements'))->with('error', trans('laravel-installer::installer.requirements.errorMessage'));
        }
    }
}
