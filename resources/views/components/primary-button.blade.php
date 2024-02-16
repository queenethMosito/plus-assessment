<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center  px-4 py-1 bg-transparent border border-yellow text-yellow']) }}
    style="border-radius: 50px;">
    {{ $slot }}
</button>
