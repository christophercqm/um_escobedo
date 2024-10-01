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
        Schema::create('cuerpo_tecnicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');     // Para almacenar los nombres del miembro
            $table->string('apellidos');   // Para almacenar los apellidos
            $table->string('rol');         // Rol dentro del cuerpo técnico (ej: entrenador, asistente)
            $table->string('estado');      // Estado (ej: activo, inactivo)
            $table->string('foto')->nullable();  // URL de la foto (campo opcional, puede ser nulo)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuerpo_tecnicos');
    }
};
