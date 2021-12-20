@extends('laravel-installer::layouts.master-update')

@section('title', trans('laravel-installer::installer.updater.final.title'))

@section('content')
    <p class="paragraph text-center">{{ session('message')['message'] }}</p>
    <div class="buttons">
        <a href="{{ url('/') }}" class="button">{{ trans('laravel-installer::installer.updater.final.exit') }}</a>
    </div>
@stop
