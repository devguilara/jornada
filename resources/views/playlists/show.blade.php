<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes da Playlist') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-gray-200 font-sans min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-3xl shadow-xl p-8">
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h3 class="text-4xl font-extrabold tracking-tight text-white font-poppins">{{ $playlist->name }}</h3>
                        <p class="mt-2 text-sm text-gray-400">{{ $playlist->description }}</p>
                    </div>
                    <a href="{{ route('playlists.index') }}" class="text-pink-400 hover:text-pink-300 font-semibold transition duration-200">
                        Voltar para as Playlists
                    </a>
                </div>

                {{-- Seção para Adicionar Música --}}
                <div class="mt-10 p-6 bg-gray-800 rounded-2xl shadow-inner-xl-dark">
                    <h4 class="text-2xl font-bold text-white mb-6 font-poppins">Adicionar Música</h4>
                    <form action="{{ route('playlists.songs.store', $playlist) }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-6 gap-6 items-end">
                            <div class="md:col-span-2">
                                <label for="title" class="block text-sm font-medium text-gray-400">Título da Música</label>
                                <input type="text" name="title" id="title" placeholder="Título da Música" class="mt-1 block w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800" required>
                            </div>

                            <div>
                                <label for="artist" class="block text-sm font-medium text-gray-400">Artista</label>
                                <input type="text" name="artist" id="artist" placeholder="Artista" class="mt-1 block w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                            </div>

                            <div>
                                <label for="link" class="block text-sm font-medium text-gray-400">Link</label>
                                <input type="text" name="link" id="link" placeholder="Link (YouTube, Spotify...)" class="mt-1 block w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                            </div>

                            <div>
                                <label for="stage" class="block text-sm font-medium text-gray-400">Etapa</label>
                                <select id="stage" name="stage" class="mt-1 block w-full rounded-md border-transparent bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                                    <option value="">Selecione a Etapa</option>
                                    <option value="cerimonia">Cerimônia</option>
                                    <option value="coquetel">Coquetel</option>
                                    <option value="jantar">Jantar</option>
                                    <option value="festa">Festa</option>
                                </select>
                            </div>

                            <div>
                                <label for="order" class="block text-sm font-medium text-gray-400">Ordem</label>
                                <input type="number" name="order" id="order" placeholder="0" class="mt-1 block w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                            </div>

                            <div class="md:col-span-6 flex justify-end">
                                <button type="submit" class="inline-flex items-center px-6 py-3 bg-pink-500 hover:bg-pink-600 border-2 border-pink-500 text-white rounded-full font-bold uppercase tracking-wider transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                                    Adicionar Música
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Seção para Músicas na Playlist --}}
                <div class="mt-12">
                    <h4 class="text-2xl font-bold text-white mb-6 font-poppins">Músicas na Playlist</h4>
                    @if ($songsByStage->isEmpty())
                        <div class="p-8 text-center bg-gray-700 rounded-2xl shadow-md-light">
                            <p class="text-xl text-gray-300 mb-4">Nenhuma música nesta playlist ainda. 🎵</p>
                            <p class="text-md text-gray-400">Use o formulário acima para começar a adicionar as músicas perfeitas!</p>
                        </div>
                    @else
                        @foreach ($songsByStage as $stage => $songs)
                            <div class="mb-8">
                                <h5 class="text-xl font-bold text-pink-400 mb-4 font-poppins">{{ ucfirst($stage) }}</h5>
                                <ul>
                                    @foreach ($songs as $song)
                                        <li class="p-6 mb-4 rounded-xl flex items-center bg-gray-800 shadow-md-light hover:bg-gray-700 transition duration-300 transform hover:-translate-y-1 group">
                                            <div class="flex-grow flex flex-col md:flex-row md:items-center md:space-x-4">
                                                <strong class="text-lg font-medium text-white">{{ $song->order }}. {{ $song->title }}</strong>
                                                @if ($song->artist)
                                                    <span class="text-sm text-gray-400">por {{ $song->artist }}</span>
                                                @endif
                                            </div>
                                            {{-- Ícones de Ação: agora dentro de um div com as classes de visibilidade --}}
                                            <div class="flex-shrink-0 flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                @if ($song->link)
                                                    <a href="{{ $song->link }}" target="_blank" class="p-3 text-pink-400 hover:text-pink-300 bg-gray-700 rounded-full transition duration-150 ease-in-out hover:scale-110" title="Abrir link">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                        </svg>
                                                    </a>
                                                @endif
                                                <a href="{{ route('playlists.songs.edit', ['playlist' => $playlist->id, 'song' => $song->id]) }}" class="p-3 text-blue-400 hover:text-blue-300 bg-gray-700 rounded-full transition duration-150 ease-in-out hover:scale-110" title="Editar">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                    </svg>
                                                </a>
                                                <form action="{{ route('playlists.songs.destroy', ['playlist' => $playlist->id, 'song' => $song->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta música?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="p-3 text-red-400 hover:text-red-300 bg-gray-700 rounded-full transition duration-150 ease-in-out hover:scale-110" title="Excluir">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    @endif
                </div>
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