@props([
    "title",
    "reset",
])
<div
    x-data="{ allChecked: [] }"
    x-init="$watch('allChecked', allChecked => allChecked.length === 0 ? Livewire.emit('{{ $reset }}') : null )"
>
    <div class="flex w-full justify-between items-center pb-2">
        <p class="text-base font-bold uppercase">{{ $title }}</p>
        <p class="cursor-pointer text-sm text-volt-primary font-medium" @click="allChecked = []" wire:click="$emit('{{ $reset }}')">Reset</p>
    </div>
    <div class="pl-4 border-l">
        {{  $slot }}
    </div>
</div>
