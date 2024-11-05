@props([
    'label' => null,
])

<td {{ $attributes->merge(['class' => 'px-5 py-1 font-medium whitespace-nowrap']) }}>
    {{ $label ?? $slot }}
</td>
