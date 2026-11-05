<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mantenimientos', function (Blueprint $table) {

            $table->id();

            $table->foreignId('vehiculo_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('tipo', 100);

            $table->date('fecha');

            $table->string('taller', 150);

            $table->decimal('costo', 12, 2);

            $table->integer('kilometraje');

            $table->text('descripcion')->nullable();

            $table->date('proximo_mantenimiento')->nullable();

            $table->string('factura')->nullable();

            $table->string('tecnico')->nullable();

            $table->enum('estado', [
                'Pendiente',
                'En proceso',
                'Finalizado'
            ])->default('Pendiente');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};