<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('horarios', function (Blueprint $table) {
            // Convertimos horarioentrada en nullable()
            $table->string('horarioentrada', 100)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('horarios', function (Blueprint $table) {
            // Volvemos a hacerlo NOT NULL
            $table->string('horarioentrada', 100)->nullable(false)->change();
        });
    }
};
