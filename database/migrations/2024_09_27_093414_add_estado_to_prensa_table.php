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
        Schema::table('prensas', function (Blueprint $table) {
            // Agregar el campo 'estado' como booleano, con valor predeterminado en true
            $table->boolean('estado')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prensas', function (Blueprint $table) {
            // Eliminar el campo 'estado' si es necesario
            $table->dropColumn('estado');
        });
    }
};
