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
        Schema::table('formulario_acreditacion', function (Blueprint $table) {
            // Agregar la columna como nullable para que sea opcional
            $table->string('medio_al_que_pertenece')->nullable()->after('tipo_acreditacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formulario_acreditacion', function (Blueprint $table) {
            // Eliminar la columna en caso de que necesitemos revertir la migración
            $table->dropColumn('medio_al_que_pertenece');
        });
    }
};
