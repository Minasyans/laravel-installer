<?php

namespace Minasyans\LaravelInstaller\Http\Controllers;

use Illuminate\Routing\Controller;
use Minasyans\LaravelInstaller\Manager\InstalledFileManager;

class StarterKitController extends Controller
{
    public function chooseStarterKit()
    {
        return view('laravel-installer::starter-kit');
    }

    public function finish(InstalledFileManager $fileManager)
    {
        $finalStatusMessage = $fileManager->starterKitUsed();

        return view('laravel-installer::starter-kit-finished');
    }
}
