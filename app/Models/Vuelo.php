<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function aeropuerto()
    {
        return $this->belongsTo(Aeropuerto::class);
    }

    public function companiaAerea()
    {
        return $this->belongsTo(CompaniaAerea::class);
    }

    public function aeropuertoDestino()
    {
        return $this->belongsTo(Aeropuerto::class, 'aeropuerto_destino');
    }

    public function aeropuertoOrigen()
    {
        return $this->belongsTo(Aeropuerto::class, 'aeropuerto_origen');
    }

    public function plazasTotales()
    {
        return $this->plazas;
    }

    public function plazasDisponibles()
    {
        return $this->plazas - $this->reservas->count();
    }
}
