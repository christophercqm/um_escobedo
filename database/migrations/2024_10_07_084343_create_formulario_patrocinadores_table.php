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
        Schema::create('formulario_patrocinadores', function (Blueprint $table) {
            $table->id();
            $table->string('empresa'); // Nombre de la empresa
            $table->string('nombre_representante'); // Nombre del representante
            $table->string('email'); // Correo electrónico
            $table->string('telefono'); // Teléfono
            $table->text('mensaje'); // Mensaje del patrocinador
            $table->boolean('privacidad_aceptada'); // Aceptación de la política de privacidad
            $table->timestamps(); // Campos de created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulario_patrocinadores');
    }
};
