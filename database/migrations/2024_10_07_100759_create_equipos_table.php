<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id(); // ID del equipo
            $table->string('nombre'); // Nombre del equipo
            $table->string('logo')->nullable(); // Ruta del logo del equipo, opcional
            $table->string('ciudad')->nullable(); // Ciudad de origen del equipo, opcional
            $table->string('pais')->nullable(); // País de origen del equipo, opcional
            $table->timestamps(); // Timestamps de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
