<x-guest-layout>
    <div class="py-12 bg-gray-900 text-gray-200 font-sans min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-3xl shadow-xl p-8">

                <div class="mb-8 text-center">
                    <h3 class="text-4xl font-extrabold tracking-tight text-white font-poppins mb-2">Entrar</h3>
                    <p class="mt-2 text-sm text-gray-400">Entre na sua conta para começar a planejar seu evento.</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="p-6 bg-gray-800 rounded-2xl shadow-inner-xl-dark">
                    @csrf

                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-gray-400" />
                        <input id="email" class="block mt-1 w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Senha')" class="text-gray-400" />
                        <input id="password" class="block mt-1 w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex justify-between items-center mt-4">
                        <div class="block">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-pink-500 shadow-sm focus:ring-pink-500" name="remember">
                                <span class="ms-2 text-sm text-gray-400">{{ __('Lembre-se de mim') }}</span>
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-400 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition ease-in-out duration-150" href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }}
                            </a>
                        @endif
                    </div>

                    <div class="flex flex-col items-center justify-end mt-6">
                        <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 bg-pink-500 hover:bg-pink-600 border-2 border-pink-500 text-white rounded-full font-bold uppercase tracking-wider transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                            {{ __('Entrar') }}
                        </button>
                    </div>

                    <div class="mt-6 text-center text-sm text-gray-400">
                        Ainda não tem uma conta?
                        <a href="{{ route('register') }}" class="font-semibold text-pink-400 hover:text-white transition duration-200">
                            Registre-se
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .shadow-inner-xl-dark {
            box-shadow: inset 5px 5px 10px #1e1e1e, inset -5px -5px 10px #2a2a2a;
        }
        .shadow-md-light {
            box-shadow: 5px 5px 10px #1e1e1e, -5px -5px 10px #2a2a2a;
        }
        .font-poppins {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</x-guest-layout>