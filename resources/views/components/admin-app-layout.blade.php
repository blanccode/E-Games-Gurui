<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @livewireStyles

    <!-- Scripts -->
    {{--    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v1.10.1/dist/alpine.js" defer></script>--}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    @livewireScripts

</head>

<body class="font-sans antialiased background">

    {{--    <x-jet-banner />--}}
    <div class="min-h-screen background text-white">
        @livewire('admin-navigation-menu')


        <!-- Page Content -->
        <main class="background flex justify-between mx-auto pt-4">
            <livewire:left-nav />

            {{ $slot }}
            <livewire:right-nav />

        </main>
    </div>

    @stack('modals')

</body>


</html>
