<?php

namespace Minasyans\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;
use Minasyans\LaravelInstaller\Helpers\RequirementsChecker;

class RequirementsController extends Controller
{
    /**
     * @var RequirementsChecker
     */
    protected $requirements;

    /**
     * @param RequirementsChecker $checker
     */
    public function __construct(RequirementsChecker $checker)
    {
        $this->requirements = $checker;
    }

    /**
     * Display the requirements page.
     *
     * @return \Illuminate\View\View
     */
    public function requirements()
    {
        $phpSupportInfo = $this->requirements->checkPHPversion(
            config('laravel-installer.core.minPhpVersion')
        );
        $requirements = $this->requirements->check(
            config('laravel-installer.requirements')
        );

        return view('laravel-installer::requirements', compact('requirements', 'phpSupportInfo'));
    }
}
