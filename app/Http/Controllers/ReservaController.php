<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Vuelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarioActual = Auth::user();
        $reservasUsuarioActual = $usuarioActual->reservas;
        return view('reservas.index', [
            'reservas' => $reservasUsuarioActual,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($vueloId)
    {
        $vuelo = Vuelo::findOrFail($vueloId);
        $asientosReservados = $vuelo->reservas()->pluck('asiento')->toArray();
        $asientosDisponibles = array_diff(range(1, $vuelo->plazas), $asientosReservados);
        return view('reservas.create')->with('vuelo', $vuelo)->with('asientosDisponibles', $asientosDisponibles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();

        $vuelo = Vuelo::find($datos['vuelo_id']);

        if ($vuelo->plazasDisponibles($datos['vuelo_id']) <= 0) {
            session()->flash('error', 'No hay plazas disponibles.');
            return redirect()->route('reservas.index');
        }

        $validated = $request->validate([
            'vuelo_id' => 'required|max:255',
            'asiento' => 'required|max:2',
        ]);

        $reserva = new Reserva();
        $reserva->user_id = Auth::user()->id;
        $reserva->vuelo_id = $validated['vuelo_id'];
        $reserva->asiento = $validated['asiento'];
        if ($vuelo->plazas < $validated['asiento']) {
            session()->flash('error', 'Asiento inexistente.');
            return redirect()->route('reservas.index');
        }
        $reserva->save();
        session()->flash('success', 'La reserva se ha creado correctamente.');
        return redirect()->route('reservas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        return view('reservas.show', [
            'reserva' => $reserva,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        //
    }
}
