<x-app-layout>
    @section('title', 'Dashboard')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="flex flex-row">
            <x-statistic-card class="w-1/4 m-2">
                <x-slot name="icon">
                    <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="43" height="43" rx="5" fill="#FD4E51" fill-opacity="0.1"/>
                        <path d="M11 21C11 21 15 13 22 13C29 13 33 21 33 21C33 21 29 29 22 29C15 29 11 21 11 21Z" stroke="#EB5757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22 24C23.6569 24 25 22.6569 25 21C25 19.3431 23.6569 18 22 18C20.3431 18 19 19.3431 19 21C19 22.6569 20.3431 24 22 24Z" stroke="#EB5757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </x-slot>
                <x-slot name="title">
                    Views
                </x-slot>
                <x-slot name="data">
                    {{--  Update these with actual data  --}}

                </x-slot>
            </x-statistic-card>
            <x-statistic-card class="w-1/4 m-2">
                <x-slot name="icon">
                    <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="43" height="43" rx="5" fill="#5778EB" fill-opacity="0.1"/>
                        <path d="M28.5 30C29.8807 30 31 28.8807 31 27.5C31 26.1193 29.8807 25 28.5 25C27.1193 25 26 26.1193 26 27.5C26 28.8807 27.1193 30 28.5 30Z" stroke="#5778EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.5 30C16.8807 30 18 28.8807 18 27.5C18 26.1193 16.8807 25 15.5 25C14.1193 25 13 26.1193 13 27.5C13 28.8807 14.1193 30 15.5 30Z" stroke="#5778EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M26 17H30L33 20V25H26V17Z" stroke="#5778EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M26 12H11V25H26V12Z" stroke="#5778EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </x-slot>
                <x-slot name="title">
                    Vehicles
                </x-slot>
            </x-statistic-card>
            <x-statistic-card class="w-1/4 m-2">
                <x-slot name="icon">
                    <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="43" height="43" rx="5" fill="#57EB78" fill-opacity="0.1"/>
                        <path d="M22 10V32" stroke="#34BB52" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M27 14H19.5C18.5717 14 17.6815 14.3687 17.0251 15.0251C16.3687 15.6815 16 16.5717 16 17.5C16 18.4283 16.3687 19.3185 17.0251 19.9749C17.6815 20.6313 18.5717 21 19.5 21H24.5C25.4283 21 26.3185 21.3687 26.9749 22.0251C27.6313 22.6815 28 23.5717 28 24.5C28 25.4283 27.6313 26.3185 26.9749 26.9749C26.3185 27.6313 25.4283 28 24.5 28H16" stroke="#34BB52" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </x-slot>
                <x-slot name="title">
                    Valuation
                </x-slot>
            </x-statistic-card>
            <x-statistic-card class="w-1/4 m-2">
                <x-slot name="icon">
                    <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="43" height="43" rx="5" fill="#EDE643" fill-opacity="0.1"/>
                        <path d="M30 21V31H14V21" stroke="#EDE643" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M32 16H12V21H32V16Z" stroke="#EDE643" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22 31V16" stroke="#EDE643" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22 16H26.5C27.163 16 27.7989 15.7366 28.2678 15.2678C28.7366 14.7989 29 14.163 29 13.5C29 12.837 28.7366 12.2011 28.2678 11.7322C27.7989 11.2634 27.163 11 26.5 11C23 11 22 16 22 16Z" stroke="#EDE643" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22 16H17.5C16.837 16 16.2011 15.7366 15.7322 15.2678C15.2634 14.7989 15 14.163 15 13.5C15 12.837 15.2634 12.2011 15.7322 11.7322C16.2011 11.2634 16.837 11 17.5 11C21 11 22 16 22 16Z" stroke="#EDE643" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </x-slot>
                <x-slot name="title">
                    Sales
                </x-slot>
            </x-statistic-card>
    </div>
</x-app-layout>
