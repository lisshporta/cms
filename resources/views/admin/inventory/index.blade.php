@section('title', 'Vehicles')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Inventory
        </h2>
    </x-slot>

    <div class="pb-6 flex flex-row justify-end">
        <x-volt-button href="{{route('admin.inventory.new')}}" title='New Vehicle'/>
    </div>

    <div class="pb-20">
        @livewire('vehicle.list-vehicle')
    </div>
</x-app-layout>
