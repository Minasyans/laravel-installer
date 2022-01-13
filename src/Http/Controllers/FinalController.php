<?php

namespace Minasyans\LaravelInstaller\Http\Controllers;

use Illuminate\Routing\Controller;
use Minasyans\LaravelInstaller\Http\Events\LaravelInstallerFinished;
use Minasyans\LaravelInstaller\Manager\EnvironmentManager;
use Minasyans\LaravelInstaller\Manager\FinalInstallManager;
use Minasyans\LaravelInstaller\Manager\InstalledFileManager;

class FinalController extends Controller
{
    /**
     * Update installed file and display finished view.
     *
     * @param \Minasyans\LaravelInstaller\Manager\InstalledFileManager $fileManager
     * @param \Minasyans\LaravelInstaller\Manager\FinalInstallManager $finalInstall
     * @param \Minasyans\LaravelInstaller\Manager\EnvironmentManager $environment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish(InstalledFileManager $fileManager, FinalInstallManager $finalInstall, EnvironmentManager $environment)
    {
        $finalMessages = $finalInstall->runFinal();
        $finalStatusMessage = $fileManager->update();
        $finalEnvFile = $environment->getEnvContent();

        event(new LaravelInstallerFinished());

        return view('laravel-installer::finished', compact('finalMessages', 'finalStatusMessage', 'finalEnvFile'));
    }

    public function installed()
    {
        return view('laravel-installer::installed');
    }
}
