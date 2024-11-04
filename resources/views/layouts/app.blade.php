<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Simpac') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="min-h-screen flex flex-col justify-between">
    @include('layouts.navigation')

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <footer class="w-full bg-black flex flex-col justify-center items-center gap-2 py-2 mt-5">
        <img src="" alt="" class="w-1/2 max-w-36">

        <p class="text-white font-semibold">contato@univicosa.com.br</p>

        <p class="text-white font-semibold">(31) 3899-8000</p>

        <p class="text-white font-semibold">Viçosa - MG</p>
    </footer>

</body>

</html>