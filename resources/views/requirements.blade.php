@extends('laravel-installer::layouts.master')

@section('template_title')
    {{ trans('laravel-installer::installer.requirements.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-list-ul fa-fw" aria-hidden="true"></i>
    {{ trans('laravel-installer::installer.requirements.title') }}
@endsection

@section('content')

    @foreach($requirements['requirements'] as $type => $requirement)
        <ul class="w-full bg-white shadow p-2 rounded-lg mt-2 mb-3 text-gray-800 font-semibold">
            <li class="mb-1">
                <div class="w-fill flex p-3 pl-3 hover:bg-gray-200 rounded-lg items-center">
                    {{ ucfirst($type) }}

                    @if($type == 'php')
                        <small class="ml-2">
                            (version {{ $phpSupportInfo['minimum'] }} required)
                        </small>

                        <div class="ml-auto flex {{ $phpSupportInfo['supported'] ? 'text-green-500' : 'text-red-500' }}">
                            {{ $phpSupportInfo['current'] }}

                            @if($phpSupportInfo['supported'])
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @endif
                        </div>
                    @endif
                </div>
            </li>

            @foreach($requirements['requirements'][$type] as $extention => $enabled)
                <li class="mb-1">
                    <div class="w-fill flex p-3 pl-3 bg-gray-100 hover:bg-gray-200 rounded-lg items-center">
                        {{ $extention }}

                        @if($enabled)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
    @endforeach

    @if (!isset($requirements['errors']) && $phpSupportInfo['supported'])
        <div class="fixed bottom-0 left-0 right-0 py-5 bg-white shadow-md">
            <div class="max-w-3xl mx-auto px-4">
                <div class="flex justify-center">
                    <a href="{{ route('LaravelInstaller::permissions') }}" class="focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">
                        {{ trans('laravel-installer::installer.requirements.next') }}
                    </a>
                </div>
            </div>
        </div>
    @endif

    @if (isset($requirements['errors']))
        <div class="fixed bottom-0 left-0 right-0 py-5 bg-white shadow-md">
            <div class="max-w-3xl mx-auto px-4">
                <div class="flex justify-center">
                    <a href="{{ route('LaravelInstaller::permissions') }}" class="focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">
                        {{ trans('laravel-installer::installer.ignore') }}
                    </a>
                </div>
            </div>
        </div>
    @endif

@endsection
