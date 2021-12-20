<?php

namespace Minasyans\LaravelInstaller\Helpers;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;

class StarterKitManager
{
    public function useKit($scaffold, $theme, $inertia)
    {
        $outputLog = new BufferedOutput;

        return $this->installLaraStarters($outputLog, $scaffold, $theme, $inertia);
    }

    /**
     * Run install lara-starters and use theme.
     *
     * @param \Symfony\Component\Console\Output\BufferedOutput $outputLog
     * @param $scaffold
     * @param $theme
     * @param bool $inertia
     * @return array
     */
    private function installLaraStarters(BufferedOutput $outputLog, $scaffold, $theme, bool $inertia = false)
    {
        try {
            Artisan::call('larastarters:install', ['--scaffold' => $scaffold, '--theme' => $theme, '--inertia' => $inertia ? 'yes' : 'no'], $outputLog);
        } catch (Exception $e) {
            return $this->response($e->getMessage(), $outputLog);
        }

        return $outputLog;
    }

    /**
     * Return a formatted error messages.
     *
     * @param string $message
     * @param \Symfony\Component\Console\Output\BufferedOutput $outputLog
     * @return array
     */
    private function response(string $message, BufferedOutput $outputLog): array
    {
        return [
            'status' => 'error',
            'message' => $message,
            'dbOutputLog' => $outputLog->fetch(),
        ];
    }
}
