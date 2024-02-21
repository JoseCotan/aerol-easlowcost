<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('reservas.store') }}">
            @csrf

            <!-- Nombre -->
            <div>
                <x-input-label for="vuelo_id" :value="'Vuelo'" />
                <x-text-input id="vuelo_id" class="block mt-1 w-full"
                    type="text" name="vuelo_id" :value="old('vuelo_id')" required
                    autofocus autocomplete="vuelo_id"/>
                <x-input-error :messages="$errors->get('vuelo_id')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="asiento" :value="'Asiento de la reserva'" />
                <x-text-input id="asiento" class="block mt-1 w-full"
                    type="text" name="asiento" :value="old('asiento')" required
                    autofocus autocomplete="asiento" />
                <x-input-error :messages="$errors->get('asiento')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('reservas.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Insertar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
