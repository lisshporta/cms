@section('title', 'Explore')
<div class="flex flex-row">
    <!-- Static sidebar for desktop -->
    {{--    TODO, replace Sidebar with blade component--}}
    <div class="hidden md:flex md:flex-col h-screen" style="min-width: 273px;">
        <div class="flex flex-col  border-r border-gray-200 bg-white pt-20 px-8 h-full">
            <div class="py-8 space-y-8">
                <div>
                    <div class="text-sm font-semibold uppercase pb-2">Make</div>
                    <div class="space-y-2">
                        @foreach ($makes as $m)
                          @if (strcasecmp($make, $m->name) == 0)
                           <span class="inline-flex items-center pr-1 text-volt-primary border-b-4 border-red-400">
                            {{$m->name}}
                            <button type="button" wire:click="$set('make', null)" class="flex-shrink-0 ml-2 h-4 w-4 rounded-full inline-flex items-center justify-center text-red-400 hover:bg-red-200 hover:text-red-500 focus:outline-none focus:bg-red-500 focus:text-white">
                              <span class="sr-only">Remove large option</span>
                              <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                              </svg>
                            </button>
                          </span>
                          @else
                          <div class="cursor-pointer" wire:click="$set('make', '{{$m->name}}')">{{$m->name}}</div>
                          @endif
                        @endforeach
                    </div>
                </div>
                <div>
                    <div class="text-sm font-semibold uppercase pb-2">Body Type</div>
                    <div class="space-y-2">
                        @foreach ($body_types as $b)
                          @if (strcasecmp($body, $b->name) == 0)
                           <span class="inline-flex items-center pr-1 text-volt-primary border-b-4 border-red-400">
                            {{$b->name}}
                            <button type="button" wire:click="$set('body', null)" class="flex-shrink-0 ml-2 h-4 w-4 rounded-full inline-flex items-center justify-center text-red-400 hover:bg-red-200 hover:text-red-500 focus:outline-none focus:bg-red-500 focus:text-white">
                              <span class="sr-only">Remove option</span>
                              <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                              </svg>
                            </button>
                          </span>
                          @else
                          <div class="cursor-pointer" wire:click="$set('body', '{{$b->name}}')">{{$b->name}}</div>
                          @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full overflow-hidden">
        <div class="w-full overflow-y-auto p-4 pt-20" style="max-height: 640px;">
            <div class="bg-white rounded-md px-4 py-3 md:px-8 md:py-6 flex flex-row mb-8 mt-4">
                <div class="rounded-md border border-indigo-400 flex flex-row items-center w-full px-4">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.2716 12.1684L10.3313 9.22813C11.0391 8.28574 11.4213 7.13865 11.42 5.96C11.42 2.94938 8.97063 0.5 5.96 0.5C2.94938 0.5 0.5 2.94938 0.5 5.96C0.5 8.97063 2.94938 11.42 5.96 11.42C7.13865 11.4213 8.28574 11.0391 9.22813 10.3313L12.1684 13.2716C12.3173 13.4046 12.5114 13.4756 12.711 13.47C12.9105 13.4645 13.1004 13.3827 13.2415 13.2415C13.3827 13.1004 13.4645 12.9105 13.47 12.711C13.4756 12.5114 13.4046 12.3173 13.2716 12.1684ZM2.06 5.96C2.06 5.18865 2.28873 4.43463 2.71727 3.79328C3.14581 3.15192 3.7549 2.65205 4.46753 2.35687C5.18017 2.06169 5.96433 1.98446 6.72085 2.13494C7.47738 2.28542 8.17229 2.65686 8.71772 3.20228C9.26314 3.74771 9.63458 4.44262 9.78506 5.19915C9.93555 5.95567 9.85831 6.73983 9.56313 7.45247C9.26795 8.1651 8.76808 8.77419 8.12672 9.20273C7.48537 9.63127 6.73135 9.86 5.96 9.86C4.92604 9.85876 3.93478 9.44747 3.20365 8.71635C2.47253 7.98522 2.06124 6.99396 2.06 5.96Z" fill="#4B5563" />
                    </svg>
                    <input type="text" wire:model="search" class="focus:ring-0 border-0 w-full text-xs md:text-sm text-gray-600" placeholder="Search by make, model or body type" />
                </div>
            </div>

            <div class="font-semibold text-xl pb-6">Vehicles</div>

            <div class="grid grid-cols-1 xs:grid-cols-1 sm:grid-cols-2 md:flex md:flex-wrap gap-8 justify-between">
                @forelse($listings as $listing)
                <div class="w-full bg-white flex flex-col col-span-1 max-w-xs">
                    <div style="background-color: #FFF0F0" class="w-full h-52 flex justify-center items-center">
                    </div>
                    <div class="bg-white h-40 flex flex-col justify-between px-3">
                        <div class="flex flex-row justify-between h-full py-3">
                            <div class="flex flex-col break-words">
                                <div class="text-base">{{$listing->year}} {{$listing->make}}</div>
                                <div class="text-xl font-semibold">{{$listing->model}}</div>
                                <div class="text-sm mt-1">{{$listing->body_type}}</div>
                            </div>
                            <div class="w-11 flex flex-row justify-end">
                                <svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.9578 2.59133C19.4691 2.08683 18.8889 1.68663 18.2503 1.41358C17.6117 1.14054 16.9272 1 16.2359 1C15.5446 1 14.8601 1.14054 14.2215 1.41358C13.5829 1.68663 13.0026 2.08683 12.5139 2.59133L11.4997 3.63785L10.4855 2.59133C9.49842 1.57276 8.1596 1.00053 6.76361 1.00053C5.36761 1.00053 4.02879 1.57276 3.04168 2.59133C2.05456 3.6099 1.5 4.99139 1.5 6.43187C1.5 7.87235 2.05456 9.25383 3.04168 10.2724L4.05588 11.3189L11.4997 19L18.9436 11.3189L19.9578 10.2724C20.4467 9.76814 20.8346 9.16942 21.0992 8.51045C21.3638 7.85148 21.5 7.14517 21.5 6.43187C21.5 5.71857 21.3638 5.01225 21.0992 4.35328C20.8346 3.69431 20.4467 3.09559 19.9578 2.59133ZM19.9578 2.59133V2.59133Z" stroke="#061021" stroke-width="1.25" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex flex-row justify-end py-2">
                            <div class="font-bold text-black text-lg">${{number_format($listing->price, 2)}}</div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-gray-700 text-base">No vehicles found.</div>
                @endforelse
            </div>

        </div>
        <div class="pt-8 px-8">
            {{$listings->links()}}
        </div>
    </div>
</div>
