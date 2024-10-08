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
            // Agregar el campo partido_id como clave foránea
            $table->foreignId('partido_id')->nullable()->constrained('partidos')->onDelete('set null');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('formulario_acreditacion', function (Blueprint $table) {
            // Eliminar el campo en caso de rollback
            $table->dropForeign(['partido_id']);
            $table->dropColumn('partido_id');
        });
    }
};
