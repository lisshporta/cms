@php
    function renderMenuActiveLink($route, $mobile = false)
    {
        if (request()->routeIs($route)) {
            if ($mobile) {
                return 'bg-red-50 border-red-400 text-red-700';
            }
            return 'border-red-400 text-gray-900';
        }

        if ($mobile) {
            return 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700';
        }
        return 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700';
    }
@endphp
<nav class="bg-white shadow w-full z-20 top-0 sticky inset-x-0" x-data="{ open: false }">
    <div class="mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex justify-between h-20">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button -->
                <button type="button" x-on:click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-red-400"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg x-bind:class="open ? 'hidden' : 'block'" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-bind:class="!open ? 'hidden' : 'block'" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('/img/logo.svg') }}" class="h-10 w-auto"/>
                    </a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <x-jet-nav-link href="{{ route('home') }}"
                                    :active="request()->routeIs('home')">
                        Explore
                    </x-jet-nav-link>
                    @auth
                        <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-jet-nav-link>
                        <x-jet-nav-link href="{{ route('inventory.index') }}"
                                        :active="request()->routeIs('cars.index')">
                            Inventory
                        </x-jet-nav-link>
                    @endauth
                    @if (tenant())
                        <a href="{{ route('contact') }}"
                           class="{{ renderMenuActiveLink('contact') }} inline-flex items-center px-1 pt-1 border-b-4 font-medium text-sm">
                            Contact </a>
                    @endif

                </div>
            </div>
            {{-- {{Auth::user()->name}} --}}
            <div
                class="absolute inset-y-0 right-0 sm:flex space-x-8 items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0 hidden">
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 font-medium text-sm">
                        Dashboard </a>
                @endauth

                @guest
                    <a href="{{ route('register') }}"
                       class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 font-medium text-sm">
                        Register </a>
                    <a href="{{ route('login') }}"
                       class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 font-medium text-sm">
                        Sign In </a>
                @endguest
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="sm:hidden" id="mobile-menu" x-show="open" x-cloak>
        <div class="pt-2 pb-4 space-y-1">
            <a href="{{ route('home') }}"
               class="{{ renderMenuActiveLink('home', true) }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Home</a>
            @if (tenant())
                <a href="{{ route('contact') }}"
                   class="{{ renderMenuActiveLink('contact', true) }} border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Contact</a>
            @endif
            @auth
                <a href="{{ route('dashboard') }}"
                   class="{{ renderMenuActiveLink('dashboard', true) }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Dashboard</a>
            @endauth

            @guest
                <a href="{{ route('register') }}"
                   class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Register</a>
                <a href="{{ route('login') }}"
                   class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Sign
                    In</a>
            @endguest
        </div>
    </div>
</nav>
