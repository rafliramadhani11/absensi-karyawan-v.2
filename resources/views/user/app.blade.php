<x-app-layout>

    <x-slot name="header">
        Absensi
    </x-slot>

    <h1 class="mb-5 text-2xl font-semibold">
        {{ Date::now()->translatedFormat('j F Y') }}
    </h1>

    <livewire:attendance-table :user="$user" />

</x-app-layout>
