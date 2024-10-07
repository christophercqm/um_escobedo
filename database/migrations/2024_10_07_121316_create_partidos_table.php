<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipo_local_id')->constrained('equipos')->onDelete('cascade');
            $table->foreignId('equipo_visitante_id')->constrained('equipos')->onDelete('cascade');
            $table->dateTime('fecha_hora');
            $table->integer('resultado_local')->nullable();
            $table->integer('resultado_visitante')->nullable();
            $table->string('estado')->default('programado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('partidos');
    }
};
