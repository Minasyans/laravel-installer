<?php

namespace Minasyans\LaravelInstaller\Traits;

trait AppStatusCheck
{
    /**
     * If application is already installed.
     *
     * @return bool
     */
    public function alreadyInstalled(): bool
    {
        $installedLogFileName = config('laravel-installer.installedFileName', 'installed');
        return file_exists(storage_path($installedLogFileName));
    }

    /**
     * If starter kit is already selected.
     *
     * @return bool
     */
    public function starterKitSelected(): bool
    {
        return file_exists(storage_path('starter_kit_used'));
    }
}
