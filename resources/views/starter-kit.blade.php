@extends('laravel-installer::layouts.configuration')

@section('template_title')
    {{ trans('laravel-installer::installer.welcome.templateTitle') }}
@endsection

@section('title')
    {{ trans('laravel-installer::installer.starter_kit.title') }}
@endsection

@section('style')
    <style>
        /* The styling below is custom in that we require the :checked Pseudo class, which Tailwind doesn't offer out of the box. However the styling (border color and box shadow) the below applies is native Tailwind. */
        input[name=starter_kit]:checked + .starter-kit {
            border-color: #3b82f6;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
@endsection

@section('content')
    @error('starter_kit')
        <div class="bg-red-50 p-4 rounded flex items-start text-red-600 mt-4 mb-10 shadow-lg">
            <div class="text-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 pt-1" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z"></path></svg>
            </div>
            <div class=" px-3">
                <h3 class="text-red-800 font-semibold tracking-wider">
                    {{ $message }}
                </h3>
            </div>
        </div>
    @enderror

    <form action="{{ route('LaravelInstaller::useTheme') }}" method="POST">
        @csrf

        <div class="bg-white p-5 rounded-lg shadow">
            @foreach(config('laravel-installer.starter_kits') as $key => $starterKit)

                @if($key === 'laravel-breeze')
                    <div class="flex items-center mb-3">
                        <h3 class="text-2xl font-semibold">{{ $starterKit['title'] }}</h3>

                        <label for="inertia" class="inline-flex items-center ml-3">
                            <input type="checkbox" name="inertia" id="inertia" class="text-blue-500 w-4 h-4 mr-2 focus:ring-blue-400 focus:ring-opacity-25 border border-gray-300 rounded" value="1" />
                            {{ __('laravel-installer::installer.starter_kit.inertia') }}
                        </label>
                    </div>
                @else
                    <h3 class="text-2xl font-semibold mb-3">{{ $starterKit['title'] }}</h3>
                @endif

                <div class="grid grid-cols-3 gap-3 mb-5">
                    @foreach($starterKit['themes'] as $key => $kit)
                        @include('laravel-installer::partials.card-radio', [
                            'kit' => $kit,
                            'theme_key' => $key,
                            'key' => uniqid()
                        ])
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="fixed bottom-0 left-0 right-0 py-5 bg-white shadow-md">
            <div class="max-w-3xl mx-auto px-4">
                <div class="flex justify-center">
                    <button type="submit" class="focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">
                        {{ __('laravel-installer::installer.starter_kit.use_theme') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
