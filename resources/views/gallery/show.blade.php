<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes da Imagem') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-gray-200 font-sans min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-3xl shadow-xl p-8">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8">
                    <div>
                        <h3 class="text-4xl font-extrabold tracking-tight text-white font-poppins mb-2">{{ $image->title }}</h3>
                        <p class="mt-2 text-sm text-gray-400">
                            Detalhes da sua imagem de inspiração.
                        </p>
                    </div>

                    {{-- Botões de Ação na parte superior --}}
                    <div class="flex-shrink-0 w-full md:w-auto mt-6 md:mt-0 flex justify-end space-x-4">
                        <a href="{{ route('gallery.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-700 border border-gray-600 rounded-full font-bold text-sm text-gray-300 uppercase tracking-wider shadow-md-light hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition ease-in-out duration-150 transform hover:scale-105">
                            {{ __('Voltar para a Galeria') }}
                        </a>
                        <a href="{{ route('gallery.edit', $image->id) }}" class="inline-flex items-center px-6 py-3 bg-blue-500 hover:bg-blue-600 border-2 border-blue-500 text-white rounded-full font-bold uppercase tracking-wider transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                            {{ __('Editar Imagem') }}
                        </a>
                        <form action="{{ route('gallery.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta imagem?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-red-500 hover:bg-red-600 border-2 border-red-500 text-white rounded-full font-bold uppercase tracking-wider transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                                {{ __('Excluir Imagem') }}
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- Imagem em Destaque --}}
                    <div class="relative rounded-lg overflow-hidden shadow-xl">
                        <img src="{{ asset($image->filepath) }}" alt="{{ $image->title }}" class="w-full h-auto object-cover object-center rounded-lg">
                    </div>

                    {{-- Detalhes da Imagem --}}
                    <div class="bg-gray-800 p-6 rounded-lg shadow-md-light">
                        <h4 class="text-2xl font-bold text-white font-poppins mb-4">Informações da Imagem</h4>
                        <div class="space-y-3">
                            <p class="text-lg text-gray-300"><strong>Título:</strong> {{ $image->title }}</p>
                            @if ($image->description)
                                <p class="text-lg text-gray-300"><strong>Descrição:</strong> {{ $image->description }}</p>
                            @endif
                            @if ($image->category)
                                <p class="text-lg text-gray-300"><strong>Categoria:</strong> {{ $image->category }}</p>
                            @endif
                            <p class="text-lg text-gray-300"><strong>Adicionada em:</strong> {{ $image->created_at->format('d/m/Y H:i') }}</p>
                            <p class="text-lg text-gray-300"><strong>Por:</strong> {{ $image->user->name }}</p> {{-- Exibe o nome do usuário --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>