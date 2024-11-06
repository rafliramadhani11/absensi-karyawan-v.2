<select
    {{ $attributes->merge([
        'class' =>
            'block w-full py-2 text-sm text-gray-900 border-0 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6',
    ]) }}>
    {{ $slot }}
</select>
