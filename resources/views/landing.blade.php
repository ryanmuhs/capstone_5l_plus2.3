<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SIAM</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=app_registration" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .material-symbols-outlined {
                font-variation-settings:
                    'FILL' 0,
                    'wght' 400,
                    'GRAD' 0,
                    'opsz' 24;
                color: '#7BC862';
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-[#4A9DA6] selection:text-white">

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                    <img 
                    src="{{asset('/images/logo_kemkes_jadi.jpg')}}" 
                    alt="logo-kemenkes"
                    class="w-max h-max">
                </div>

                <div class="flex flex-col justify-center align-middle items-center">
                    <h2 class="mt-6 text-2xl font-black text-gray-900 text-center">
                        SISTEM INFORMASI<br>KLINIK ALIYAH MEDIKA
                    </h2>
                    

                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-2 gap-6 lg:gap-8">
                        
                            <div class="scale-100 p-6 bg-white from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex flex-col motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">

                                <h2 class="mt-2 text-xl font-semibold text-gray-900">Syarat dan Ketentuan</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit molestiae optio ad vero explicabo magni deleniti natus, labore cumque dicta earum ut, nemo adipisci omnis quaerat eligendi rem reiciendis beatae.
                                </p>
                            </div>
                            <div class="scale-100 p-6 bg-white from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex flex-col motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">

                                <h2 class="mt-2 text-xl font-semibold text-gray-900">Jadwal Pelayanan Klinik</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Pagi : 07.30 - 08.30 WIB<br>
                                    Siang : 13.00 - 14.00 WIB<br>
                                    Malam : 19.00 - 20.00 WIB
                                </p>
                            </div>
                        

                    </div>
                    <div class="flex flex-col w-full gap-y-2  items-center justify-center mt-4 ">
                        <a href="/pasien/registrasi">
                            <button class="bg-blue-950 text-white w-full p-4">
                                Daftar Antrian
                            </button>
                        </a>
                        <a href="/login">
                            <button class="bg-blue-950 text-white p-4">
                                Masuk sebagai Admin
                            </button>
                        </a>
                    </div>

                </div>

                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm sm:text-left">
                        &nbsp;
                    </div>

                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        Developed by : 5L & Plus2.3 - 2024
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
