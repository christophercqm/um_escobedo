<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulariosContactoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formularios_contacto', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['contactar', 'acreditacion', 'patrocinadores']); // Tipo de formulario
            $table->string('nombre'); // Nombre del contacto (obligatorio solo en "contactar")
            $table->string('apellidos')->nullable(); // Apellidos pueden ser opcionales
            $table->string('empresa')->nullable(); // Empresa (solo para patrocinadores)
            $table->string('nombre_representante')->nullable(); // Nombre del representante (obligatorio en "patrocinadores")
            $table->string('telefono')->nullable(); // Teléfono puede ser opcional
            $table->string('email'); // Correo electrónico
            $table->text('mensaje')->nullable(); // Mensaje (solo para contactar, opcional)
            $table->string('asunto')->nullable(); // Asunto (solo para patrocinadores)
            $table->boolean('privacidad_aceptada')->default(0); // Aceptación de política de privacidad
            $table->timestamps(); // Created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formularios_contacto');
    }
}
