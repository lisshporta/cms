<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-volt-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-volt-primary-disabled active:bg-volt-primary focus:outline-none focus:border-volt-primary disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
