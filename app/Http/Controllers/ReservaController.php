<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reservas.index', [
            'reservas' => Reserva::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reservas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vuelo_id' => 'required|max:255',
            'asiento' => 'required|max:2',
        ]);

        $reserva = new Reserva();
        $reserva->user_id = Auth::user()->id;
        $reserva->vuelo_id = $validated['vuelo_id'];
        $reserva->asiento = $validated['asiento'];
        $reserva->save();
        session()->flash('success', 'La reserva se ha creado correctamente.');
        return redirect()->route('reservas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        //
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
