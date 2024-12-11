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
        
        <!-- Bootstrap Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        <!-- Estilos personalizados -->
        <style>
            :root {
                --primary-red: #E90000;
                --hover-red: #E80000;
                --border-gray: #D9D9D9;
            }

            .bg-gray-100 {
                background-color: #f8f9fa !important;
            }

            .bg-red {
                background-color: var(--primary-red) !important;
            }

            .bg-gray-900 {
                background-color: #ffffff !important;
            }

            .dark\:bg-red {
                background-color: var(--primary-red) !important;
            }

            .dark\:bg-gray-900 {
                background-color: #ffffff !important;
            }

            .dark\:text-gray-200,
            .text-gray-200 {
                color: #ffffff !important;
            }

            .text-gray-800 {
                color: var(--primary-red) !important;
            }

            .border-gray-200 {
                border-color: var(--border-gray) !important;
            }

            /* Estilos para botones de navegación */
            .nav-link {
                color: white !important;
            }

            .nav-link:hover {
                background-color: var(--hover-red);
            }

            /* Estilos para el header */
            header {
                border-bottom: 1px solid var(--border-gray);
            }

            /* Botones personalizados */
            .button, 
            button[type="submit"] {
                
                color: black !important;
                font-weight: bold !important;
                background-color: transparent !important;
                border-radius: 32px !important;
                padding: 0.5rem 2rem !important;
            }

            .button:hover,
            button[type="submit"]:hover {
                background-color: var(--primary-red) !important;
                color: white !important;
            }

            /* Inputs personalizados */
            input[type="text"],
            input[type="email"],
            input[type="password"] {
                border: 2px solid var(--primary-red) !important;
                border-radius: 32px !important;
                padding: 0.5rem 1rem !important;
            }

            /* Sombras */
            .shadow {
                box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
            }

            /* Media queries */
            @media (max-width: 768px) {
                .button, 
                button[type="submit"] {
                    padding: 0.5rem 1rem !important;
                }
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-red shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
