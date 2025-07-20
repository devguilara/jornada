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

    <!-- Estilos Customizados -->
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
        .text-pink-500-glow {
            text-shadow: 0 0 8px rgba(236, 72, 153, 0.7), 0 0 15px rgba(236, 72, 153, 0.4);
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-900 text-gray-200">
<div class="min-h-screen flex flex-col">
    <!-- Navbar da Landing Page -->
    <nav x-data="{ open: false }" class="bg-gray-800 border-b border-gray-700 shadow-lg relative z-10 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <!-- Logo/Nome do Projeto -->
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <svg class="h-8 w-8 text-pink-500 text-pink-500-glow" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L14.414 5A2 2 0 0115 6.414V20a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 2h6v2H6V6zm0 4h6v2H6V10zm0 4h6v2H6v-2z" clip-rule="evenodd" />
                </svg>
                <span class="font-poppins text-2xl font-bold text-white text-pink-500-glow">Jornada do Casamento</span>
            </a>

            <!-- Links de Autenticação (Desktop) -->
            <div class="hidden sm:flex items-center space-x-4">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="inline-block px-5 py-1.5 text-gray-300 border border-transparent hover:border-pink-500-glow rounded-md text-sm leading-normal transition duration-300 ease-in-out">
                        {{ __('Login') }}
                    </a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-block px-5 py-1.5 bg-pink-500 hover:bg-pink-600 border-2 border-pink-500 text-white rounded-full font-bold uppercase tracking-wider transition duration-300 transform hover:scale-105">
                        {{ __('Registrar') }}
                    </a>
                @endif
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Responsive Navigation Menu (Mobile) -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gray-800 border-t border-gray-700">
            <div class="pt-2 pb-3 space-y-1">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 hover:border-gray-600 focus:outline-none focus:text-white focus:bg-gray-700 focus:border-gray-600 transition duration-150 ease-in-out">
                        {{ __('Login') }}
                    </a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-pink-400 hover:text-white hover:bg-gray-700 hover:border-pink-500 focus:outline-none focus:text-white focus:bg-gray-700 focus:border-pink-500 transition duration-150 ease-in-out">
                        {{ __('Registrar') }}
                    </a>
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="flex-grow flex items-center justify-center text-center px-4 py-16 sm:px-6 sm:py-20 md:py-24 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight text-white font-poppins mb-4 sm:mb-6 text-pink-500-glow leading-tight">
                Sua Jornada para o Casamento Perfeito Começa Aqui.
            </h1>
            <p class="text-base sm:text-lg text-gray-300 mb-8 sm:mb-10">
                Organize cada detalhe, desde as playlists musicais até as anotações importantes, com estilo e facilidade.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 bg-pink-500 hover:bg-pink-600 border-2 border-pink-500 text-white rounded-full font-bold uppercase tracking-wider text-lg transition duration-300 transform hover:scale-105 shadow-lg">
                        Ir para o Dashboard
                    </a>
                @else
                    <a href="{{ route('register') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 bg-pink-500 hover:bg-pink-600 border-2 border-pink-500 text-white rounded-full font-bold uppercase tracking-wider text-lg transition duration-300 transform hover:scale-105 shadow-lg">
                        Comece Agora
                    </a>
                    <a href="{{ route('login') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 bg-gray-700 border border-gray-600 rounded-full font-bold text-lg text-gray-300 uppercase tracking-wider shadow-md-light hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition ease-in-out duration-150 transform hover:scale-105">
                        Já tem uma conta?
                    </a>
                @endauth
            </div>
        </div>
    </main>

    <!-- Optional: Footer or other sections -->
    <footer class="bg-gray-800 text-gray-500 text-center py-6 text-sm">
        &copy; {{ date('Y') }} Jornada do Casamento. Todos os direitos reservados.
    </footer>
</div>
</body>
</html>