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
    <body class="font-sans antialiased">

        @include('layouts.topnav')
        <div class="flex h-screen" :class="{ 'overflow-hidden': isSideMenuOpen }">
          <!-- Desktop sidebar -->
          @include('layouts.navigation')
      
          <div class="flex flex-col  w-full">
            <main class="w-full h-full overflow-y-auto">
              <div class="container px-6 mx-auto">
                @if (isset($header))
                <h2 class="my-6 text-xl font-semibold text-gray-700">
                  {{ $header }}
                </h2>
                @endif
                {{ $slot }}
              </div>
            </main>
          </div>
        </div>
        <script src="https://unpkg.com/leaflet-geosearch@latest/dist/bundle.min.js"></script>
      </body>
</html>
