@props([
    'type' => 'text',
    'name' => '',
    'id' => '',
])

<div x-data="{ show: false }" class="relative">
    <input :type="show ? 'text' : '{{ $type }}'" id="{{ $id }}" name="{{ $name }}" required
        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

    @if ($type === 'password')
        <button type="button" @click="show = !show"
            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700">
            <x-icons.eye-slash />
            <x-icons.eye />
        </button>
    @endif
</div>
