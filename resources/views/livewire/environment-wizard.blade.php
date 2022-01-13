<div x-data="{active: 0}">

    <div class="flex justify-between space-x-4 mt-5 mb-10">
        @foreach(config('laravel-installer.settings') as $tabTitle => $settings)
            <div x-on:click.prevent="active = {{ $loop->index }}" x-bind:class="{'bg-blue-600 text-white hover:text-black': active === {{ $loop->index }}}" class="p-4 rounded-lg shadow cursor-pointer bg-white hover:bg-gray-50 w-full">
                <div class="flex flex-col items-center">
                    @includeIf('laravel-installer::icons.' . $tabTitle . '-icon')
                    <span>{{ __(Str::ucfirst($tabTitle)) }}</span>
                </div>
            </div>
        @endforeach
    </div>

    <form method="post" action="{{ route('LaravelInstaller::environmentSaveWizard') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @foreach($envFields as $tabTitle => $settings)
            <div class="tab mb-20 p-5 bg-white shadow rounded-lg" x-show.transition.in="active === {{ $loop->index }}">

                @if($tabTitle === 'database')
                    <div class="mb-5">
                        <label for="create-database" class="inline-flex items-center">
                            <input type="checkbox" name="create-database" id="create-database" class="text-blue-500 w-4 h-4 mr-2 focus:ring-blue-400 focus:ring-opacity-25 border border-gray-300 rounded" value="1" />
                            {{ __('laravel-installer::installer.environment.wizard.form.db_create_if_not_exists') }}
                        </label>
                    </div>
                @endif

                <x-installer-input label="Test" placeholder="Test" value="Testlo" />

                @foreach($settings['fields'] as $name => $field)
                    @if ($tabTitle !== 'application')
                        @include('laravel-installer::fields.' . $field['type'],
                       [
                            'name' => $name,
                            'label' => $field['label'],
                            'more' => isset($field['more-info']) ? $field['more-info'] : '',
                            'value' => isset($envConfig[$field['envKey']]) ? $envConfig[$field['envKey']] : '',
                            'placeholder' => isset($field['placeholder']) ? $field['placeholder'] : '',
                            'options' => isset($field['options']) ? $field['options'] : []
                       ])
                    @else
                        <div class="bg-gray-100 border rounded-lg mb-3" x-data="{selected: null}">
                            <ul class="shadow-box">
                                @foreach($field as $accordionKey => $content)
                                    <li class="relative border-b border-gray-200">
                                        <button type="button" class="w-full px-8 py-6 text-left" @click="selected !== {{ $loop->iteration}} ? selected = {{ $loop->iteration}} : selected = null">
                                            <div class="flex items-center justify-between">
                                                <span>{{ __($accordionKey) }}</span>
                                            </div>
                                        </button>

                                        <div class="relative overflow-hidden transition-all max-h-0 duration-600 bg-white" style="" x-ref="container{{ $loop->iteration}}" x-bind:style="selected == {{ $loop->iteration}} ? 'max-height: ' + $refs.container{{ $loop->iteration}}.scrollHeight + 'px' : ''">
                                            <div class="p-6">
                                                @foreach($content as $key => $field)

                                                    @include('laravel-installer::fields.' . $field['type'],
                                                   [
                                                        'wire.model.defer' => $key,
                                                        'label' => $field['label'],
                                                        'more' => isset($field['more-info']) ? $field['more-info'] : '',
                                                        'value' => isset($envConfig[$field['envKey']]) ? $envConfig[$field['envKey']] : '',
                                                        'placeholder' => isset($field['placeholder']) ? $field['placeholder'] : '',
                                                        'options' => isset($field['options']) ? $field['options'] : []
                                                   ])

                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach

        <div class="fixed bottom-0 left-0 right-0 py-5 bg-white shadow-md">
            <div class="max-w-3xl mx-auto px-4">
                <div class="flex justify-between">
                    <div class="w-1/2">
                        <button
                            x-show="active > 0"
                            @click="active--"
                            type="button"
                            class="focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border"
                        >{{ __('laravel-installer::installer.back') }}</button>
                    </div>

                    <div class="w-1/2 text-right">
                        <button x-show.transition.in="active === 0" @click="active = 1" type="button" class="focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">
                            {{ __('laravel-installer::installer.environment.wizard.form.buttons.setup_database') }}
                        </button>
                        <button x-show.transition.in="active === 1" @click="active = 2" type="button" class="focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">
                            {{ __('laravel-installer::installer.environment.wizard.form.buttons.setup_application') }}
                        </button>
                        <button x-show.transition.in="active === 2" type="submit" class="focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">
                            {{ __('laravel-installer::installer.environment.wizard.form.buttons.install') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
