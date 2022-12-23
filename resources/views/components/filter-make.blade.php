@props([
    'make'
])
<div>
    <label class="flex items-center">
        <input type="checkbox"
               wire:click="$emit('filterMakes', '{{$make->name}}')"
               value="{{$make->name}}"
               x-model="allChecked"
               class="border-gray-300 rounded text-volt-primary focus:shadow-none focus:outline-none"
        />
        <span class="ml-2">{{ $make->name }}</span>
    </label>
</div>

