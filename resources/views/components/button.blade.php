@props([
    'label' => '',
    'type' => '',
])

<button type="{{ $type }}"
    {{ $attributes->merge([
        'class' =>
            'inline-block px-2 py-1.5 font-semibold tracking-wide text-white bg-blue-600 hover:bg-blue-700 transition duration-300 rounded',
    ]) }}>
    {{ $label }}
</button>
