<?php

namespace Minasyans\LaravelInstaller\Helpers;

trait AppStatusCheck
{
    /**
     * If application is already installed.
     *
     * @return bool
     */
    public function alreadyInstalled(): bool
    {
        return file_exists(storage_path('installed'));
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
