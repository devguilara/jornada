<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Minhas Anotações') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-gray-200 font-sans min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-3xl shadow-xl p-8">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8">
                    <div>
                        <h3 class="text-4xl font-extrabold tracking-tight text-white font-poppins mb-2">Minhas Anotações</h3>
                        <p class="mt-2 text-sm text-gray-400">
                            Organize todas as suas ideias, contactos e informações importantes aqui.
                        </p>
                    </div>

                    {{-- Botão "Criar Nova Anotação" --}}
                    <div class="flex-shrink-0 w-full md:w-auto mt-6 md:mt-0">
                        <a href="{{ route('notes.create') }}" class="w-full md:w-auto inline-flex items-center justify-center px-6 py-3 bg-pink-500 hover:bg-pink-600 border-2 border-pink-500 text-white rounded-full font-bold uppercase tracking-wider transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                            <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            Criar Nova Anotação
                        </a>
                    </div>
                </div>

                <div class="mt-8">
                    @if ($notes->total() === 0) {{-- CORRIGIDO AQUI: Usando total() no paginator --}}
                    <div class="p-8 text-center bg-gray-700 rounded-2xl shadow-md-light">
                        <p class="text-xl text-gray-300 mb-4">Você ainda não tem nenhuma anotação. 📝</p>
                        <p class="text-md text-gray-400">Comece a organizar suas ideias agora!</p>
                    </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($notes as $note)
                                <div class="group p-6 rounded-2xl bg-gray-800 shadow-md-light hover:bg-gray-700 transition duration-300 transform hover:-translate-y-1 flex flex-col justify-between h-full">
                                    <div>
                                        <a href="{{ route('notes.show', $note->id) }}" class="block">
                                            <h4 class="text-2xl font-bold text-white mb-2 group-hover:text-pink-400 transition duration-300 font-poppins">{{ $note->title }}</h4>
                                            @if ($note->category)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-600 text-white mb-2">
                                                    {{ $note->category }}
                                                </span>
                                            @endif
                                            @if ($note->is_important)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-500 text-white ml-2 mb-2">
                                                    Importante ✨
                                                </span>
                                            @endif
                                            <p class="text-sm text-gray-400 mt-2 line-clamp-3">{{ $note->content }}</p>
                                        </a>
                                    </div>

                                    {{-- Botões de ação no rodapé do card --}}
                                    <div class="mt-4 flex justify-end items-center space-x-2">
                                        <a href="{{ route('notes.show', $note->id) }}" class="p-2 bg-gray-600 text-gray-300 rounded-full hover:bg-gray-500 hover:text-white transition duration-200" title="Ver Anotação">
                                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                        </a>
                                        <a href="{{ route('notes.edit', $note->id) }}" class="p-2 bg-gray-600 text-blue-400 rounded-full hover:bg-gray-500 hover:text-blue-300 transition duration-200" title="Editar Anotação">
                                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                        </a>
                                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta anotação?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 bg-gray-600 text-red-400 rounded-full hover:bg-gray-500 hover:text-red-300 transition duration-200" title="Excluir Anotação">
                                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Links de Paginação --}}
                        <div class="mt-8">
                            {{ $notes->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>