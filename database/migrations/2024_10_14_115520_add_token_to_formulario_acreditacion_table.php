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
            // Agregar la columna token
            $table->string('token')->unique()->nullable();
            // Agregar la columna expires_at para expirar el token
            $table->timestamp('expires_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('formulario_acreditacion', function (Blueprint $table) {
            // Eliminar las columnas en caso de rollback
            $table->dropColumn(['token', 'expires_at']);
        });
    }
};
