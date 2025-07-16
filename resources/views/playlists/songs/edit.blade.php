<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Música') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-gray-200 font-sans min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-3xl shadow-xl p-8">
                <div class="mb-8">
                    <h3 class="text-4xl font-extrabold tracking-tight text-white font-poppins">Editar Música</h3>
                    <p class="mt-2 text-sm text-gray-400">Altere os detalhes de sua música na playlist "<span class="text-pink-400">{{ $playlist->name }}</span>".</p>
                </div>

                <form method="POST" action="{{ route('playlists.songs.update', ['playlist' => $playlist->id, 'song' => $song->id]) }}" class="mt-6 p-6 bg-gray-800 rounded-2xl shadow-inner-xl-dark">
                    @csrf
                    @method('PUT') {{-- Importante: usa o método HTTP PUT para atualização --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="title" :value="__('Título da Música')" class="text-gray-400" />
                            <input id="title" class="block mt-1 w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800" type="text" name="title" value="{{ old('title', $song->title) }}" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="artist" :value="__('Artista')" class="text-gray-400" />
                            <input id="artist" class="block mt-1 w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800" type="text" name="artist" value="{{ old('artist', $song->artist) }}" />
                            <x-input-error :messages="$errors->get('artist')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="link" :value="__('Link (opcional)')" class="text-gray-400" />
                            <input id="link" class="block mt-1 w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800" type="text" name="link" value="{{ old('link', $song->link) }}" />
                            <x-input-error :messages="$errors->get('link')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="stage" :value="__('Etapa')" class="text-gray-400" />
                            <select id="stage" name="stage" class="block mt-1 w-full rounded-md border-transparent bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                                <option value="" @if(old('stage', $song->stage) === '') selected @endif>Selecione a Etapa</option>
                                <option value="cerimonia" @if(old('stage', $song->stage) === 'cerimonia') selected @endif>Cerimônia</option>
                                <option value="coquetel" @if(old('stage', $song->stage) === 'coquetel') selected @endif>Coquetel</option>
                                <option value="jantar" @if(old('stage', $song->stage) === 'jantar') selected @endif>Jantar</option>
                                <option value="festa" @if(old('stage', $song->stage) === 'festa') selected @endif>Festa</option>
                            </select>
                            <x-input-error :messages="$errors->get('stage')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="order" :value="__('Ordem')" class="text-gray-400" />
                            <input id="order" class="block mt-1 w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800" type="number" name="order" value="{{ old('order', $song->order) }}" />
                            <x-input-error :messages="$errors->get('order')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-8">
                        <a href="{{ route('playlists.show', $playlist) }}" class="inline-flex items-center px-6 py-3 bg-gray-700 border border-gray-600 rounded-full font-bold text-sm text-gray-300 uppercase tracking-wider shadow-md-light hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition ease-in-out duration-150 transform hover:scale-105">
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

    <!-- Estilos Customizados (certifique-se de que estes estão no seu app.css ou num <style> no app.blade.php) -->
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