@props([
    'label' => null,
])
<th {{ $attributes->merge([
    'class' => 'px-5 py-2 text-xs font-medium text-left uppercase',
]) }}>
    {{ $label ?? $slot }}
</th>
