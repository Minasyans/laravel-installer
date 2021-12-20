@extends('laravel-installer::layouts.configuration')

@section('template_title')
    {{ __('laravel-installer::installer.final.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-flag-checkered fa-fw" aria-hidden="true"></i>
    {{ __('laravel-installer::installer.installed.already_installed_message') }}
@endsection

@section('content')

    <div class="mb-20">

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
