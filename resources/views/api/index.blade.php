<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('API Tokens') }}
        </h2>
    </x-slot>

    <div>
        <div class="w-screen">
            @livewire('api.api-token-manager')
        </div>
    </div>
</x-app-layout>
