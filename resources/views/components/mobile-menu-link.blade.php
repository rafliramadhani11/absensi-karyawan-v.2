@props([
    'href' => '#',
    'label' => null,
])

<a href="{{ $href }}"
    class="flex items-center w-full px-3 py-2 font-semibold transition duration-200 sm:px-6 hover:bg-slate-100 ">
    {{ $label ?? $slot }}
</a>
