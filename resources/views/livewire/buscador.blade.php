<div>
    <input wire:model.debounce.100ms="buscador" wire:keyup="search" type="text" placeholder="Buscar vuelos por código">

    @if ($vuelos->count() > 0)
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6">
                        Código
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Plazas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Plazas disponibles
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aeropuerto de origen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aeropuerto de destino
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Compañía aérea
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de salida
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de llegada
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Reservar
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vuelos as $vuelo)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $vuelo->codigo }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $vuelo->precio }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $vuelo->plazas }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $vuelo->plazasDisponibles() }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $vuelo->aeropuertoOrigen->nombre }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $vuelo->aeropuertoDestino->nombre }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $vuelo->companiaAerea->nombre }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $vuelo->fecha_salida }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $vuelo->fecha_llegada }}
                        </th>
                        <th>
                            @if ($vuelo->plazasDisponibles() > 0)
                                <form method="POST" action="{{ route('reservas.create', ['vuelo' => $vuelo]) }}"
                                    class="flex justify-center mt-4 mb-4">
                                    @csrf
                                    <input type="hidden" name="vuelo_id" value="{{ $vuelo->id }}">
                                    <x-primary-button class="bg-green-500">Reservar</x-primary-button>
                                </form>
                            @endif
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $vuelos->links() }}
    @else
        <p>No se encontraron resultados</p>
    @endif
</div>
