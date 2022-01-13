<?php

namespace Minasyans\LaravelInstaller\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LocalizationController extends Controller
{
    /**
     * @param $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switchLanguage($locale)
    {
        if (array_key_exists($locale, Config::get('laravel-installer.languages'))) {
            Session::put('applocale', $locale);
        }

        return Redirect::back();
    }
}
