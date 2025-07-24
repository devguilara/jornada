<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes da Anotação') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-gray-200 font-sans min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-3xl shadow-xl p-8">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8">
                    <div>
                        <h3 class="text-4xl font-extrabold tracking-tight text-white font-poppins mb-2">{{ $notes->title }}</h3>
                        <p class="mt-2 text-sm text-gray-400">
                            Detalhes da sua anotação.
                        </p>
                    </div>

                    {{-- Botões de Ação na parte superior --}}
                    <div class="flex-shrink-0 w-full md:w-auto mt-6 md:mt-0 flex justify-end space-x-4">
                        <a href="{{ route('notes.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-700 border border-gray-600 rounded-full font-bold text-sm text-gray-300 uppercase tracking-wider shadow-md-light hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition ease-in-out duration-150 transform hover:scale-105">
                            {{ __('Voltar para Anotações') }}
                        </a>
                        <a href="{{ route('notes.edit', $notes->id) }}" class="inline-flex items-center px-6 py-3 bg-blue-500 hover:bg-blue-600 border-2 border-blue-500 text-white rounded-full font-bold uppercase tracking-wider transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                            {{ __('Editar Anotação') }}
                        </a>
                        <form action="{{ route('notes.destroy', $notes->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta anotação?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-red-500 hover:bg-red-600 border-2 border-red-500 text-white rounded-full font-bold uppercase tracking-wider transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                                {{ __('Excluir Anotação') }}
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mt-8 bg-gray-800 p-6 rounded-lg shadow-md-light">
                    <h4 class="text-2xl font-bold text-white font-poppins mb-4">Conteúdo da Anotação</h4>
                    <p class="text-lg text-gray-300 whitespace-pre-wrap">{{ $notes->content }}</p> {{-- whitespace-pre-wrap para quebras de linha --}}

                    <div class="mt-8 border-t border-gray-700 pt-6 space-y-3">
                        <h4 class="text-xl font-bold text-white font-poppins mb-2">Informações Adicionais</h4>
                        <p class="text-lg text-gray-300"><strong>Título:</strong> {{ $notes->title }}</p>
                        @if ($notes->category)
                            <p class="text-lg text-gray-300"><strong>Categoria:</strong> {{ $notes->category }}</p>
                        @endif
                        @if ($notes->supplier_name)
                            <p class="text-lg text-gray-300"><strong>Fornecedor/Contato:</strong> {{ $notes->supplier_name }}</p>
                        @endif
                        @if ($notes->value !== null) {{-- Verifica se o valor não é nulo --}}
                        <p class="text-lg text-gray-300"><strong>Valor/Custo:</strong> R$ {{ number_format($notes->value, 2, ',', '.') }}</p>
                        @endif
                        <p class="text-lg text-gray-300"><strong>Importante:</strong> {{ $notes->is_important ? 'Sim ✨' : 'Não' }}</p>
                        <p class="text-lg text-gray-300"><strong>Criada em:</strong> {{ $notes->created_at->format('d/m/Y H:i') }}</p>
                        <p class="text-lg text-gray-300"><strong>Última atualização:</strong> {{ $notes->updated_at->format('d/m/Y H:i') }}</p>
                        <p class="text-lg text-gray-300"><strong>Por:</strong> {{ $notes->user->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
