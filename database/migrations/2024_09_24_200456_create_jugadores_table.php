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
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del jugador
            $table->string('apellido'); // Apellido del jugador
            $table->date('fecha_nacimiento'); // Fecha de nacimiento
            $table->decimal('altura', 5, 2); // Altura en metros (1.80)
            $table->string('posicion'); // Posición (puedes usar ENUM si lo prefieres)
            $table->integer('numero_camiseta'); // Número de la camiseta
            $table->decimal('peso', 5, 2); // Peso en kilogramos
            $table->string('equipo'); // Equipo actual
            $table->string('nacionalidad'); // Nacionalidad
            $table->string('estado'); // Estado del jugador: 'Activo', 'Inactivo'
            $table->string('foto_url')->nullable(); // URL de la foto del jugador
            $table->timestamps(); // Campos para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jugadores');
    }
};
