<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', '/') - Volt CMS</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">


    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-inter antialiased">

    <div class="min-h-screen bg-gray-100">
        <!-- Navigation Menu -->
        @include('includes.nav')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        {{-- <div class="py-8">
            <div class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">
                @include('includes.flash')
                <main>
                    {{ $slot }}
        </main>
    </div>
    </div> --}}

    </div>

    @stack('modals')

    @livewireScripts
</body>
</html>
