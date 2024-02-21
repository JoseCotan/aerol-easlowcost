<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 6)->unique();
            $table->decimal('precio', 6, 2);
            $table->integer('plazas');
            $table->foreignId('aeropuerto_origen')->constrained('aeropuertos');
            $table->foreignId('aeropuerto_destino')->constrained('aeropuertos');
            $table->foreignId('compania_aerea_id')->constrained();
            $table->dateTime('fecha_salida');
            $table->dateTime('fecha_llegada');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelos');
    }
};
