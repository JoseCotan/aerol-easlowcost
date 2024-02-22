<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6">
                        Usuario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Vuelo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Asiento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Destino y fecha de salida
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Origen y fecha de llegada
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $reserva->user->name }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $reserva->vuelo->codigo}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $reserva->asiento}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $reserva->vuelo->aeropuertoOrigen->nombre . " " . $reserva->vuelo->fecha_salida }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $reserva->vuelo->aeropuertoDestino->nombre . " " . $reserva->vuelo->fecha_llegada }}
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
