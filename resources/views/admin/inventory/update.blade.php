@section('title', $vehicle->name)
<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="flex items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Edit Vehicle Details
                </h2>
            </div>
            <div class="flex flex-row pt-4 md:pt-0 md:justify-end">
                @livewire('components.delete-button', ['model' => $vehicle, 'route' => route('admin.inventory.index')])
            </div>
        </div>
    </x-slot>
    @livewire('forms.vehicle.update-vehicle', ['vehicle' => $vehicle])
</x-app-layout>
