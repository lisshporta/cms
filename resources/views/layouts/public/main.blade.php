<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Volt Auto Sales - Buy and Sell Cars in the Caribbean @yield('title', '/')</title>

    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="font-campton antialiased h-full bg-gray-100">
<!-- Navigation Menu -->
@livewire('navigation-menu')

<!-- Page Content -->
<main>
    {{ $slot }}
</main>
@stack('modals')
@stack('scripts')
@livewireScripts
</body>
</html>
