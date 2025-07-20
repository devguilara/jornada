<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Galeria de Inspiração') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-gray-200 font-sans min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-3xl shadow-xl p-8">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8">
                    <div>
                        <h3 class="text-4xl font-extrabold tracking-tight text-white font-poppins mb-2">Galeria de Inspiração</h3>
                        <p class="mt-2 text-sm text-gray-400">
                            Salve e organize suas fotos de inspiração para o casamento.
                        </p>
                    </div>

                    {{-- Botão "Adicionar Imagem" --}}
                    <div class="flex-shrink-0 w-full md:w-auto mt-6 md:mt-0">
                        <a href="{{ route('gallery.create') }}" class="w-full md:w-auto inline-flex items-center justify-center px-6 py-3 bg-pink-500 hover:bg-pink-600 border-2 border-pink-500 text-white rounded-full font-bold uppercase tracking-wider transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                            <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-4 2 2 4-4 4 4v2z" clip-rule="evenodd"></path>
                            </svg>
                            Adicionar Imagem
                        </a>
                    </div>
                </div>

                <div class="mt-8">
                    @if ($images->isEmpty())
                        <div class="p-8 text-center bg-gray-700 rounded-2xl shadow-md-light">
                            <p class="text-xl text-gray-300 mb-4">Sua galeria está vazia. 📸</p>
                            <p class="text-md text-gray-400">Comece a adicionar suas fotos de inspiração agora!</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach ($images as $image)
                                <div class="relative group rounded-lg overflow-hidden shadow-md-light hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                    <img src="{{ asset('storage/' . str_replace('/storage/', '', $image->filepath)) }}" alt="{{ $image->title }}" class="w-full h-48 object-cover object-center rounded-lg transition-transform duration-300 group-hover:scale-105">
                                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg">
                                        <span class="text-white text-lg font-semibold text-center px-2">{{ $image->title }}</span>
                                    </div>
                                    {{-- Botões de ação sobre a imagem (ver, editar, excluir) --}}
                                    <div class="absolute top-2 right-2 flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <a href="{{ route('gallery.show', $image) }}" class="p-2 bg-gray-700 text-gray-300 rounded-full hover:bg-gray-600 hover:text-white transition duration-200" title="Ver Imagem">
                                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                        </a>
                                        <a href="{{ route('gallery.edit', $image) }}" class="p-2 bg-gray-700 text-blue-400 rounded-full hover:bg-gray-600 hover:text-blue-300 transition duration-200" title="Editar Imagem">
                                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                        </a>
                                        <form action="{{ route('gallery.destroy', $image) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta imagem?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 bg-gray-700 text-red-400 rounded-full hover:bg-gray-600 hover:text-red-300 transition duration-200" title="Excluir Imagem">
                                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
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
</x-app-layout>