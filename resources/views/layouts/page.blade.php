<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::asset('css/general.css') }}" crossorigin="anonymous">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <title>@yield('title')</title>
    </head>
    <body class="grey">
        @auth
            @include('layouts.navbar')
        @endauth

        <div class="container-fluid">
            @yield('content')
        </div>
    </body>
</html>
