<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Volt Auto Sales - Buy and Sell Cars in the Caribbean @yield('title', '/')</title>

        <!-- Scripts -->
        @vite(['resources/js/app.js','resources/css/app.css'])
    </head>
    <body>
        <div class="font-campton text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
