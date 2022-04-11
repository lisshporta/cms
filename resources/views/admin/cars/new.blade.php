@section('title', 'New Car')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            New Car
        </h2>
    </x-slot>

    @livewire('forms.car.new-car')

</x-app-layout>
