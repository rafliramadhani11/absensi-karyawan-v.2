@props([
    'href' => '#',
    'label' => null,
])

<a href="{{ $href }}"
    class="mr-4 font-semibold rounded-md hover:underline hover:underline-offset-8 hover:decoration-2">
    {{ $label ?? $slot }}
</a>
