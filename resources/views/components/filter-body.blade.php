@props([
    'body'
])
<div>
    <label class="flex items-center">
        <input type="checkbox"
               wire:click="$emit('filterBodies', '{{$body->name}}')"
               value="{{$body->name}}"
               x-model="allChecked"
               class="border-gray-300 rounded text-volt-primary focus:shadow-none focus:outline-none"
        />
        <span class="ml-2">{{ $body->name }}</span>
    </label>
</div>

