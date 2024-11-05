<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>

<body class="antialiased bg-gray-100">

    @if ($user->role === 'Admin')
        <x-admin-navigation :user="$user" />
    @elseif ($user->role === 'HRD')
        <x-hrd-navigation :user="$user" />
    @else
        <x-employee-navigation :user="$user" />
    @endif

    <div class="w-full p-3 text-xl font-semibold bg-white shadow sm:px-6 lg:px-16">
        Absensi
    </div>

    <main class="px-3 py-5 sm:px-6 lg:mx-10">
        {{ $slot }}
    </main>

    @livewireScripts
</body>

</html>
