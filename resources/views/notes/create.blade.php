<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Nova Anotação') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-gray-200 font-sans min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-3xl shadow-xl p-8">
                <div class="mb-8">
                    <h3 class="text-4xl font-extrabold tracking-tight text-white font-poppins">Criar Nova Anotação</h3>
                    <p class="mt-2 text-sm text-gray-400">Preencha os detalhes para a sua nova anotação.</p>
                </div>

                <form method="POST" action="{{ route('notes.store') }}" class="mt-6 p-6 bg-gray-800 rounded-2xl shadow-inner-xl-dark">
                    @csrf

                    <!-- Título da Anotação -->
                    <div>
                        <x-input-label for="title" :value="__('Título da Anotação')" class="text-gray-400" />
                        <input id="title" class="block mt-1 w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800" type="text" name="title" :value="old('title')" required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Conteúdo da Anotação -->
                    <div class="mt-6">
                        <x-input-label for="content" :value="__('Conteúdo da Anotação')" class="text-gray-400" />
                        <textarea id="content" class="block mt-1 w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800 h-32 resize-y" name="content" required>{{ old('content') }}</textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <!-- Categoria (Opcional) -->
                    <div class="mt-6">
                        <x-input-label for="category" :value="__('Categoria (Ex: Fornecedores, Orçamento, Checklist)')" class="text-gray-400" />
                        <input id="category" class="block mt-1 w-full rounded-md border-transparent bg-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800" type="text" name="category" :value="old('category')" />
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <!-- Marcar como Importante -->
                    <div class="mt-6">
                        <label for="is_important" class="inline-flex items-center">
                            <input id="is_important" type="checkbox" class="rounded border-gray-300 text-pink-500 shadow-sm focus:ring-pink-500" name="is_important" value="1" {{ old('is_important') ? 'checked' : '' }}>
                            <span class="ms-2 text-sm text-gray-400">{{ __('Marcar como importante') }}</span>
                        </label>
                        <x-input-error :messages="$errors->get('is_important')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-8">
                        <a href="{{ route('notes.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-700 border border-gray-600 rounded-full font-bold text-sm text-gray-300 uppercase tracking-wider shadow-md-light hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition ease-in-out duration-150 transform hover:scale-105">
                            {{ __('Cancelar') }}
                        </a>
                        <button type="submit" class="ms-4 inline-flex items-center px-6 py-3 bg-pink-500 hover:bg-pink-600 border-2 border-pink-500 text-white rounded-full font-bold uppercase tracking-wider transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                            {{ __('Salvar Anotação') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>