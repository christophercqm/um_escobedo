<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyJugadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jugadores', function (Blueprint $table) {
            // Permitir que algunos campos sean opcionales (NULLABLE)
            $table->date('fecha_nacimiento')->nullable()->change();
            $table->decimal('altura', 5, 2)->nullable()->change();
            $table->decimal('peso', 5, 2)->nullable()->change();
            $table->string('equipo')->nullable()->change();
            $table->string('nacionalidad')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jugadores', function (Blueprint $table) {
            // Revertir los cambios si es necesario
            $table->date('fecha_nacimiento')->nullable(false)->change();
            $table->decimal('altura', 5, 2)->nullable(false)->change();
            $table->decimal('peso', 5, 2)->nullable(false)->change();
            $table->string('equipo')->nullable(false)->change();
            $table->string('nacionalidad')->nullable(false)->change();
        });
    }
}
