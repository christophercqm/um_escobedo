<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    protected $table = 'ultimos_partidos';

    public function up()
    {
        Schema::create('ultimos_partidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('partido_id')->constrained('partidos')->onDelete('cascade'); // Relacionar con la tabla partidos
            $table->string('puntuacion_local')->nullable(); // Puntuación del equipo local
            $table->string('puntuacion_visitante')->nullable(); // Puntuación del equipo visitante
            $table->string('estadio')->nullable(); // Nombre del estadio
            $table->string('estado_partido')->nullable(); // Estado del partido (ej: finalizado, en progreso)
            $table->timestamps(); // Timestamps automáticos (created_at y updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('ultimos_partidos');
    }
};
