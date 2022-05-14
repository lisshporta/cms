@section('title', 'Explore')
<div class="flex flex-row overflow-hidden">
    <!-- Static sidebar for desktop -->
    <div class="hidden md:flex md:w-72 md:flex-col md:absolute md:inset-y-0">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-20 px-8">
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
                <div>
                    <div class="text-sm font-semibold uppercase pb-2">Color</div>
                </div>
                <div>
                    <div class="text-sm font-semibold uppercase pb-2">Year</div>
                </div>
                <div>
                    <div class="text-sm font-semibold uppercase pb-2">Price</div>
                </div>
            </div>
        </div>
    </div>

    <div class="pl-0 md:pl-72 pt-20 w-full min-h-screen overflow-hidden">
        <div class="w-full min-h-full overflow-y-auto p-4">
            <div class="bg-white rounded-md px-4 py-3 md:px-8 md:py-6 flex flex-row mb-8 mt-4">
                <div class="rounded-md border border-indigo-400 flex flex-row items-center w-full px-4">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.2716 12.1684L10.3313 9.22813C11.0391 8.28574 11.4213 7.13865 11.42 5.96C11.42 2.94938 8.97063 0.5 5.96 0.5C2.94938 0.5 0.5 2.94938 0.5 5.96C0.5 8.97063 2.94938 11.42 5.96 11.42C7.13865 11.4213 8.28574 11.0391 9.22813 10.3313L12.1684 13.2716C12.3173 13.4046 12.5114 13.4756 12.711 13.47C12.9105 13.4645 13.1004 13.3827 13.2415 13.2415C13.3827 13.1004 13.4645 12.9105 13.47 12.711C13.4756 12.5114 13.4046 12.3173 13.2716 12.1684ZM2.06 5.96C2.06 5.18865 2.28873 4.43463 2.71727 3.79328C3.14581 3.15192 3.7549 2.65205 4.46753 2.35687C5.18017 2.06169 5.96433 1.98446 6.72085 2.13494C7.47738 2.28542 8.17229 2.65686 8.71772 3.20228C9.26314 3.74771 9.63458 4.44262 9.78506 5.19915C9.93555 5.95567 9.85831 6.73983 9.56313 7.45247C9.26795 8.1651 8.76808 8.77419 8.12672 9.20273C7.48537 9.63127 6.73135 9.86 5.96 9.86C4.92604 9.85876 3.93478 9.44747 3.20365 8.71635C2.47253 7.98522 2.06124 6.99396 2.06 5.96Z" fill="#4B5563" />
                    </svg>
                    <input type="text" wire:model="search" class="focus:ring-0 border-0 w-full text-xs md:text-sm text-gray-600" placeholder="Search by make, model or body type" />
                </div>
                {{-- <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-volt-primary hover:bg-volt-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Search
                </button> --}}
            </div>

            <div class="font-semibold text-xl pb-6">Vehicles</div>

            <div class="grid grid-cols-1 xs:grid-cols-1 sm:grid-cols-2 md:flex md:flex-wrap gap-8">
                @forelse($listings as $listing)
                <div class="w-full bg-white flex flex-col col-span-1 md:w-72">
                    <div style="background-color: #DBEAFE" class=" w-full h-52 border-2 border-blue-500 border-dashed flex justify-center items-center">
                        <svg width="41" height="34" viewBox="0 0 41 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M37.9381 0.162842H2.64396C1.34446 0.162842 0.291016 1.21817 0.291016 2.51998V30.8057C0.291016 32.1075 1.34446 33.1628 2.64396 33.1628H37.9381C39.2376 33.1628 40.291 32.1075 40.291 30.8057V2.51998C40.291 1.21817 39.2376 0.162842 37.9381 0.162842ZM2.64322 30.8055V2.5198H37.9373V30.8055H2.64322ZM6.7614 9.88582C6.7614 12.3267 8.73662 14.3055 11.1732 14.3055C13.6097 14.3055 15.5849 12.3267 15.5849 9.88582C15.5849 7.44492 13.6097 5.46618 11.1732 5.46618C8.73662 5.46618 6.7614 7.44492 6.7614 9.88582ZM13.2312 9.88564C13.2312 11.0247 12.3095 11.9481 11.1724 11.9481C10.0354 11.9481 9.11358 11.0247 9.11358 9.88564C9.11358 8.74655 10.0354 7.82314 11.1724 7.82314C12.3095 7.82314 13.2312 8.74655 13.2312 9.88564ZM8.76616 28.1066C8.30474 28.5648 7.55984 28.5616 7.10239 28.0994C6.64494 27.6371 6.64816 26.8909 7.10959 26.4326L16.7857 16.8227L22.2394 21.5748C22.7296 22.002 22.7814 22.7464 22.355 23.2375C21.9285 23.7286 21.1854 23.7805 20.6952 23.3533L16.8903 20.0379L8.76616 28.1066ZM17.5932 28.1034C17.1338 28.5637 16.3889 28.5637 15.9294 28.1035C15.4699 27.6432 15.4699 26.897 15.9293 26.4367L31.4132 10.9237L39.8901 18.3749C40.3785 18.8042 40.427 19.5488 39.9985 20.0381C39.57 20.5274 38.8267 20.576 38.3383 20.1467L31.5184 14.1521L17.5932 28.1034Z" fill="#1D4ED8" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M37.9381 0.162842H2.64396C1.34446 0.162842 0.291016 1.21817 0.291016 2.51998V30.8057C0.291016 32.1075 1.34446 33.1628 2.64396 33.1628H37.9381C39.2376 33.1628 40.291 32.1075 40.291 30.8057V2.51998C40.291 1.21817 39.2376 0.162842 37.9381 0.162842ZM2.64322 30.8055V2.5198H37.9373V30.8055H2.64322ZM6.7614 9.88582C6.7614 12.3267 8.73662 14.3055 11.1732 14.3055C13.6097 14.3055 15.5849 12.3267 15.5849 9.88582C15.5849 7.44492 13.6097 5.46618 11.1732 5.46618C8.73662 5.46618 6.7614 7.44492 6.7614 9.88582ZM13.2312 9.88564C13.2312 11.0247 12.3095 11.9481 11.1724 11.9481C10.0354 11.9481 9.11358 11.0247 9.11358 9.88564C9.11358 8.74655 10.0354 7.82314 11.1724 7.82314C12.3095 7.82314 13.2312 8.74655 13.2312 9.88564ZM8.76616 28.1066C8.30474 28.5648 7.55984 28.5616 7.10239 28.0994C6.64494 27.6371 6.64816 26.8909 7.10959 26.4326L16.7857 16.8227L22.2394 21.5748C22.7296 22.002 22.7814 22.7464 22.355 23.2375C21.9285 23.7286 21.1854 23.7805 20.6952 23.3533L16.8903 20.0379L8.76616 28.1066ZM17.5932 28.1034C17.1338 28.5637 16.3889 28.5637 15.9294 28.1035C15.4699 27.6432 15.4699 26.897 15.9293 26.4367L31.4132 10.9237L39.8901 18.3749C40.3785 18.8042 40.427 19.5488 39.9985 20.0381C39.57 20.5274 38.8267 20.576 38.3383 20.1467L31.5184 14.1521L17.5932 28.1034Z" fill="#1D4ED8" />
                            <path d="M37.9381 0.162842H2.64396C1.34446 0.162842 0.291016 1.21817 0.291016 2.51998V30.8057C0.291016 32.1075 1.34446 33.1628 2.64396 33.1628H37.9381C39.2376 33.1628 40.291 32.1075 40.291 30.8057V2.51998C40.291 1.21817 39.2376 0.162842 37.9381 0.162842ZM2.64322 30.8055V2.5198H37.9373V30.8055H2.64322ZM6.7614 9.88582C6.7614 12.3267 8.73662 14.3055 11.1732 14.3055C13.6097 14.3055 15.5849 12.3267 15.5849 9.88582C15.5849 7.44492 13.6097 5.46618 11.1732 5.46618C8.73662 5.46618 6.7614 7.44492 6.7614 9.88582ZM13.2312 9.88564C13.2312 11.0247 12.3095 11.9481 11.1724 11.9481C10.0354 11.9481 9.11358 11.0247 9.11358 9.88564C9.11358 8.74655 10.0354 7.82314 11.1724 7.82314C12.3095 7.82314 13.2312 8.74655 13.2312 9.88564ZM8.76616 28.1066C8.30474 28.5648 7.55984 28.5616 7.10239 28.0994C6.64494 27.6371 6.64816 26.8909 7.10959 26.4326L16.7857 16.8227L22.2394 21.5748C22.7296 22.002 22.7814 22.7464 22.355 23.2375C21.9285 23.7286 21.1854 23.7805 20.6952 23.3533L16.8903 20.0379L8.76616 28.1066ZM17.5932 28.1034C17.1338 28.5637 16.3889 28.5637 15.9294 28.1035C15.4699 27.6432 15.4699 26.897 15.9293 26.4367L31.4132 10.9237L39.8901 18.3749C40.3785 18.8042 40.427 19.5488 39.9985 20.0381C39.57 20.5274 38.8267 20.576 38.3383 20.1467L31.5184 14.1521L17.5932 28.1034Z" fill="#1D4ED8" />
                            <path d="M37.9381 0.162842H2.64396C1.34446 0.162842 0.291016 1.21817 0.291016 2.51998V30.8057C0.291016 32.1075 1.34446 33.1628 2.64396 33.1628H37.9381C39.2376 33.1628 40.291 32.1075 40.291 30.8057V2.51998C40.291 1.21817 39.2376 0.162842 37.9381 0.162842ZM2.64322 30.8055V2.5198H37.9373V30.8055H2.64322ZM6.7614 9.88582C6.7614 12.3267 8.73662 14.3055 11.1732 14.3055C13.6097 14.3055 15.5849 12.3267 15.5849 9.88582C15.5849 7.44492 13.6097 5.46618 11.1732 5.46618C8.73662 5.46618 6.7614 7.44492 6.7614 9.88582ZM13.2312 9.88564C13.2312 11.0247 12.3095 11.9481 11.1724 11.9481C10.0354 11.9481 9.11358 11.0247 9.11358 9.88564C9.11358 8.74655 10.0354 7.82314 11.1724 7.82314C12.3095 7.82314 13.2312 8.74655 13.2312 9.88564ZM8.76616 28.1066C8.30474 28.5648 7.55984 28.5616 7.10239 28.0994C6.64494 27.6371 6.64816 26.8909 7.10959 26.4326L16.7857 16.8227L22.2394 21.5748C22.7296 22.002 22.7814 22.7464 22.355 23.2375C21.9285 23.7286 21.1854 23.7805 20.6952 23.3533L16.8903 20.0379L8.76616 28.1066ZM17.5932 28.1034C17.1338 28.5637 16.3889 28.5637 15.9294 28.1035C15.4699 27.6432 15.4699 26.897 15.9293 26.4367L31.4132 10.9237L39.8901 18.3749C40.3785 18.8042 40.427 19.5488 39.9985 20.0381C39.57 20.5274 38.8267 20.576 38.3383 20.1467L31.5184 14.1521L17.5932 28.1034Z" fill="#1D4ED8" />
                        </svg>
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
            <div class="py-8">
                {{$listings->links()}}
            </div>
        </div>
    </div>
</div>
