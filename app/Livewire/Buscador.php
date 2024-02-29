<?php

namespace App\Livewire;

use App\Models\Vuelo;
use Livewire\Component;

class Buscador extends Component
{
    public $buscador = '';

    public function render()
    {
        $vuelos = $this->search();

        return view('livewire.buscador', ['vuelos' => $vuelos]);
    }

    public function search()
    {
        return Vuelo::where('codigo', 'ilike', '%' . $this->buscador . '%')->paginate(2);
    }
}
