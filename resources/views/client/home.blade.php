@section('title', $owner->name)
<div>
    <div class="relative">
        <div class="bg-volt-primary py-40 min-w-min"></div>
        <div
            class="bg-white rounded-sm shadow-md px-12 py-10 absolute flex flex-col left-1/2 -translate-x-1/2 items-center top-14 self-center w-5/6 md:max-w-lg">
            @if ($owner->profile_photo_path)
                <img class="rounded-full h-32 w-32 object-cover" src="{{ asset($owner->profile_photo_path) }}" />
            @else
            <div class="rounded-full bg-gray-600 h-32 w-32"></div>
            @endif
            <div class="text-center pt-3 text-base text-gray-500">{{"@"}}{{ $owner->domain }}</div>
            <div class="text-center pt-4 font-bold text-3xl">{{ $owner->name }}</div>
            <div class="text-center text-base w-3/4 text-black">{{$owner->description}}</div>
        </div>
    </div>
    <div class="my-36 mx-auto max-w-6xl px-8 xl:px-0">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 py-8">
            @forelse($listings as $listing)
                <div class="w-full bg-white flex flex-col">

                    @if ($listing->cover_path)
                        <img class="w-full h-52 object-cover" src="{{ asset($listing->cover_path) }}" />
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
                                        stroke="#FD4F4F" stroke-width="1.25" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex flex-row justify-end py-2">
                            <div class="font-bold text-black text-base">${{ number_format($listing->price, 2) }}
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-gray-700 text-base">No vehicles found.</div>
            @endforelse
        </div>
        <div class="pt-8">
            {{ $listings->links() }}
        </div>
    </div>

</div>
