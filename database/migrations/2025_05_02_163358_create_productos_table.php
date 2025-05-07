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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subarea_inventario_id')->constrained('subarea_inventario')->onDelete('cascade');
            $table->string('nombre');
            $table->text('detalle')->nullable();
            $table->date('vencimiento')->nullable();
            $table->integer('stock_minimo')->default(0);
            $table->integer('stock')->default(0);
            $table->date('fecha_carga');
            $table->date('fecha_modificado')->nullable();
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
