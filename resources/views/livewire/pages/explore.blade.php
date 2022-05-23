@section('title', 'Explore')
<div class="flex flex-row h-full" x-data="{ sidebarOpen: false }">

    {{-- Mobile Sidebar --}}
    <div class="relative z-40 md:hidden" x-show="sidebarOpen" role="dialog" aria-modal="true" x-cloak>
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75" x-cloak x-show="sidebarOpen"
            x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

        <div class="fixed inset-0 flex z-40">

            <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white" x-cloak x-show="sidebarOpen"
                x-transition:enter="transition ease-in-out duration-300 transform"
                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in-out duration-300 transform"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full">

                <div class="absolute top-0 right-0 -mr-12 pt-2" x-show="sidebarOpen"
                    x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <button type="button" @click="sidebarOpen = ! sidebarOpen"
                        class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Close sidebar</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex-shrink-0 flex items-center px-4">
                    <img src="/img/logo.svg" class="h-12" />
                </div>
                <div class="mt-5 flex-1 h-0 overflow-y-auto">
                    <nav class="px-8 space-y-8">
                        <div>
                            <div class="text-base font-bold uppercase pb-2">Make</div>
                            <div class="space-y-2">
                                @foreach ($makes as $vehicle_make)
                                    @if (strcasecmp($make, $vehicle_make->name) == 0)
                                        <span
                                            class="inline-flex items-center pr-1 text-volt-primary border-b-4 border-red-400">
                                            {{ $vehicle_make->name }}
                                            <button type="button" wire:click="$set('make', null)"
                                                class="flex-shrink-0 ml-2 h-4 w-4 rounded-full inline-flex items-center justify-center text-red-400 hover:bg-red-200 hover:text-red-500 focus:outline-none focus:bg-red-500 focus:text-white">
                                                <span class="sr-only">Remove large option</span>
                                                <svg class="h-2 w-2" stroke="currentColor" fill="none"
                                                    viewBox="0 0 8 8">
                                                    <path stroke-linecap="round" stroke-width="1.5"
                                                        d="M1 1l6 6m0-6L1 7" />
                                                </svg>
                                            </button>
                                        </span>
                                    @else
                                        <div class="cursor-pointer"
                                            wire:click="$set('make', '{{ $vehicle_make->name }}')">
                                            {{ $vehicle_make->name }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <div class="text-base font-bold uppercase pb-2">Body Type</div>
                            <div class="space-y-2">
                                @foreach ($body_types as $body_type)
                                    @if (strcasecmp($body, $body_type->name) == 0)
                                        <span
                                            class="inline-flex items-center pr-1 text-volt-primary border-b-4 border-red-400">
                                            {{ $body_type->name }}
                                            <button type="button" wire:click="$set('body', null)"
                                                class="flex-shrink-0 ml-2 h-4 w-4 rounded-full inline-flex items-center justify-center text-red-400 hover:bg-red-200 hover:text-red-500 focus:outline-none focus:bg-red-500 focus:text-white">
                                                <span class="sr-only">Remove option</span>
                                                <svg class="h-2 w-2" stroke="currentColor" fill="none"
                                                    viewBox="0 0 8 8">
                                                    <path stroke-linecap="round" stroke-width="1.5"
                                                        d="M1 1l6 6m0-6L1 7" />
                                                </svg>
                                            </button>
                                        </span>
                                    @else
                                        <div class="cursor-pointer"
                                            wire:click="$set('body', '{{ $body_type->name }}')">
                                            {{ $body_type->name }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="flex-shrink-0 w-14" aria-hidden="true">
                {{-- Dummy element to force sidebar to shrink to fit close icon --}}
            </div>
        </div>
    </div>

    {{-- Desktop Sidebar --}}
    <div class="hidden md:flex md:flex-col fixed inset-y-0 border-r border-gray-200 bg-white px-8 py-8 space-y-8 pt-24"
        style="min-width: 273px;">
        <div>
            <div class="text-base font-bold uppercase pb-2">Make</div>
            <div class="space-y-2">
                @foreach ($makes as $vehicle_make)
                    @if (strcasecmp($make, $vehicle_make->name) == 0)
                        <span class="inline-flex items-center pr-1 text-volt-primary border-b-4 border-red-400">
                            {{ $vehicle_make->name }}
                            <button type="button" wire:click="$set('make', null)"
                                class="flex-shrink-0 ml-2 h-4 w-4 rounded-full inline-flex items-center justify-center text-red-400 hover:bg-red-200 hover:text-red-500 focus:outline-none focus:bg-red-500 focus:text-white">
                                <span class="sr-only">Remove large option</span>
                                <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                    <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                                </svg>
                            </button>
                        </span>
                    @else
                        <div class="cursor-pointer" wire:click="$set('make', '{{ $vehicle_make->name }}')">
                            {{ $vehicle_make->name }}
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div>
            <div class="text-base font-bold uppercase pb-2">Body Type</div>
            <div class="space-y-2">
                @foreach ($body_types as $body_type)
                    @if (strcasecmp($body, $body_type->name) == 0)
                        <span class="inline-flex items-center pr-1 text-volt-primary border-b-4 border-red-400">
                            {{ $body_type->name }}
                            <button type="button" wire:click="$set('body', null)"
                                class="flex-shrink-0 ml-2 h-4 w-4 rounded-full inline-flex items-center justify-center text-red-400 hover:bg-red-200 hover:text-red-500 focus:outline-none focus:bg-red-500 focus:text-white">
                                <span class="sr-only">Remove option</span>
                                <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                    <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                                </svg>
                            </button>
                        </span>
                    @else
                        <div class="cursor-pointer" wire:click="$set('body', '{{ $body_type->name }}')">
                            {{ $body_type->name }}
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="w-full px-4 md:pl-72 md:pr-4">
        <div class="w-full">
            <div class="font-bold text-2xl pt-8 pb-4">Vehicles</div>
            <div class="bg-white rounded-md px-4 py-3 md:px-4 md:py-6 flex flex-row space-x-2 items-center">
                <div class="rounded-md border border-indigo-400 flex flex-row items-center w-full px-4 h-10">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.2716 12.1684L10.3313 9.22813C11.0391 8.28574 11.4213 7.13865 11.42 5.96C11.42 2.94938 8.97063 0.5 5.96 0.5C2.94938 0.5 0.5 2.94938 0.5 5.96C0.5 8.97063 2.94938 11.42 5.96 11.42C7.13865 11.4213 8.28574 11.0391 9.22813 10.3313L12.1684 13.2716C12.3173 13.4046 12.5114 13.4756 12.711 13.47C12.9105 13.4645 13.1004 13.3827 13.2415 13.2415C13.3827 13.1004 13.4645 12.9105 13.47 12.711C13.4756 12.5114 13.4046 12.3173 13.2716 12.1684ZM2.06 5.96C2.06 5.18865 2.28873 4.43463 2.71727 3.79328C3.14581 3.15192 3.7549 2.65205 4.46753 2.35687C5.18017 2.06169 5.96433 1.98446 6.72085 2.13494C7.47738 2.28542 8.17229 2.65686 8.71772 3.20228C9.26314 3.74771 9.63458 4.44262 9.78506 5.19915C9.93555 5.95567 9.85831 6.73983 9.56313 7.45247C9.26795 8.1651 8.76808 8.77419 8.12672 9.20273C7.48537 9.63127 6.73135 9.86 5.96 9.86C4.92604 9.85876 3.93478 9.44747 3.20365 8.71635C2.47253 7.98522 2.06124 6.99396 2.06 5.96Z"
                            fill="#4B5563" />
                    </svg>
                    <input type="text" wire:model="search"
                        class="focus:ring-0 border-0 w-full text-xs md:text-sm text-gray-600"
                        placeholder="Search by make, model or body type" />
                </div>
                <button class="md:hidden rounded-md border border-indigo-400 flex flex-row items-center px-2 h-10"
                    @click="sidebarOpen = ! sidebarOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </button>
            </div>

            <div class="grid grid-cols-1 xs:grid-cols-1 sm:grid-cols-2 md:flex md:flex-wrap gap-8 py-8">
                @forelse($listings as $listing)
                    <div class="w-full bg-white flex flex-col col-span-1 max-w-sm sm:max-w-xs">
                        
                        @if ($listing->cover_path)
                            <img class="w-full h-52" src="{{asset($listing->cover_path)}}" />
                        @else
                           <div style="background-color: #FFF0F0" class="w-full h-52 flex justify-center items-center">
                        </div> 
                        @endif
                        
                        
                        <div class="bg-white h-40 flex flex-col justify-between px-3">
                            <div class="flex flex-row justify-between h-full py-3">
                                <div class="flex flex-col break-words">
                                    <div class="text-base">{{ $listing->year }} {{ $listing->make }}</div>
                                    <div class="text-xl font-semibold">{{ $listing->model }}</div>
                                    <div class="text-sm mt-1">{{ $listing->body_type }}</div>
                                </div>
                                <div class="w-11 flex flex-row justify-end">
                                    <svg width="23" height="20" viewBox="0 0 23 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.9578 2.59133C19.4691 2.08683 18.8889 1.68663 18.2503 1.41358C17.6117 1.14054 16.9272 1 16.2359 1C15.5446 1 14.8601 1.14054 14.2215 1.41358C13.5829 1.68663 13.0026 2.08683 12.5139 2.59133L11.4997 3.63785L10.4855 2.59133C9.49842 1.57276 8.1596 1.00053 6.76361 1.00053C5.36761 1.00053 4.02879 1.57276 3.04168 2.59133C2.05456 3.6099 1.5 4.99139 1.5 6.43187C1.5 7.87235 2.05456 9.25383 3.04168 10.2724L4.05588 11.3189L11.4997 19L18.9436 11.3189L19.9578 10.2724C20.4467 9.76814 20.8346 9.16942 21.0992 8.51045C21.3638 7.85148 21.5 7.14517 21.5 6.43187C21.5 5.71857 21.3638 5.01225 21.0992 4.35328C20.8346 3.69431 20.4467 3.09559 19.9578 2.59133ZM19.9578 2.59133V2.59133Z"
                                            stroke="#061021" stroke-width="1.25" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex flex-row justify-end py-2">
                                <div class="font-bold text-black text-lg">${{ number_format($listing->price, 2) }}
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-gray-700 text-base">No vehicles found.</div>
                @endforelse
            </div>

        </div>
        <div class="pt-8">
            {{ $listings->links() }}
        </div>
    </div>
</div>
