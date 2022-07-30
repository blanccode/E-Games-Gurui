<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ 'js/script.js' }}" defer></script>
        <script src="//unpkg.com/alpinejs" defer></script>
{{--        <script src="https://www.paypal.com/sdk/js?client-id=AToL4wcRci2DlMqF3MSyU1Y9Y0i00pJDyfrxJsSCdJ4y5gb7XE8k_VvmIrJBGHBxojnFHedvtdqW6nZd&currency=USD"></script>--}}

        @livewireScripts

    </head>
    <body class="font-sans antialiased background">
        <x-jet-banner />

        <div class="min-h-screen background text-white">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
               {{-- <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>--}}
            @endif

            <!-- Page Content -->
            <main class="background justify-between mx-auto pt-4">

                {{ $slot }}



            </main>
        </div>

        @stack('modals')

    </body>
</html>
