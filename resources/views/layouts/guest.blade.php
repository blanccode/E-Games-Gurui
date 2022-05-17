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

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    <body class="">
    <div class="absolute z-50 text-gray-100 flex justify-end cursor-pointer w-full pr-20 pt-2">
        <ul class="block flex">
            <li>
                @if( Request::is('login'))
                    <a href="{{url('/register')}}">Register </a>

                @else
                    <a href="{{url('/register')}}">Login </a>

                @endif
            </li>
        </ul>
    </div>
    <div class=" font-sans text-gray-300 antialiased relative z-30 ">

            {{ $slot }}
        </div>
        <div class="login-bg"></div>

    </body>
</html>
