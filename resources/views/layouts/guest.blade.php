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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased" style="background: linear-gradient(135deg, #f0f4f8 0%, #e8eef5 50%, #f5f0eb 100%);">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="/">
                    <img src="{{ asset('img/LOGO_F_1973.webp') }}" alt="Logo CEPEIGE" class="w-32 h-32 object-contain">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 bg-white shadow-xl overflow-hidden sm:rounded-2xl border border-gray-100">
                <div class="h-2 w-full" style="background: linear-gradient(90deg, #02549E 0%, #0367A6 40%, #f3762b 100%);"></div>
                <div class="px-6 py-6 sm:p-8">
                    <h2 class="text-center font-bold text-xl mb-6 tracking-wide" style="color: #0367a6;">ACCESO ADMINISTRATIVO</h2>
                    {{ $slot }}
                </div>
            </div>
            
            <div class="mt-8 text-center text-xs text-gray-500 font-medium">
                &copy; {{ date('Y') }} CEPEIGE - Centro Panamericano de Estudios e Investigaciones Geográficas
            </div>
        </div>
    </body>
</html>
