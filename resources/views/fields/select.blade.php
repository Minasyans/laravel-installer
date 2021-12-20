<div class="mb-5">
    <label for="{{ $name }}" class="font-bold mb-1 text-gray-700 block @if($more) flex items-center @endif">
        {{ __($label) }}

        @if($more)
            <a href="{{ $more }}" target="_blank" class="ml-2" title="{{ __('laravel-installer::installer_messages.environment.wizard.form.app_tabs.more_info') }}">
                @include('laravel-installer::icons.more-icon')
                <span class="sr-only">{{ __('laravel-installer::installer_messages.environment.wizard.form.app_tabs.more_info') }}</span>
            </a>
        @endif
    </label>
    <select name="{{ $name }}" id="{{ $name }}"
            class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline bg-gray-100 text-gray-600 font-medium border-gray-300 @error($name) border border-red-300 text-red-900 focus:border-red-300 focus:shadow-outline-red @enderror">

        @foreach($options as $val => $selectLabel)
            <option @if ($value == $val) selected @endif value="{{ $val }}">{{ __($selectLabel) }}</option>
        @endforeach

    </select>

    @error($name)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
