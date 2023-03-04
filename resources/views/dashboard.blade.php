<x-app-layout>
    @section('title', 'Dashboard')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        Oops, it looks like you haven't posted any vehicles for sale yet! <a class="underline" href="{{ route('admin.inventory.new') }}">Click here to post one now</a>
            </div>
        </div>
    </div>
</x-app-layout>
