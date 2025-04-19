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
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('fecha_reserva');
            $table->string('nombre', length: 100);
            $table->string('descripcion', length: 250);
            $table->string('url_reunion', length: 250);
            $table->integer('id_usuario_cliente');
            $table->integer('id_usuario_profesional');
            $table->boolean('estado');
            $table->bigInteger('id_cliente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservaciones');
    }
};
