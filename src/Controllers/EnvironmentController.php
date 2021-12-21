<?php

namespace Minasyans\LaravelInstaller\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Minasyans\LaravelInstaller\Events\EnvironmentSaved;
use Minasyans\LaravelInstaller\Helpers\EnvironmentManager;

class EnvironmentController
{
    /**
     * @var EnvironmentManager
     */
    protected $EnvironmentManager;

    /**
     * @param EnvironmentManager $environmentManager
     */
    public function __construct(EnvironmentManager $environmentManager)
    {
        $this->EnvironmentManager = $environmentManager;
    }

    /**
     * Display the Environment menu page.
     *
     * @return \Illuminate\View\View
     */
    public function environmentMenu()
    {
        return view('laravel-installer::environment');
    }

    /**
     * Display the Environment page.
     *
     * @return \Illuminate\View\View
     */
    public function environmentWizard()
    {
        $envConfig = $this->EnvironmentManager->getEnvContentAsArray();

        return view('laravel-installer::environment-wizard', compact('envConfig'));
    }

    /**
     * Display the Environment page.
     *
     * @return \Illuminate\View\View
     */
    public function environmentClassic()
    {
        $envConfig = $this->EnvironmentManager->getEnvContent();

        return view('laravel-installer::environment-classic', compact('envConfig'));
    }

    /**
     * Processes the newly saved environment configuration (Classic).
     *
     * @param Request $input
     * @param Redirector $redirect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveClassic(Request $input, Redirector $redirect)
    {
        $saveFile = $this->EnvironmentManager->saveFileClassic($input);

        if ($saveFile) {
            $message = trans('laravel-installer::installer.environment.success');

            event(new EnvironmentSaved($input));
        } else {
            $message = trans('laravel-installer::installer.environment.errors');
        }

        return $redirect->route('LaravelInstaller::environmentClassic')
            ->with(['message' => $message]);
    }

    /**
     * Processes the newly saved environment configuration (Form Wizard).
     *
     * @param Request $request
     * @param Redirector $redirect
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveWizard(Request $request, Redirector $redirect)
    {
        $request->validate($this->EnvironmentManager->getEnvContentRules());

        if (! $this->checkDatabaseConnection($request)) {
            return $redirect->route('LaravelInstaller::environmentWizard')->withInput()->withErrors([
                'db-connection' => trans('laravel-installer::installer.environment.wizard.form.db_connection_failed'),
            ]);
        }

        $saveFile = $this->EnvironmentManager->saveFileWizard($request);

        if ($saveFile) {
            $results = trans('laravel-installer::installer.environment.success');

            event(new EnvironmentSaved($request));
        } else {
            $results = trans('laravel-installer::installer.environment.errors');
        }

        return $redirect->route('LaravelInstaller::database')
            ->with(['results' => $results]);
    }

    /**
     * TODO: We can remove this code if PR will be merged: https://github.com/RachidLaasri/Installer/pull/162
     * Validate database connection with user credentials (Form Wizard).
     *
     * @param Request $request
     * @return bool
     */
    private function checkDatabaseConnection(Request $request)
    {
        $connection = $request->input('db-connection');
        $database = $request->input('db-database');
        $createDatabase = $request->input('create-database');

        $settings = config("database.connections.$connection");

        config([
            'database' => [
                'default' => $connection,
                'connections' => [
                    $connection => array_merge($settings, [
                        'driver' => $connection,
                        'host' => $request->input('db-host'),
                        'port' => $request->input('db-port'),
                        'database' => $request->input('db-database'),
                        'username' => $request->input('db-username'),
                        'password' => $request->input('db-password'),
                    ]),
                ],
            ],
        ]);

        DB::purge();

        try {
            if (isset($createDatabase) && $createDatabase == true) {
                $schemaName = $request->input('db-database') ?: config("database.connections.$connection.database");
                $charset = $connection !== 'sqlite' ? "CHARACTER SET " . config("database.connections.mysql.charset",'utf8mb4') : "";
                $collation = $connection === 'mysql' ? "COLLATE " . config("database.connections.mysql.collation",'utf8mb4_unicode_ci') . ";" : "";

                config(["database.connections.$connection.database" => null]);
                DB::connection()->statement("CREATE DATABASE IF NOT EXISTS $database $charset $collation");
                config(["database.connections.$connection.database" => $database]);
            }

            DB::connection()->getPdo();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
