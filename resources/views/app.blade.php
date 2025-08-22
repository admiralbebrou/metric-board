<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Metric Board</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/js/app.js')

    <style>
        /* Лого слева сверху */
        .logo {
            position: fixed;
            top: 10px;
            left: 10px;
            width: 100px;
            height: auto;
            cursor: pointer;
            z-index: 1000;
        }
    </style>
</head>
<body>
<!-- Лого -->
@if (!request()->is('login') && !request()->is('register'))
    <a href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo">
    </a>
@endif

<div id="app" data-page="{{ json_encode($page) }}"></div>
</body>
</html>
