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
            <div class="text-center pt-3 text-base text-gray-500">{{ '@' }}{{ $owner->domain }}</div>
            <div class="text-center pt-4 font-bold text-3xl">{{ $owner->name }}</div>
            <div class="text-center text-base w-3/4 text-black">{{ $owner->description }}</div>
        </div>
    </div>
    <div class="my-36 mx-auto max-w-7xl px-8 xl:px-0">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8 py-8">
            @forelse($listings as $listing)
                <a href="{{ route('view-vehicle', $listing->slug) }}">
                    <x-listing-item :listing="$listing" />
                </a>
            @empty
                <div class="text-gray-700 text-base">No vehicles found.</div>
            @endforelse
        </div>
        <div class="pt-8">
            {{ $listings->links() }}
        </div>
    </div>

</div>
