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
        Schema::create('junta', function (Blueprint $table) {
            $table->id(); // ID de la junta
            $table->string('nombre'); // Nombre del miembro de la junta
            $table->string('cargo'); // Cargo o rol dentro de la junta
            $table->string('foto_url')->nullable(); // Foto del miembro de la junta
            $table->string('estado')->default('Activo'); // Estado (Activo/Inactivo)
            $table->timestamps(); // Timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('junta');
    }
};
