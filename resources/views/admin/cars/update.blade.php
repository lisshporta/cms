@section('title', $vehicle->name)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Car Details
        </h2>
    </x-slot>

    @livewire('forms.car.update-car', ['vehicle' => $vehicle])

</x-app-layout>
