<div>
    <div
        class="hidden md:flex md:flex-col fixed inset-y-0 border-r border-gray-200 bg-white px-8 py-8 space-y-8 pt-24 overflow-y-auto"
        style="min-width: 273px;z-index: 1;">
        <div x-data="{ expanded:false }">
            <div class="space-y-2 transition-all ease-in-out" :class="expanded ? 'h-[970px] overflow-hidden' : 'h-[300px] overflow-hidden'">
                <x-filter-group title="Makes" reset="resetMakes">
                    @foreach ($makes as $vehicle_make)
                        <x-filter-make :make="$vehicle_make"></x-filter-make>
                    @endforeach
                </x-filter-group>
            </div>
            <div class="text-center">
                <p class="text-volt-primary cursor-pointer pt-3 font-bold" @click="expanded = !expanded">See More</p>
            </div>
        </div>
        <div>
            <x-filter-group title="Body Type" reset="resetBodies">
                @foreach ($body_types as $body_type)
                    <x-filter-body :body="$body_type"></x-filter-body>
                @endforeach
            </x-filter-group>
        </div>
    </div>
</div>
