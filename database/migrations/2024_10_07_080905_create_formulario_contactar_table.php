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
        Schema::create('formulario_contactar', function (Blueprint $table) {
            $table->id();
            $table->string('tipo')->default('contactar'); // Campo 'tipo' por defecto 'contactar'
            $table->string('nombre');
            $table->string('apellidos')->nullable();
            $table->string('email');
            $table->string('telefono')->nullable();
            $table->text('mensaje')->nullable();
            $table->boolean('privacidad_aceptada')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulario_contactar');
    }
};
