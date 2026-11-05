<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('documentos');

        Schema::create('documentos', function (Blueprint $table) {

            $table->id();

            $table->foreignId('vehiculo_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->enum('tipo', [
                'SOAT',
                'Tecnomecanica',
                'Tarjeta Propiedad',
                'Foto Vehiculo',
                'Otro'
            ]);

            $table->string('nombre_archivo');

            $table->string('ruta');

            $table->date('fecha_expedicion')->nullable();

            $table->date('fecha_vencimiento')->nullable();

            $table->text('observaciones')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
