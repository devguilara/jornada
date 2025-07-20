<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Imagem da Galeria') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-gray-200 font-sans min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-3xl shadow-xl p-8">
                <div class="mb-8">
                    <h3 class="text-4xl font-extrabold tracking-tight text-white font-poppins">Editar Imagem</h3>
                    <p class="mt-2 text-sm text-gray-400">Altere os detalhes da sua imagem de inspiração.</p>
                </div>

                <form method="POST" action="{{ route('gallery.update', $image->id) }}" class="mt-6 p-6 bg-gray-800 rounded-2xl shadow-inner-xl-dark">
                    @csrf
                    @method('PUT') {{-- Importante para o método UPDATE --}}

                    <!-- Título da Imagem -->
                    <div>
                        <x-input-label for="title" :value="__('Título da Imagem')" class="text-gray-400" />
                        <input id="title" class="block mt-1 w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800" type="text" name="title" value="{{ old('title', $image->title) }}" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Descrição (Opcional) -->
                    <div class="mt-6">
                        <x-input-label for="description" :value="__('Descrição (Opcional)')" class="text-gray-400" />
                        <textarea id="description" class="block mt-1 w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800" name="description">{{ old('description', $image->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Categoria (Opcional) -->
                    <div class="mt-6">
                        <x-input-label for="category" :value="__('Categoria (Ex: Decoração, Vestido, Local)')" class="text-gray-400" />
                        <input id="category" class="block mt-1 w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800" type="text" name="category" value="{{ old('category', $image->category) }}" />
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    {{-- A imagem atual pode ser exibida aqui, mas o campo de upload foi removido --}}
                    <div class="mt-6">
                        <x-input-label :value="__('Imagem Atual')" class="text-gray-400 mb-2" />
                        <img src="{{ asset($image->filepath) }}" alt="{{ $image->title }}" class="w-48 h-auto rounded-lg shadow-md-light border border-gray-700">
                    </div>

                    <div class="flex items-center justify-end mt-8">
                        <a href="{{ route('gallery.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-700 border border-gray-600 rounded-full font-bold text-sm text-gray-300 uppercase tracking-wider shadow-md-light hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition ease-in-out duration-150 transform hover:scale-105">
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
</x-app-layout>