<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>

<body class="antialiased bg-gray-100">
    <main class="flex items-center justify-center h-screen">
        {{ $slot }}
    </main>

    @livewireScripts
</body>

</html>
