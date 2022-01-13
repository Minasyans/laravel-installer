<?php

namespace Minasyans\LaravelInstaller\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Minasyans\LaravelInstaller\Manager\DatabaseManager;

class DatabaseController extends Controller
{
    /**
     * @var DatabaseManager
     */
    private $databaseManager;

    /**
     * @param DatabaseManager $databaseManager
     */
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    /**
     * Migrate and seed the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function database(Request $request)
    {
        $response = $this->databaseManager->migrateAndSeed();

        $request->session()->put(['databaseMessage' => $response]);
        $request->session()->save();
        $request->session()->reflash();

        return redirect()->route('LaravelInstaller::command');
    }
}
