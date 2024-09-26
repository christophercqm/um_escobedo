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
        Schema::create('prensas', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('imagen'); // Ruta de la imagen
            $table->string('titulo'); // Título de la noticia
            $table->text('descripcion_breve'); // Descripción breve
            $table->longText('descripcion'); // Descripción completa
            $table->timestamp('fecha_creacion')->useCurrent(); // Fecha de creación por defecto
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prensas');
    }
};
