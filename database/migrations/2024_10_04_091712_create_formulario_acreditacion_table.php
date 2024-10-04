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
        Schema::create('formulario_acreditacion', function (Blueprint $table) {
            $table->id(); // ID automático
            $table->string('nombre'); // Nombre
            $table->string('apellido'); // Apellido
            $table->string('dni')->unique(); // DNI, debe ser único
            $table->string('correo'); // Correo electrónico (no único)
            $table->string('telefono'); // Teléfono
            $table->text('asunto'); // Mensaje
            $table->string('archivo')->nullable(); // Campo para adjuntar archivo (nombre o ruta)
            $table->string('equipo_pertenece'); // Equipo al que pertenece
            $table->string('tipo_acreditacion'); // Nuevo campo para almacenar el tipo de acreditación
            $table->timestamps(); // Tiempos de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('formulario_acreditacion');
    }
};
