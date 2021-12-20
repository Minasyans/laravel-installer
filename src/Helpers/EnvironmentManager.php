<?php

namespace Minasyans\LaravelInstaller\Helpers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EnvironmentManager
{
    /**
     * @var string
     */
    private $envPath;

    /**
     * @var string
     */
    private $envExamplePath;

    /**
     * Set the .env and .env.example paths.
     */
    public function __construct()
    {
        $this->envPath = base_path('.env');
        $this->envExamplePath = base_path('.env.example');
    }

    /**
     * Get the content of the .env file.
     *
     * @return string
     */
    public function getEnvContent(): string
    {
        if (! file_exists($this->envPath)) {
            if (file_exists($this->envExamplePath)) {
                copy($this->envExamplePath, $this->envPath);
            } else {
                touch($this->envPath);
            }
        }

        return file_get_contents($this->envPath);
    }

    /**
     * Get the content of the .env file as array.
     *
     * @return array
     */
    public function getEnvContentAsArray(): array
    {
        $result = [];
        $zones = config('laravel-installer.settings');

        if (file_exists($this->envPath)) {
            if (session('file') && !session('setUpDbError')) {
                session()->forget('file');
            }
            if (session('file') && session('setUpDbError')) {
                session()->forget('setUpDbError');
            }

            $envKeys = $this->getEnvKeysFromConfig('envKey', $zones);

            foreach ($envKeys as $envKey) {
                $result[$envKey] = getenv($envKey);
            }
        }

        return $result;
    }

    /**
     * Get the the .env file path.
     *
     * @return string
     */
    public function getEnvPath(): string
    {
        return $this->envPath;
    }

    /**
     * Get the the .env.example file path.
     *
     * @return string
     */
    public function getEnvExamplePath(): string
    {
        return $this->envExamplePath;
    }

    /**
     * Save the edited content to the .env file.
     *
     * @param Request $input
     * @return string
     */
    public function saveFileClassic(Request $input): string
    {
        $message = trans('laravel-installer.environment.success');

        try {
            file_put_contents($this->envPath, $input->get('envConfig'));
        } catch (Exception $e) {
            $message = trans('laravel-installe.environment.errors');
        }

        return $message;
    }

    /**
     * Save the form content to the .env file.
     *
     * @param Request $request
     * @return string
     */
    public function saveFileWizard(Request $request): string
    {
        $results = trans('laravel-installe.environment.success');

        $envFileData = '';

        foreach (config('laravel-installer.settings') as $zoneKey => $zoneInfo) {
            foreach ($zoneInfo['fields'] as $key => $fields) {
                if ($zoneKey !== 'application') {
                    $envFileData .= $fields['envKey'].'='.(strpos($request->$key, ' ') !== false ? "'".$request->$key."'" : $request->$key)."\n";

                    if ($fields['envKey'] == 'APP_ENV') {
                        $envFileData .= 'APP_KEY=base64:'.base64_encode(Str::random(32))."\n";
                    }
                } else {
                    foreach ($fields as $field) {
                        foreach ($field as $fieldKey => $fieldRule) {
                            $envFileData .= $fieldRule['envKey'].'='.(strpos($request->$fieldKey, ' ') !== false ? "'".$request->$fieldKey."'" : $request->$fieldKey)."\n";
                        }
                    }
                }
            }
        }

        $envFileData .= 'MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"'."\n";
        $envFileData .= 'MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"';

        try {
            file_put_contents($this->envPath, $envFileData);
        } catch (Exception $e) {
            $results = trans('laravel-installer.environment.errors');
        }

        return $results;
    }

    /**
     * Get validation rules for mainSettings page from config.
     *
     * @return array
     */
    public function getEnvContentRules(): array
    {
        $rules = [];

        foreach (config('laravel-installer.settings') as $zoneKey => $zoneInfo) {
            foreach ($zoneInfo['fields'] as $key => $fields) {
                if ($zoneKey !== 'application') {
                    $rules[$key] = $fields['rule'];
                } else {
                    foreach ($fields as $field) {
                        foreach ($field as $fieldKey => $fieldRule) {
                            $rules[$fieldKey] = $fieldRule['rule'];
                        }
                    }
                }
            }
        }

        return $rules;
    }

    /**
     * Get all values from specific key in a multidimensional array
     *
     * @param string $key key(s) of value you wish to extract
     * @param array  $arr where you want
     *
     * @return null|string|array
     */
    public function getEnvKeysFromConfig(string $key, array $arr)
    {
        $val = [];
        array_walk_recursive($arr, function ($v, $k) use ($key, &$val) {
            if ($k == $key) array_push($val, $v);
        });
        return count($val) > 1 ? $val : array_pop($val);
    }
}
