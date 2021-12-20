<?php

namespace Minasyans\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;
use Minasyans\LaravelInstaller\Helpers\AccountManager;
use Minasyans\LaravelInstaller\Requests\AccountRequest;

class AccountController extends Controller
{
    /**
     * @var $accountManager
     */
    private $accountManager;

    public function __construct(AccountManager $accountManager)
    {
        $this->accountManager = $accountManager;
    }

    public function createAccount()
    {
        return view('laravel-installer::create-account');
    }

    public function store(AccountRequest $request)
    {

    }
}
