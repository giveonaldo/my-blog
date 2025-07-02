<button {{ $attributes->merge(['type' => 'submit', 'class' => 'group relative inline-block focus:ring-3
    focus:outline-hidden']) }}>
    <span
        class="absolute inset-0 translate-x-0 translate-y-0 bg-yellow-300 transition-transform group-hover:translate-x-1.5 group-hover:translate-y-1.5"></span>
    <span class="relative inline-block border-2 border-current px-4 py-2 text-sm font-bold tracking-widest uppercase">
        {{ $slot }}
    </span>
</button>