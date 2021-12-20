<?php

namespace Minasyans\LaravelInstaller\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelInstaller extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-installer';
    }
}
