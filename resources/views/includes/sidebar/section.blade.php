@if (strcasecmp($selected, $item) == 0)
    <span class="inline-flex items-center pr-1 text-volt-primary border-b-4 border-red-400">
        {{ $item }}
        <button type="button" wire:click="$set('{{$function}}', null)"
            class="flex-shrink-0 ml-2 h-4 w-4 rounded-full inline-flex items-center justify-center text-red-400 hover:bg-red-200 hover:text-red-500 focus:outline-none focus:bg-red-500 focus:text-white">
            <span class="sr-only">Remove large option</span>
            <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
            </svg>
        </button>
    </span>
@else
    <div class="cursor-pointer" wire:click="$set('{{$function}}', '{{ $item }}')">
        {{ $item }}
    </div>
@endif
