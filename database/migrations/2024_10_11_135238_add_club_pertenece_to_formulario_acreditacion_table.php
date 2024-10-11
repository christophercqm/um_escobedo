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
            $table->string('club_pertenece')->nullable()->after('dni'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formulario_acreditacion', function (Blueprint $table) {
            $table->dropColumn('club_pertenece'); // Eliminar el campo en la reversión
        });
    }
};
