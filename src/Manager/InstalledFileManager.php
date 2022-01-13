<?php

namespace Minasyans\LaravelInstaller\Manager;

class InstalledFileManager
{
    /**
     * Create installed file.
     *
     * @return int
     */
    public function create()
    {
        $installedLogFileName = config('laravel-installer.installedFileName', 'installed');
        $installedLogFile = storage_path($installedLogFileName);

        $dateStamp = date('Y/m/d h:i:sa');

        if (! file_exists($installedLogFile)) {
            $message = trans('laravel-installer::installer.installed.success_log_message').$dateStamp."\n";

            file_put_contents($installedLogFile, $message);
        } else {
            $message = trans('laravel-installer::installer.updater.log.success_message').$dateStamp;

            file_put_contents($installedLogFile, $message.PHP_EOL, FILE_APPEND | LOCK_EX);
        }

        return $message;
    }

    /**
     * Update installed file.
     *
     * @return int
     */
    public function update()
    {
        return $this->create();
    }

    /**
     * Create configured file.
     *
     * @return string
     */
    public function starterKitUsed()
    {
        $starterKitUsedLogFile = storage_path('starter_kit_used');
        $dateStamp = date('Y/m/d h:i:sa');

        $message = trans('laravel-installer::installer.starter_kit.log.success_message').$dateStamp;

        file_put_contents($starterKitUsedLogFile, $message.PHP_EOL, FILE_APPEND | LOCK_EX);

        return $message;
    }
}
