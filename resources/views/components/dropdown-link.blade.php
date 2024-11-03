@props([
    'href' => '#',
    'label' => null,
])

<a href="#"
    class="flex items-center w-full px-3 py-1 text-sm transition duration-300 hover:bg-slate-100 text-start">
    {{ $label ?? $slot }}
</a>
