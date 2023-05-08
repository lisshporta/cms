<div {{ $attributes->merge(['class' => 'flex align-items bg-white border p-4']) }}>
    <div class="flex justify-center mr-3">
        {{ $icon }}
    </div>
    <div class="flex items-center">
        <p class="text-md font-campton font-medium">
            {{ $title }}
        </p>
    </div>
</div>
