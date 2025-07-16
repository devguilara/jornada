<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Minhas Playlists') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-gray-200 font-sans min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-3xl shadow-xl p-8">
                {{-- Novo Container Flex Responsivo --}}
                <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8">
                    {{-- Container do Título e Descrição --}}
                    <div class="mb-4 md:mb-0">
                        <h3 class="text-4xl font-extrabold tracking-tight text-white font-poppins">Minhas Playlists</h3>
                        <p class="mt-2 text-sm text-gray-400">
                            Aqui você verá e gerenciará suas playlists musicais.
                        </p>
                    </div>

                    {{-- Botão "Criar Nova Playlist" --}}
                    <div class="flex-shrink-0 w-full md:w-auto">
                        <a href="{{ route('playlists.create') }}" class="w-full md:w-auto inline-flex items-center justify-center px-6 py-3 bg-pink-500 hover:bg-pink-600 border-2 border-pink-500 text-white rounded-full font-bold uppercase tracking-wider transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                            <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-8z"/>
                            </svg>
                            Criar Nova Playlist
                        </a>
                    </div>
                </div>

                <div class="mt-8">
                    @if ($playlists->isEmpty())
                        <div class="p-8 text-center bg-gray-700 rounded-2xl shadow-md-light">
                            <p class="text-xl text-gray-300 mb-4">Você ainda não tem nenhuma playlist. 🎶</p>
                            <p class="text-md text-gray-400">Clique em "Criar Nova Playlist" para começar a montar suas coleções de músicas!</p>
                        </div>
                    @else
                        {{-- A principal mudança está aqui: cada card agora é um flex container --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($playlists as $playlist)
                                <div class="p-6 rounded-2xl bg-gray-800 shadow-md-light hover:bg-gray-700 transition duration-300 transform hover:-translate-y-1 group flex flex-col justify-between h-full">
                                    {{-- Conteúdo principal da playlist (nome e descrição) --}}
                                    <a href="{{ route('playlists.show', $playlist) }}" class="block flex-grow">
                                        <h4 class="text-2xl font-bold text-white mb-2 group-hover:text-pink-400 transition duration-300 font-poppins">{{ $playlist->name }}</h4>
                                        <p class="text-sm text-gray-400">{{ $playlist->description }}</p>
                                    </a>

                                    {{-- Botões de ação, agora no final do card --}}
                                    <div class="mt-4 flex justify-end items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <a href="{{ route('playlists.edit', $playlist) }}" class="p-2 text-blue-400 hover:text-blue-300 bg-gray-700 rounded-full transition duration-150 ease-in-out hover:scale-110" title="Editar Playlist">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('playlists.destroy', $playlist) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta playlist?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-red-400 hover:text-red-300 bg-gray-700 rounded-full transition duration-150 ease-in-out hover:scale-110" title="Excluir Playlist">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        .shadow-md-light {
            box-shadow: 5px 5px 10px #1e1e1e, -5px -5px 10px #2a2a2a;
        }
    </style>
</x-app-layout>