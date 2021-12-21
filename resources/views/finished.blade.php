@extends('laravel-installer::layouts.master')

@section('template_title')
    {{ __('laravel-installer::installer.final.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-flag-checkered fa-fw" aria-hidden="true"></i>
    {{ __('laravel-installer::installer.final.title') }}
@endsection

@section('content')

    <div class="mb-20">
        @if(session('databaseMessage'))
            @if(session('databaseMessage')['dbOutputLog'])
                <div class="mt-5 mb-3">
                    <div class="font-weight-bold text-md">
                        {{ __('laravel-installer::installer.final.migration') }}
                    </div>
                </div>
                @if(session('databaseMessage')['status'] == 'error')
                    <div class="mt-5 mb-3">
                        <div class="font-weight-bold text-md">
                            {{ __('laravel-installer::installer.final.error') }}
                        </div>
                    </div>
                    @include('laravel-installer::partials.console', [
                        'message' => session('databaseMessage')['message']
                    ])
                @else
                    @include('laravel-installer::partials.console', [
                        'message' => session('databaseMessage')['dbOutputLog']
                    ])
                @endif
            @endif
        @endif

        @if(session('commandMessage'))
            <div class="mt-5 mb-3">
                <div class="font-weight-bold text-md">
                    {{ __('laravel-installer::installer.final.command') }}
                </div>
            </div>
            @foreach (session('commandMessage') as $message)
                <div class="mt-5 mb-3">
                    <div class="font-weight-bold text-md">
                        {{ $message['command'] }}
                    </div>
                </div>

                @if($message['status'] == 'error')
                    <div class="mt-5 mb-3">
                        <div class="font-weight-bold text-md">
                            {{ __('laravel-installer::installer.final.error') }}
                        </div>
                    </div>
                    @include('laravel-installer::partials.console', [
                        'message' => $message['message']
                    ])
                @else
                    @include('laravel-installer::partials.console', [
                        'message' => $message['outputLog']
                    ])
                @endif
            @endforeach
        @endif

        <div class="mt-5 mb-3">
            <div class="font-weight-bold text-md">
                {{ __('laravel-installer::installer.final.console') }}
            </div>
        </div>
        @include('laravel-installer::partials.console', [
            'message' => $finalMessages
        ])

        <div class="mt-5 mb-3">
            <div class="font-weight-bold text-md">
                {{ __('laravel-installer::installer.final.log') }}
            </div>
        </div>
        @include('laravel-installer::partials.console', [
            'message' => $finalStatusMessage
        ])

        <div class="mt-5 mb-3">
            <div class="font-weight-bold text-md">
                {{ __('laravel-installer::installer.final.env') }}
            </div>
        </div>
        @include('laravel-installer::partials.console', [
            'message' => $finalEnvFile
        ])
    </div>

    <div class="fixed bottom-0 left-0 right-0 py-5 bg-white shadow-md">
        <div class="max-w-3xl mx-auto px-4">
            <div class="flex justify-center">
                <a href="{{ route('LaravelInstaller::chooseStarterKit') }}" class="focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">
                    {{ __('laravel-installer::installer.starter_kit.title') }}
                </a>
            </div>
        </div>
    </div>

@endsection
