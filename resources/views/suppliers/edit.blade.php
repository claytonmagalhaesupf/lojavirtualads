<x-app-layout>

    <form class="w-full max-w-md mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow" action="{{ url('suppliers/update') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $supplier['id'] }}">

        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" name="name" type="text" class="block mt-1 w-full" :value="old('name', $supplier['name'])" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="block mt-1 w-full" :value="old('email', $supplier['email'])" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="phone" :value="__('Telefone')" />
            <x-text-input id="phone" name="phone" type="text" class="block mt-1 w-full" :value="old('phone', $supplier['phone'])" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="address" :value="__('Endereço')" />
            <x-text-input id="address" name="address" type="text" class="block mt-1 w-full" :value="old('address', $supplier['address'])" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
        </div>
    </form>
</x-app-layout>
