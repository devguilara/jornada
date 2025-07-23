<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }
        .shadow-md-light {
            box-shadow: 5px 5px 10px #1e1e1e, -5px -5px 10px #2a2a2a;
        }
        .shadow-inner-xl-dark {
            box-shadow: inset 5px 5px 10px #1e1e1e, inset -5px -5px 10px #2a2a2a;
        }
        .text-pink-500-glow {
            text-shadow: 0 0 8px rgba(236, 72, 153, 0.7), 0 0 15px rgba(236, 72, 153, 0.4);
        }
        .border-pink-500-glow {
            box-shadow: 0 4px 6px -1px rgba(236, 72, 153, 0.3), 0 2px 4px -1px rgba(236, 72, 153, 0.15);
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-900 text-gray-200">
<div class="min-h-screen">
    <nav x-data="{ open: false }" class="bg-gray-800 border-b border-gray-700 shadow-lg relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ url('/') }}" class="flex items-center space-x-2">
                            <svg class="h-8 w-8 text-pink-500 text-pink-500-glow" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L14.414 5A2 2 0 0115 6.414V20a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 2h6v2H6V6zm0 4h6v2H6V10zm0 4h6v2H6v-2z" clip-rule="evenodd" />
                            </svg>
                            <span class="font-poppins text-2xl font-bold text-white text-pink-500-glow">Jornada do Casamento</span>
                        </a>
                    </div>

                    <div class="hidden space-x-6 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                    class="relative px-4 py-2 border-b-2 border-transparent transition duration-300 ease-in-out bg-gray-800 rounded-md
                                           {{ request()->routeIs('dashboard') ? 'text-pink-400' : 'text-gray-300 hover:text-white hover:border-pink-500-glow' }}">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('playlists.index')" :active="request()->routeIs('playlists.index')"
                                    class="relative px-4 py-2 border-b-2 border-transparent transition duration-300 ease-in-out bg-gray-800 rounded-md
                                           {{ request()->routeIs('playlists.index') ? 'text-pink-400' : 'text-gray-300 hover:text-white hover:border-pink-500-glow' }}">
                            {{ __('Playlists') }}
                        </x-nav-link>

                        <x-nav-link :href="route('gallery.index')" :active="request()->routeIs('gallery.index')"
                                    class="relative px-4 py-2 border-b-2 border-transparent transition duration-300 ease-in-out bg-gray-800 rounded-md
                                           {{ request()->routeIs('gallery.index') ? 'text-pink-400' : 'text-gray-300 hover:text-white hover:border-pink-500-glow' }}">
                            {{ __('Galeria') }}
                        </x-nav-link>


                        <x-nav-link :href="route('notes.index')" :active="request()->routeIs('notes.index')"
                                    class="relative px-4 py-2 border-b-2 border-transparent transition duration-300 ease-in-out bg-gray-800 rounded-md
                                           {{ request()->routeIs('notes.index') ? 'text-pink-400' : 'text-gray-300 hover:text-white hover:border-pink-500-glow' }}">
                            {{ __('Notas') }}
                        </x-nav-link>
                    </div>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 border border-gray-700 text-sm leading-4 font-medium rounded-full text-gray-300 bg-gray-800 hover:text-white hover:border-pink-500-glow focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ml-2">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')" class="text-gray-300 hover:bg-gray-700 hover:text-white px-4 py-2">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-400 hover:bg-gray-700 hover:text-red-300 px-4 py-2">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gray-800 border-t border-gray-700">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-300 hover:text-white hover:bg-gray-700">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('playlists.index')" :active="request()->routeIs('playlists.index')" class="text-gray-300 hover:text-white hover:bg-gray-700">
                    {{ __('Playlists') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-4 pb-1 border-t border-gray-700">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')" class="text-gray-300 hover:text-white hover:bg-gray-700">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="text-red-400 hover:text-red-300 hover:bg-gray-700">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    @if (isset($header))
        <header class="bg-gray-800 shadow-md-light border-b border-gray-700">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-white font-poppins">
                    {{ $header }}
                </h2>
            </div>
        </header>
    @endif

    <main>
        <div class="bg-gray-900">
            {{ $slot }}
        </div>
    </main>
</div>
</body>
</html>