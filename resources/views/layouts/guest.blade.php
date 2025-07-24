<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jornada do Casamento') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Estilos Customizados (Removido o glow) -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }
        .shadow-inner-xl-dark {
            box-shadow: inset 5px 5px 10px #1e1e1e, inset -5px -5px 10px #2a2a2a;
        }
        .shadow-md-light {
            box-shadow: 5px 5px 10px #1e1e1e, -5px -5px 10px #2a2a2a;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-900 text-gray-200">
<div class="min-h-screen flex flex-col sm:justify-center items-center py-6 sm:py-0">
    <div class="w-full sm:max-w-md px-6 py-4 bg-gray-800 shadow-md-light overflow-hidden sm:rounded-3xl">
        {{ $slot }}
    </div>
</div>
</body>
</html>
