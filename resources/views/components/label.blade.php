@props([
    'label' => '',
    'for' => '',
])

<label for="{{ $for }}"
    {{ $attributes->merge([
        'class' => 'block text-sm font-medium leading-6 text-gray-900 w-fit',
    ]) }}>
    {{ $label }}
</label>
