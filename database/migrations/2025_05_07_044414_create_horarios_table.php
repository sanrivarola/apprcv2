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
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id_horario');               // clave primaria autoincremental
            $table->date('dia')->nullable();                // fecha del turno
            $table->string('horarioentrada', 100);          // hora de entrada
            $table->string('horariosalida', 100)->nullable();// hora de salida
            $table->string('ausente', 10)->nullable();      // flag de ausencia

            // Relación al usuario que registra el horario
            $table->unsignedBigInteger('user_id')->nullable()->comment('Usuario que creó el registro');
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('set null');

            $table->timestamps();                           // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('horarios', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('horarios');
    }
};
