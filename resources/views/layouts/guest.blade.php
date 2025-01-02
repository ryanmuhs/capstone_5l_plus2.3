<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=app_registration" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-tailblue">
            <h2 class="font-bold text-red">
                Klinik Aliyah Medika
            </h2>
            <img src="{{asset('images/logo_kemkes_jadi.jpg')}}" alt="logo-kemenkes" class="w-fit h-fit">
            <div class="flex bg-[#4A9DA6] flex-col sm:justify-center items-center pt-6 sm:pt-0 rounded-lg">
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white/[.6] shadow-md overflow-hidden rounded-lg z-40">
                        {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
