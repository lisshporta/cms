@section('title', $vehicle->name)
<div class="py-12 mx-auto max-w-7xl px-8 space-y-12 mb-28">
    <div class="bg-white rounded-sm shadow-md px-4 py-4 md:px-12 md:py-8">
        <div class="flex flex-col lg:flex-row lg:items-end justify-start lg:justify-between ">
            <div class="flex flex-col items-start md:flex-row md:space-x-3 md:items-end pt-2">
                <div class="text-4xl font-bold">{{ $vehicle->name }}</div>
                <div
                    class="bg-gray-100 text-gray-600 rounded-full text-base grow-0 pt-1 mb-2 flex flex-row justify-center text-center items-center px-4 font-medium">
                    ${{ number_format($vehicle->price, 2) }} JMD</div>
            </div>
            <div class="py-3 lg:py-0 lg:pb-1">
                <a href="#"
                    class="flex flex-row flex-grow-0 w-36 justify-center items-center space-x-2 py-1 bg-volt-primary rounded-lg"><span
                        class="text-white font-medium text-xl mt-1">Share</span>
                    <span class="mb-1"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.3335 10V16.6667C3.3335 17.1087 3.50909 17.5326 3.82165 17.8452C4.13421 18.1577 4.55814 18.3333 5.00016 18.3333H15.0002C15.4422 18.3333 15.8661 18.1577 16.1787 17.8452C16.4912 17.5326 16.6668 17.1087 16.6668 16.6667V10"
                                stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M13.3332 5.00002L9.99984 1.66669L6.6665 5.00002" stroke="white" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10 1.66669V12.5" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg></span>
                </a>
            </div>
        </div>
        <div class="py-6 grid grid-cols-1 lg:grid-cols-7 gap-4">
            <div class="col-span-1 lg:col-span-5">
                <img class="w-full h-full object-cover" style="" src="{{ asset($vehicle->cover_path) }}" />
            </div>
            <div class="col-span-1 lg:col-span-2 grid grid-cols-5 grid-rows-1 lg:grid-rows-3 lg:grid-cols-none gap-3">
                @if ($vehicle->images)
                    @foreach ($vehicle->images as $image)
                        @if ($loop->index < 3)
                            <img class="w-full object-cover aspect-square lg:aspect-auto" src="{{ asset($image) }}" />
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="py-4 grid grid-cols-1 lg:grid-cols-7 gap-4">
            <div class="col-span-1 md:col-span-3 lg:col-span-2">
                <div class="font-bold text-3xl pb-4">
                    Features
                </div>
                <div class="flex flex-col space-y-4">
                    @if ($vehicle->features)
                        @foreach ($vehicle->features as $feature)
                            <div>{{ $feature }}</div>
                        @endforeach
                    @else
                        <div>Features of this vehicle are currently unavailable.</div>
                    @endif
                </div>
            </div>
            <div class="col-span-1 md:col-span-4 lg:col-span-5 space-y-4 divide-y divide-gray-300">
                @if ($vehicle->sections)
                    @foreach ($vehicle->sections as $section)
                        <div class="py-4">
                            <div class="font-semibold pb-6 pt-4">{{ $section['name'] }}</div>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                                @foreach ($section['features'] as $feature)
                                    <div>{{ $feature }}</div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="font-bold text-3xl py-8">
            Details
        </div>

        <div class="text-gray-400 font-semibold uppercase text-sm pb-1">
            Basics
        </div>

        <div class="space-y-4 divide-y divide-gray-300 mb-4">
            <div class="grid grid-cols-6 text-gray-600 text-lg pt-5">
                <div class="col-span-6 md:col-span-1">Make</div>
                <div class="col-span-6 md:col-span-5">{{ $vehicle->make }}</div>
            </div>
            <div class="grid grid-cols-6 text-gray-600 text-lg pt-5">
                <div class="col-span-6 md:col-span-1">Model</div>
                <div class="col-span-6 md:col-span-5">{{ $vehicle->model }}</div>
            </div>
            <div class="grid grid-cols-6 text-gray-600 text-lg pt-5">
                <div class="col-span-6 md:col-span-1">Condition</div>
                <div class="col-span-6 md:col-span-5">{{ $vehicle->condition }}</div>
            </div>
            <div class="grid grid-cols-6 text-gray-600 text-lg pt-5">
                <div class="col-span-6 md:col-span-1">Body Type</div>
                <div class="col-span-6 md:col-span-5">{{ $vehicle->body_type }}</div>
            </div>
            <div class="grid grid-cols-6 text-gray-600 text-lg pt-5">
                <div class="col-span-6 md:col-span-1">Year</div>
                <div class="col-span-6 md:col-span-5">{{ $vehicle->year }}</div>
            </div>
            <div class="grid grid-cols-6 text-gray-600 text-lg pt-5">
                <div class="col-span-6 md:col-span-1">Exterior</div>
                <div class="col-span-6 md:col-span-5">{{ $vehicle->color }}</div>
            </div>
            <div class="grid grid-cols-6 text-gray-600 text-lg pt-5">
                <div class="col-span-6 md:col-span-1">Engine</div>
                <div class="col-span-6 md:col-span-5">{{ $vehicle->engine }}</div>
            </div>
            <div class="grid grid-cols-6 text-gray-600 text-lg pt-5">
                <div class="col-span-6 md:col-span-1">Fuel Type</div>
                <div class="col-span-6 md:col-span-5">{{ $vehicle->fuel_type }}</div>
            </div>
            <div class="grid grid-cols-6 text-gray-600 text-lg pt-5">
                <div class="col-span-6 md:col-span-1">Gearbox</div>
                <div class="col-span-6 md:col-span-5">{{ $vehicle->gearbox }}</div>
            </div>
            <div class="grid grid-cols-6 text-gray-600 text-lg pt-5">
                <div class="col-span-6 md:col-span-1">Mileage</div>
                <div class="col-span-6 md:col-span-5">{{ $vehicle->mileage }} Km</div>
            </div>
            <div class="grid grid-cols-6 text-gray-600 text-lg pt-5">
                <div class="col-span-6 md:col-span-1">Door Count</div>
                <div class="col-span-6 md:col-span-5">{{ $vehicle->door_count }}</div>
            </div>
            <div class="grid grid-cols-6 text-gray-600 text-lg pt-5">
                <div class="col-span-6 md:col-span-1">Seat Count</div>
                <div class="col-span-6 md:col-span-5">{{ $vehicle->seat_count }}</div>
            </div>
        </div>
    </div>

    <div>
        <div class="font-bold text-3xl">
            Similar Vehicles
        </div>

        <div class="grid grid-cols-1 xs:grid-cols-1 sm:grid-cols-2 md:flex md:flex-wrap gap-8 py-4">
            @forelse($similar as $listing)
                @php
                    $path = $listing['user']['domain'] . '.' . env('APP_BASE_URL');
                @endphp
                <a href="{{ tenant_route($path, 'view-vehicle', $listing->slug) }}">
                    <x-listing-item :listing="$listing" />
                </a>
            @empty
                <div class="text-gray-700 text-base">No vehicles found.</div>
            @endforelse
        </div>

    </div>

    <div class="bg-white rounded-sm shadow-md px-4 py-4 md:px-12 md:py-8">
        <div class="font-bold text-3xl pb-3">
            Need Help?
        </div>
        <div>
            We are here to make sure you get the answers you need, whether you’re ready to buy or browse.
        </div>
        @if ($vehicle->user->support_email || $vehicle->user->support_phone)
            <div class="py-8 grid grid-cols-1 md:grid-cols-2 gap-12">
                <div class="border border-gray-300 rounded-md px-6 py-5 flex flex-row space-x-3">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z"
                                stroke="#EB5757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M22 6L12 13L2 6" stroke="#EB5757" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>

                    </span>
                    <span class="mt-0.5">Send us an email at {{ $vehicle->user->support_email }}</span>
                </div>
                <div class="border border-gray-300 rounded-md px-6 py-5 flex flex-row space-x-3">
                    <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.0499 5C16.0267 5.19057 16.9243 5.66826 17.628 6.37194C18.3317 7.07561 18.8094 7.97326 18.9999 8.95M15.0499 1C17.0792 1.22544 18.9715 2.13417 20.4162 3.57701C21.8608 5.01984 22.7719 6.91101 22.9999 8.94M21.9999 16.92V19.92C22.0011 20.1985 21.944 20.4742 21.8324 20.7293C21.7209 20.9845 21.5572 21.2136 21.352 21.4019C21.1468 21.5901 20.9045 21.7335 20.6407 21.8227C20.3769 21.9119 20.0973 21.9451 19.8199 21.92C16.7428 21.5856 13.7869 20.5341 11.1899 18.85C8.77376 17.3147 6.72527 15.2662 5.18993 12.85C3.49991 10.2412 2.44818 7.27099 2.11993 4.18C2.09494 3.90347 2.12781 3.62476 2.21643 3.36162C2.30506 3.09849 2.4475 2.85669 2.6347 2.65162C2.82189 2.44655 3.04974 2.28271 3.30372 2.17052C3.55771 2.05833 3.83227 2.00026 4.10993 2H7.10993C7.59524 1.99522 8.06572 2.16708 8.43369 2.48353C8.80166 2.79999 9.04201 3.23945 9.10993 3.72C9.23656 4.68007 9.47138 5.62273 9.80993 6.53C9.94448 6.88792 9.9736 7.27691 9.89384 7.65088C9.81408 8.02485 9.6288 8.36811 9.35993 8.64L8.08993 9.91C9.51349 12.4135 11.5864 14.4864 14.0899 15.91L15.3599 14.64C15.6318 14.3711 15.9751 14.1858 16.3491 14.1061C16.723 14.0263 17.112 14.0555 17.4699 14.19C18.3772 14.5286 19.3199 14.7634 20.2799 14.89C20.7657 14.9585 21.2093 15.2032 21.5265 15.5775C21.8436 15.9518 22.0121 16.4296 21.9999 16.92Z"
                                stroke="#EB5757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span class="mt-0.5">Call us at {{ $vehicle->user->support_phone }}</span>
                </div>
            </div>
        @endif

    </div>
</div>
