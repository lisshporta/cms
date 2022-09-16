<div class="w-full bg-white rounded-sm shadow-md flex flex-col col-span-1 max-w-sm sm:max-w-xs">
    @isset($listing->cover_path)
        <img style="min-width: 280px;" class="w-full h-52 object-cover" src="{{asset($listing->cover_path)}}"/>
    @else
        <div style="background-color: #e2e2e2; min-width: 280px;"
             class="w-full h-52 flex justify-center items-center"></div>
    @endisset

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
                        stroke="#061021" stroke-width="1.25" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
        <div class="flex flex-row justify-end py-2">
            <div class="font-bold text-black text-lg">${{ number_format($listing->price, 2) }}
            </div>
        </div>
    </div>
</div>
