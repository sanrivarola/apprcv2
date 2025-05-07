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
        Schema::create('subarea_inventario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_inventario_id')->constrained('area_inventario')->onDelete('cascade');
            $table->string('nombre');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subarea_inventario');
    }
};
