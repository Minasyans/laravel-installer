<?php

namespace Minasyans\LaravelInstaller\Http\Controllers;

use Illuminate\Routing\Controller;
use Minasyans\LaravelInstaller\Manager\PermissionsChecker;

class PermissionsController extends Controller
{
    /**
     * @var PermissionsChecker
     */
    protected $permissions;

    /**
     * @param PermissionsChecker $checker
     */
    public function __construct(PermissionsChecker $checker)
    {
        $this->permissions = $checker;
    }

    /**
     * Display the permissions check page.
     *
     * @return \Illuminate\View\View
     */
    public function permissions()
    {
        $permissions = $this->permissions->check(
            config('laravel-installer.permissions')
        );

        return view('laravel-installer::permissions', compact('permissions'));
    }
}
