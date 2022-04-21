@section('title', 'Cars')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cars
        </h2>
    </x-slot>

    <div class="pb-6 flex flex-row justify-end">
        <x-volt-button href="{{route('car.new')}}" title='New Car' />
    </div>

    <div class="pb-20">
        @livewire('tables.car.all')
    </div>

</x-app-layout>
