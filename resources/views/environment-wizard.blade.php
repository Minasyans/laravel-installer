@extends('laravel-installer::layouts.master')

@section('template_title')
    {{ __('laravel-installer::installer.environment.wizard.templateTitle') }}
@endsection

@section('title')
    {!! __('laravel-installer::installer.environment.wizard.title') !!}
@endsection

@section('content')

    @error('db-connection')
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

    @livewire('environment-wizard')

@endsection
