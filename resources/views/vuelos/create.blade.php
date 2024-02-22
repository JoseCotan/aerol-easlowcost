<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('vuelos.store') }}">
            @csrf

            <!-- Nombre -->
            <div>
                <x-input-label for="codigo" :value="'Codigo'" />
                <x-text-input id="codigo" class="block mt-1 w-full"
                    type="text" name="codigo" :value="old('codigo')" required
                    autofocus autocomplete="codigo"/>
                <x-input-error :messages="$errors->get('codigo')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="plazas" :value="'Plazas'" />
                <x-text-input id="plazas" class="block mt-1 w-full"
                    type="text" name="plazas" :value="old('plazas')" required
                    autofocus autocomplete="plazas"/>
                <x-input-error :messages="$errors->get('plazas')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="precio" :value="'Precio'" />
                <x-text-input id="precio" class="block mt-1 w-full"
                    type="text" name="precio" :value="old('precio')" required
                    autofocus autocomplete="precio"/>
                <x-input-error :messages="$errors->get('precio')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="aeropuerto_origen" :value="'Origen'" />
                <x-text-input id="aeropuerto_origen" class="block mt-1 w-full"
                    type="text" name="aeropuerto_origen" :value="old('aeropuerto_origen')" required
                    autofocus autocomplete="aeropuerto_origen"/>
                <x-input-error :messages="$errors->get('aeropuerto_origen')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="aeropuerto_destino" :value="'Destino'" />
                <x-text-input id="aeropuerto_destino" class="block mt-1 w-full"
                    type="text" name="aeropuerto_destino" :value="old('aeropuerto_destino')" required
                    autofocus autocomplete="aeropuerto_destino"/>
                <x-input-error :messages="$errors->get('aeropuerto_destino')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="compania_aerea" :value="'Compañía aérea'" />
                <select id="compania_id"
                class="border-grai-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                name="compania_id" required>
                @foreach ($companias as $compania)
                    <option value="{{ $compania->id }}" {{ old('compania_id') == $compania->id ? 'selected' : '' }}>
                        {{ $compania->nombre }}
                    </option>
                @endforeach
            </select>
            </div>
            <div>
                <x-input-label for="fecha_salida" :value="'Salida'" />
                <x-text-input id="fecha_salida" class="block mt-1 w-full"
                    type="datetime-local" name="fecha_salida" :value="old('fecha_salida')" required
                    autofocus autocomplete="fecha_salida"/>
                <x-input-error :messages="$errors->get('fecha_salida')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="fecha_llegada" :value="'Llegada'" />
                <x-text-input id="fecha_llegada" class="block mt-1 w-full"
                    type="datetime-local" name="fecha_llegada" :value="old('fecha_llegada')" required
                    autofocus autocomplete="fecha_llegada"/>
                <x-input-error :messages="$errors->get('fecha_llegada')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('vuelos.index') }}">
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
