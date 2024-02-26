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
                <x-input-label for="aeropuerto_origen" :value="'Aeropuerto de origen'" />
                <select id="aeropuerto_origen"
                class="border-grai-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                name="aeropuerto_origen" required>
                @foreach ($aeropuertos as $aeropuerto)
                    <option value="{{ $aeropuerto->id }}" {{ old('aeropuerto_origen') == $aeropuerto->id ? 'selected' : '' }}>
                        {{ $aeropuerto->nombre }}
                    </option>
                @endforeach
            </select>
            </div>
            <div>
                <x-input-label for="aeropuerto_destino" :value="'Aeropuerto de destino'" />
                <select id="aeropuerto_destino"
                class="border-grai-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                name="aeropuerto_destino" required>
                @foreach ($aeropuertos as $aeropuerto)
                    <option value="{{ $aeropuerto->id }}" {{ old('aeropuerto_destino') == $aeropuerto->id ? 'selected' : '' }}>
                        {{ $aeropuerto->nombre }}
                    </option>
                @endforeach
            </select>
            <div>
                <x-input-label for="compania_aerea_id" :value="'Compañía aérea'" />
                <select id="compania_aerea_id"
                class="border-grai-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                name="compania_aerea_id" required>
                @foreach ($companias as $compania)
                    <option value="{{ $compania->id }}" {{ old('compania_aerea_id') == $compania->id ? 'selected' : '' }}>
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
