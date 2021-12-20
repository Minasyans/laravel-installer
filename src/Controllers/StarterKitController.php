<?php

namespace Minasyans\LaravelInstaller\Controllers;

use Minasyans\LaravelInstaller\Helpers\InstalledFileManager;
use Minasyans\LaravelInstaller\Requests\StarterKitRequest;
use Illuminate\Routing\Controller;
use Minasyans\LaravelInstaller\Helpers\StarterKitManager;

class StarterKitController extends Controller
{
    /**
     * @var $starterKitManager
     */
    private $starterKitManager;

    public function __construct(StarterKitManager $starterKitManager)
    {
        $this->starterKitManager = $starterKitManager;
    }

    public function chooseStarterKit()
    {
        return view('laravel-installer::starter-kit');
    }

    public function useTheme(StarterKitRequest $request)
    {
        $starterKits = config('laravel-installer.starter_kits');

        $scaffold = 'laravel-breeze';

        if (in_array($request->starter_kit, array_keys($starterKits['laravel-ui']['themes']))) {
            $scaffold = 'laravel-ui';
        }

        $response = $this->starterKitManager->useKit($scaffold, $request->starter_kit, isset($request->inertia));

        return redirect()->route('LaravelInstaller::starterKit.final')
            ->with(['message' => $response]);
    }

    public function finish(InstalledFileManager $fileManager)
    {
        $finalStatusMessage = $fileManager->starterKitUsed();

        return view('laravel-installer::starter-kit-finished');
    }
}
