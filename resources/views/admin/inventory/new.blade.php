@section('title', 'New Vehicle')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            New Vehicle
        </h2>
    </x-slot>

    @livewire('forms.car.new-car')

</x-app-layout>
