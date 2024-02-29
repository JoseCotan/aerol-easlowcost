<x-app-layout>
    <livewire:buscador/>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <form action="{{ route('vuelos.create') }}" class="flex justify-center mt-4 mb-4">
            <x-primary-button class="bg-green-500">Insertar un nuevo vuelo</x-primary-button>
        </form>
    </div>
</x-app-layout>
