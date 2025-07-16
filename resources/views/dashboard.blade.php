<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900 text-gray-200 font-sans min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-3xl shadow-xl p-8">
                <div class="text-center mb-10">
                    <h3 class="text-4xl font-extrabold tracking-tight text-white font-poppins mb-3">Bem-vindo(a) ao seu Planejador de Casamento!</h3>
                    <p class="text-lg text-gray-400">Tudo que você precisa para tornar seu grande dia inesquecível. ✨</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    {{-- Card: Playlists Musicais (Ativo) --}}
                    <a href="{{ route('playlists.index') }}" class="block p-6 bg-gray-800 border border-gray-700 rounded-2xl shadow-md-light hover:bg-gray-700 transition duration-300 ease-in-out transform hover:-translate-y-1 group">
                        <div class="flex items-center justify-center mb-4">
                            {{-- Ícone de nota musical mais simples e comum --}}
                            <svg class="h-12 w-12 text-pink-500 group-hover:text-pink-400 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-8z"/>
                            </svg>
                        </div>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-white group-hover:text-pink-400 transition-colors duration-300 font-poppins">Playlists Musicais</h5>
                        <p class="font-normal text-gray-400">Organize as músicas para cada etapa do casamento. Crie listas para a cerimônia, coquetel e festa.</p>
                    </a>

                    {{-- Card: Galeria de Inspiração (Em Breve) --}}
                    <div class="p-6 bg-gray-800 border border-gray-700 rounded-2xl shadow-md-light cursor-not-allowed opacity-60">
                        <div class="flex items-center justify-center mb-4">
                            <svg class="h-12 w-12 text-blue-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-4 2 2 4-4 4 4v2z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-300 font-poppins">Galeria de Inspiração</h5>
                        <p class="font-normal text-gray-500">Salve fotos de inspiração, filtre por cores, decorações, roupas e muito mais.</p>
                        <span class="text-sm text-blue-300 mt-3 block font-bold animate-pulse">Em breve...</span>
                    </div>

                    {{-- Card: Área de Anotações (Em Breve) --}}
                    <div class="p-6 bg-gray-800 border border-gray-700 rounded-2xl shadow-md-light cursor-not-allowed opacity-60">
                        <div class="flex items-center justify-center mb-4">
                            <svg class="h-12 w-12 text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm12 2H4v8h12V6zm-2 2h-2v2h2V8zm-2 0h-2v2h2V8zm-2 0h-2v2h2V8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-300 font-poppins">Área de Anotações</h5>
                        <p class="font-normal text-gray-500">Mantenha todas as suas anotações sobre fornecedores, orçamentos e cronogramas em um só lugar.</p>
                        <span class="text-sm text-green-300 mt-3 block font-bold animate-pulse">Em breve...</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>