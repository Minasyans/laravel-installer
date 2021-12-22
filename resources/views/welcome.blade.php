@extends('laravel-installer::layouts.master')

@section('template_title')
    {{ trans('laravel-installer::installer.welcome.templateTitle') }}
@endsection

@section('title')
    {{ trans('laravel-installer::installer.welcome.title') }}
@endsection

@section('content')
    <div class="flex items-center justify-center py-20">
        <h2 class="text-3xl">{{ trans('laravel-installer::installer.welcome.message') }}</h2>
    </div>

    <div class="fixed bottom-0 left-0 right-0 py-5 bg-white shadow-md">
        <div class="max-w-3xl mx-auto px-4">
            <div class="flex justify-between">
                <div class="w-1/2">
                    <a href="{{ route('LaravelInstaller::database') }}" class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border">
                        {{ trans('laravel-installer::installer.welcome.skipAndInstall') }}
                    </a>
                </div>
                <div class="w-1/2 text-right">
                    <a href="{{ route('LaravelInstaller::requirements') }}" class="focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">
                        {{ trans('laravel-installer::installer.welcome.next') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
