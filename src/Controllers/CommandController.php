<?php

namespace Minasyans\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;
use Minasyans\LaravelInstaller\Helpers\CommandManager;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    /**
     * @var CommandManager
     */
    private $commandManager;

    /**
     * @param CommandManager $commandManager
     */
    public function __construct(CommandManager $commandManager)
    {
        $this->commandManager = $commandManager;
    }

    /**
     * Execute the command.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function commands(Request $request)
    {
        $response = $this->commandManager->executeCommands();

        $request->session()->put(['commandMessage' => $response]);
        $request->session()->reflash();
        $request->session()->save();

        return redirect()->route('LaravelInstaller::final');
    }
}
