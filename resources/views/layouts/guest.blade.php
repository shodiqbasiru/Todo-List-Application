<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Todo List Application</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="relative min-h-screen  flex flex-col sm:justify-center items-center pt-6 sm:pt-0 " style="background-image: url('{{ asset('img/bg-guest.jpg') }}'); background-size: cover;" >
        <div class="absolute inset-0 bg-gray-100 dark:bg-gray-900 opacity-75" style="z-index: 0;">
        </div>

            <div class="w-full sm:max-w-md mt-6 p-6 bg-amber-700 shadow-md overflow-hidden sm:rounded-lg" style="z-index: 1;">

                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-white text-center">Todo List</h1>
                    <h1 class="text-3xl font-bold text-white text-center">Application</h1>
                </div>
                {{ $slot }}
            </div>
    </div>

</body>

</html>
