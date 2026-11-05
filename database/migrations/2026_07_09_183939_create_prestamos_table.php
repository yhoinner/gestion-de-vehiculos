<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestamos', function (Blueprint $table) {

            $table->id();

            $table->foreignId('vehiculo_id')->constrained()->cascadeOnDelete();

            $table->foreignId('conductor_id')->constrained('conductors')->cascadeOnDelete();

            $table->string('dependencia');

            $table->string('destino');

            $table->date('fecha_salida');

            $table->time('hora_salida');

            $table->date('fecha_regreso')->nullable();

            $table->time('hora_regreso')->nullable();

            $table->integer('km_salida');

            $table->integer('km_llegada')->nullable();

            $table->string('combustible_salida');

            $table->string('combustible_llegada')->nullable();

            $table->string('motivo');

            $table->text('observaciones')->nullable();

            $table->enum('estado', [
                'Activo',
                'Finalizado'
            ])->default('Activo');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};