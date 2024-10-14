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
        Schema::table('formulario_acreditacion', function (Blueprint $table) {
            // Añadir la nueva columna 'carnet_federacion' después de 'tipo_acreditacion'
            $table->string('carnet_federacion')->nullable()->after('tipo_acreditacion');
        });
    }

    public function down()
    {
        Schema::table('formulario_acreditacion', function (Blueprint $table) {
            // Eliminar la columna 'carnet_federacion' si la migración se revierte
            $table->dropColumn('carnet_federacion');
        });
    }
};
