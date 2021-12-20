<?php

namespace Minasyans\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;
use Minasyans\LaravelInstaller\Events\LaravelInstallerFinished;
use Minasyans\LaravelInstaller\Helpers\EnvironmentManager;
use Minasyans\LaravelInstaller\Helpers\FinalInstallManager;
use Minasyans\LaravelInstaller\Helpers\InstalledFileManager;

class FinalController extends Controller
{
    /**
     * Update installed file and display finished view.
     *
     * @param \Minasyans\LaravelInstaller\Helpers\InstalledFileManager $fileManager
     * @param \Minasyans\LaravelInstaller\Helpers\FinalInstallManager $finalInstall
     * @param \Minasyans\LaravelInstaller\Helpers\EnvironmentManager $environment
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
