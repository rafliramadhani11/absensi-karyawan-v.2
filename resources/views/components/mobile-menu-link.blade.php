@props([
    'href' => '#',
    'label' => null,
])

<a href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'flex items-center w-full px-3 py-2 font-semibold transition duration-200 sm:px-6 hover:bg-slate-200',
    ]) }}>
    {{ $label ?? $slot }}
</a>
