<?php

namespace Minasyans\LaravelInstaller\Http\Livewire;

use Livewire\Component;
use Minasyans\LaravelInstaller\Manager\StarterKitManager as StarterKit;

class StarterKitManager extends Component
{
    public $starterKit;

    public $inertia;

    protected $rules = [
        'starterKit' => 'required'
    ];

    /**
     * @return \Livewire\Redirector
     */
    public function installTheme(): \Livewire\Redirector
    {
        $this->resetErrorBag();

        $this->validate();

        $starterKits = config('laravel-installer.starter_kits');

        $scaffold = 'laravel-breeze';

        if (in_array($this->starterKit, array_keys($starterKits['laravel-ui']['themes']))) {
            $scaffold = 'laravel-ui';
        }

        $starterKitManager = new StarterKit();

        $response = $starterKitManager->useKit($scaffold, $this->starterKit, isset($this->inertia));

        return redirect()->route('LaravelInstaller::starterKit.final')
            ->with(['message' => $response]);
    }

    public function render()
    {
        return view('laravel-installer::livewire.starter-kit-manager', [
            'availableStarters' => config('laravel-installer.starter_kits')
        ]);
    }
}
