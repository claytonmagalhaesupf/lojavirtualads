<x-app-layout>

    <form class="w-full max-w-md mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow" action="{{ url('suppliers/new') }}" method="POST">
        @csrf

        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Cadastrar Fornecedor</h1>

        @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
            {{ $error }}
            @endforeach
        </div>
        @endif

        <label class="block mb-1 text-gray-700 dark:text-gray-300">Nome:</label>
        <input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" required name="name" type="text" />

        <label class="block mb-1 text-gray-700 dark:text-gray-300">Email:</label>
        <input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="email" type="email" />

        <label class="block mb-1 text-gray-700 dark:text-gray-300">Telefone:</label>
        <input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="phone" type="text" />

        <label class="block mb-1 text-gray-700 dark:text-gray-300">Endereço:</label>
        <input class="w-full p-2 mb-4 rounded border dark:bg-gray-700 dark:text-white" name="address" type="text" />

        <input class="w-full p-2 rounded bg-blue-600 text-white" type="submit" value="Salvar" />
    </form>

</x-app-layout>
<x-app-layout>

    <form>

        <x-toast type="success" message="Operação realizada com sucesso!" />

        <x-toast type="error" message="Erro ao salvar os dados." />

        <x-toast type="warning" message="Atenção: revise as informações." />

        <x-input-label for="name" :value="'Nome do fornecedor'" />

        <x-text-input id="name" class="block mt-1 w-full"
            type="text" name="name" :value="old('name')"
            required autofocus />

        <x-primary-button class="mt-4">
            Salvar
        </x-primary-button>
    </form>
</x-app-layout>