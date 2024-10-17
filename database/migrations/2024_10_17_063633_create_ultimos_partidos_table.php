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
            $table->date('fecha');
            $table->string('puntuacion_local')->nullable();
            $table->string('puntuacion_visitante')->nullable();
            $table->string('estadio')->nullable();
            $table->string('estado_partido')->nullable();
            $table->foreignId('equipo_local_id')->constrained('equipos')->onDelete('cascade');
            $table->foreignId('equipo_visitante_id')->constrained('equipos')->onDelete('cascade');
            $table->foreignId('partido_id')->constrained('partidos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ultimos_partidos');
    }
};
