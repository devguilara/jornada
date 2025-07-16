<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Playlist') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-gray-200 font-sans min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-3xl shadow-xl p-8">
                <div class="mb-8">
                    <h3 class="text-4xl font-extrabold tracking-tight text-white font-poppins">Editar Playlist</h3>
                    <p class="mt-2 text-sm text-gray-400">Altere o nome e a descrição de sua playlist.</p>
                </div>

                <form method="POST" action="{{ route('playlists.update', $playlist) }}" class="mt-6 p-6 bg-gray-800 rounded-2xl shadow-inner-xl-dark">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="name" :value="__('Nome da Playlist')" class="text-gray-400" />
                        <input id="name" class="block mt-1 w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800" type="text" name="name" value="{{ old('name', $playlist->name) }}" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="description" :value="__('Descrição (Opcional)')" class="text-gray-400" />
                        <textarea id="description" class="block mt-1 w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800" name="description">{{ old('description', $playlist->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-8">
                        <a href="{{ route('playlists.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-700 border border-gray-600 rounded-full font-bold text-sm text-gray-300 uppercase tracking-wider shadow-md-light hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition ease-in-out duration-150 transform hover:scale-105">
                            {{ __('Cancelar') }}
                        </a>
                        <button type="submit" class="ms-4 inline-flex items-center px-6 py-3 bg-pink-500 hover:bg-pink-600 border-2 border-pink-500 text-white rounded-full font-bold uppercase tracking-wider transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                            {{ __('Salvar Alterações') }}
                        </button>
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
</x-app-layout>