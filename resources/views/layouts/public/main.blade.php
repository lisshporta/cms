<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', '/') - {{ config('app.name', 'Volt') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
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
