@props(['type'])

<span
    class="
    {{ $type === 'hadir' ? 'bg-green-600' : ($type === 'izin' ? 'bg-yellow-600' : 'bg-red-600') }}
    text-white capitalize text-xs font-semibold px-2.5 py-0.5 rounded-full">
    {{ $type ?? $slot }}
</span>
