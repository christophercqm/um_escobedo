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
            $table->string('categoria')->default('cronicas'); // Usar string en lugar de enum
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prensas', function (Blueprint $table) {
            $table->dropColumn('categoria');
        });
    }
};
