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
        Schema::create('traslados_vehiculos', function (Blueprint $table) {

            $table->id();

            $table->foreignId('vehiculo_id')
                ->constrained('vehiculos')
                ->cascadeOnDelete();

            $table->string('regional_origen');

            $table->string('regional_destino');

            $table->date('fecha_traslado');

            $table->text('motivo')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traslados_vehiculos');
    }
};
