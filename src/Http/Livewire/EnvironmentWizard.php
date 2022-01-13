<?php

namespace Minasyans\LaravelInstaller\Http\Livewire;

use Livewire\Component;

class EnvironmentWizard extends Component
{
    public $envFields;

    public function mount()
    {
        $this->envFields = config('laravel-installer.settings');
    }

    public function render()
    {
        return view('laravel-installer::livewire.environment-wizard', [
            'envFields' => $this->envFields
        ]);
    }
}
