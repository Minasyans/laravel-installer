@extends('laravel-installer::layouts.master')

@section('template_title')
    {{ trans('laravel-installer::installer.welcome.templateTitle') }}
@endsection

@section('title')
    {{ trans('laravel-installer::installer.starter_kit.title') }}
@endsection



@section('content')
    @livewire('starter-kit-manager')
@endsection
