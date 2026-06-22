<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="text-xl font-semibold text-gray-900">LOJA</div>
                <form method="GET" action="{{ route('home') }}" class="flex items-center bg-gray-100 rounded-md overflow-hidden">
                    <input name="q" type="search" placeholder="Buscar produtos" value="{{ request('q') }}" class="px-3 py-1.5 w-56 bg-transparent focus:outline-none text-sm text-gray-700" />
                    <button type="submit" class="px-3 text-gray-600">🔍</button>
                </form>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('home') }}" class="text-sm text-gray-600">Entrar ou cadastre-se</a>
            </div>
        </div>
    </x-slot>

    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-gray-800">
                        <div class="flex items-start justify-between mb-6">
                            <div>
                                <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Produtos</h1>
                                <p class="mt-1 text-sm text-gray-500">{{ $products->count() }} produtos</p>
                            </div>

                            <div class="flex items-center space-x-3">
                                <form method="GET" action="{{ route('home') }}" class="flex items-center space-x-2">
                                    <select name="type_id" class="rounded-md border-gray-300 text-sm px-2 py-1">
                                        <option value="">Todos os tipos</option>
                                        @foreach($types as $type)
                                        <option value="{{ $type->id }}" @selected($type->id == $selectedType)>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm text-gray-700">Filtrar</button>
                                </form>
                                <button class="px-4 py-2 bg-white border border-gray-300 rounded-md text-sm text-gray-700">FILTRAR E ORDENAR</button>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            @foreach($products as $product)
                            <div class="bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden shadow hover:shadow-md transition">
                                <div class="w-full h-56 bg-gray-50 flex items-center justify-center">
                                    @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-56 object-cover" />
                                    @else
                                    <div class="w-full h-56 bg-gray-100 flex items-center justify-center text-gray-500">Sem imagem</div>
                                    @endif
                                </div>

                                <div class="p-4">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white truncate">{{ $product->name }}</h3>
                                    <div class="mt-3 flex items-center justify-between">
                                        <div class="text-amber-500 font-semibold">R$ {{ number_format($product->price, 2, ',', '.') }}</div>
                                        <a href="#" class="text-sm text-gray-500">Ver</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>