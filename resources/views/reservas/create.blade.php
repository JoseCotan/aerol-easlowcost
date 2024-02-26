<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('reservas.store') }}">
            @csrf

            <!-- Nombre -->
            <div>
                <x-text-input id="vuelo_id" class="block mt-1 w-full"
                type="hidden" name="vuelo_id" :value="$vuelo->id" required
                autofocus autocomplete="vuelo_id"/>
                <x-input-error :messages="$errors->get('vuelo_id')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="asiento" :value="'Código del vuelo'" />
                <x-text-input id="codigo" class="block mt-1 w-full"
                type="text" name="codigo" :value="$vuelo->codigo" required
                autofocus autocomplete="codigo" readonly/>
                <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="asiento" :value="'Asiento de la reserva'" />
                <select id="asiento" class="block mt-1 w-full" name="asiento" required>
                    @foreach ($asientosDisponibles as $asiento)
                        <option value="{{ $asiento }}" {{ old('asiento') == $asiento ? 'selected' : '' }}>
                            {{ "Asiento número ". $asiento }}
                        </option>
                    @endforeach
                </select>
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
