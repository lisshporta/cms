@section('title', 'Contact ' . $owner->name)
<x-main-layout>
    <div class="my-14 mx-auto max-w-7xl px-8">
        @include('includes.flash')
        <div class="bg-white rounded-sm shadow-md px-4 py-4 md:px-12 md:py-8">
            <div class="pb-3">
                <div class="font-bold text-2xl">Contact {{ $owner->name }}</div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-7 gap-8">
                <div class="md:col-span-3">
                    <div class="font-regular text-gray-600 text-base pb-2">Send us a message</div>
                    <form action="{{route('contact-post')}}" method="POST" class="space-y-2">
                        @csrf
                        <div class="py-3 space-y-1">
                            <div class="font-semibold text-sm">Email</div>
                            <input required type="email" name="email" placeholder="Enter your email address"
                                class="font-regular w-full rounded-md bg-gray-50 border-gray-300">
                            @error('email')
                                <div class="mt-2 font-semibold text-sm text-volt-primary">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="py-3 space-y-1">
                            <div class="font-semibold text-sm">First name</div>
                            <input required type="text" name="name" placeholder="Enter your first name"
                                class="font-regular w-full rounded-md bg-gray-50 border-gray-300">
                            @error('name')
                                <div class="mt-2 font-semibold text-sm text-volt-primary">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="py-3 space-y-1">
                            <div class="font-semibold text-sm">Phone number</div>
                            <input required type="text" pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$" name="phone" placeholder="876-555-5555"
                                class="font-regular w-full rounded-md bg-gray-50 border-gray-300">
                            @error('phone')
                                <div class="mt-2 font-semibold text-sm text-volt-primary">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="py-3 space-y-1">
                            <div class="font-semibold text-sm">Subject</div>
                            <input required type="text" name="subject" placeholder="Enter your subject"
                                class="font-regular w-full rounded-md bg-gray-50 border-gray-300">
                            @error('subject')
                                <div class="mt-2 font-semibold text-sm text-volt-primary">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="py-3 space-y-1">
                            <textarea name="message" placeholder="Enter your message"
                                class="font-regular w-full rounded-md bg-gray-50 border-gray-300" cols="30" rows="5"></textarea>
                            @error('message')
                                <div class="mt-2 font-semibold text-sm text-volt-primary">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <div class="h-0.5 w-full bg-gray-200"></div>
                            <button type="submit"
                                class="bg-volt-primary font-semibold text-white text-center w-full my-4 py-2 rounded-md hover:shadow-md">Send</button>
                        </div>
                    </form>
                </div>
                <div class="md:col-span-4 space-y-3">
                    <div class="grid grid-cols-6 gap-4">
                        @if ($owner->support_phone)
                            <div class="col-span-3 md:col-span-2 space-y-2">
                                <div class="font-regular text-gray-600 text-base">Phone number</div>
                                <div class="font-semibold text-base">{{ $owner->support_phone }}</div>
                            </div>
                        @endif
                        @if ($owner->support_email)
                            <div class="col-span-3 md:col-span-4 space-y-2">
                                <div class="font-regular text-gray-600 text-base">Email</div>
                                <div class="font-semibold text-base">{{ $owner->support_email }}</div>
                            </div>
                        @endif
                    </div>
                    @if ($owner->lat && $owner->lng)
                        <div id="map" class=" h-3/5"></div>
                        @push('scripts')
                            <script type="text/javascript">
                                function initMap() {
                                    const lat = parseFloat('{{ $owner->lat }}');
                                    const lng = parseFloat('{{ $owner->lng }}');

                                    const myLatLng = {
                                        lat: lat,
                                        lng: lng
                                    };
                                    const map = new google.maps.Map(document.getElementById("map"), {
                                        zoom: 15,
                                        center: myLatLng,
                                    });

                                    new google.maps.Marker({
                                        position: myLatLng,
                                        map,
                                    });
                                }

                                window.initMap = initMap;
                            </script>

                            <script type="text/javascript"
                                src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>
                        @endpush
                    @endif
                </div>
            </div>

        </div>
    </div>


</x-main-layout>
