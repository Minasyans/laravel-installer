@section('style')
    <style>
        /* The styling below is custom in that we require the :checked Pseudo class, which Tailwind doesn't offer out of the box. However the styling (border color and box shadow) the below applies is native Tailwind. */
        [id^=radio_]:checked + .starter-kit {
            border-color: rgb(59, 130, 246);
            border-width: 3px;
        }
    </style>
@endsection

<div>
    @error('starterKit')
        <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
            <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
            </svg>
            <div>
                {{ $message }}
            </div>
        </div>
    @enderror

    <form wire:submit.prevent="installTheme">
        @csrf

        <div class="bg-white p-5 mb-20 rounded-lg shadow">
            @foreach($availableStarters as $key => $starterKit)

                @if($key === 'laravel-breeze')
                    <div class="flex items-center mb-3">
                        <h3 class="text-xl font-bold text-gray-900 lg:text-2xl">{{ $starterKit['title'] }}</h3>

                        <label class="inline-flex items-center ml-3">
                            <input type="checkbox"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50 w-4 h-4"
                                   value="1"
                                   wire:model="inertia"
                            >
                            <span class="ml-2">{{ __('laravel-installer::installer.starter_kit.inertia') }}</span>
                        </label>
                    </div>
                @else
                    <h3 class="mb-3 text-xl font-bold text-gray-900 lg:text-2xl">{{ $starterKit['title'] }}</h3>
                @endif

                <div class="grid grid-cols-3 gap-3 @if($key === 'laravel-breeze') pb-10 mb-10 border-b border-gray-200 @endif">
                    @foreach($starterKit['themes'] as $key => $kit)
                        <input class="hidden" id="radio_{{ $key }}" type="radio" wire:model="starterKit" value="{{ $key }}">
                        <label class="flex flex-col max-w-sm rounded-xl transition border border-gray-100 hover:border-white hover:shadow-lg shadow-md bg-white cursor-pointer starter-kit"
                               for="radio_{{ $key }}"
                        >
                            <img class="rounded-t-lg object-contain h-60" src="{{ $kit['image'] }}" alt="{{ $kit['title'] }}" />
                            <div class="p-5">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $kit['title'] }}</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" title="{{ $kit['description'] }}">{{ \Illuminate\Support\Str::limit($kit['description'], 80) }}</p>
                                <a href="{{ $kit['url'] }}" target="_blank" class="inline-flex items-center py-2 px-3 text-sm font-medium focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 transition ease-in-out duration-150">
                                    {{ __('laravel-installer::installer.starter_kit.read_more') }}
                                    <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </label>
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="fixed bottom-0 left-0 right-0 py-5 bg-white shadow-md">
            <div class="max-w-3xl mx-auto px-4">
                <div class="flex justify-center">
                    <div class="w-1/2">
                        <a href="{{ route('LaravelInstaller::starterKit.blank') }}"
                            class="font-medium focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 border transition ease-in-out duration-150"
                        >{{ __('laravel-installer::installer.starter_kit.blank') }}</a>
                    </div>

                    <div class="w-1/2 text-right">
                        <button type="submit"
                                class="font-medium focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 transition ease-in-out duration-150"
                                wire:target="installTheme"
                                wire:loading.attr="disabled"
                                wire:loading.class="cursor-not-allowed"
                        >
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 wire:loading
                                 wire:target="installTheme"
                            >
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>

                            <span wire:loading.remove wire:target="installTheme">
                                {{ __('laravel-installer::installer.starter_kit.use_theme') }}
                            </span>

                            <span wire:loading wire:target="installTheme">
                                {{ __('laravel-installer::installer.starter_kit.processing') }}
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
