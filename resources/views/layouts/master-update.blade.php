<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @if (trim($__env->yieldContent('template_title')))
            @yield('template_title') |
        @endif
        {{ trans('laravel-installer::installer.title') }}
    </title>
    <link rel="icon" type="image/png" href="{{ asset('vendor/laravel-installer//img/favicon/favicon-16x16.png') }}" sizes="16x16"/>
    <link rel="icon" type="image/png" href="{{ asset('vendor/laravel-installer//img/favicon/favicon-32x32.png') }}" sizes="32x32"/>
    <link rel="icon" type="image/png" href="{{ asset('vendor/laravel-installer//img/favicon/favicon-96x96.png') }}" sizes="96x96"/>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('vendor/laravel-installer/css/tailwind.min.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('vendor/laravel-installer/js/alpine.min.js') }}" defer></script>

    @yield('style')

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="antialiased sans-serif bg-gray-200">
    <div class="max-w-3xl mx-auto px-4 py-10">

        <div class="py-5">
            <h1 class="font-semibold text-2xl text-center">@yield('title')</h1>
        </div>

        @yield('content')

    </div>

    @yield('scripts')
</body>
</html>
