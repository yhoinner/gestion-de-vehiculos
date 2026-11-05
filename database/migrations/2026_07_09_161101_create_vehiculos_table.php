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
    Schema::create('vehiculos', function (Blueprint $table) {

        $table->id();

        // Información General
        $table->string('placa')->unique();
        $table->string('tipo_vehiculo');
        $table->boolean('blindado')->default(false);
        $table->string('nivel_blindaje')->nullable();

        $table->string('marca');
        $table->string('linea');
        $table->string('modelo');
        $table->year('anio');
        $table->string('color');

        // Datos técnicos
        $table->string('vin')->nullable();
        $table->string('motor')->nullable();
        $table->string('cilindraje');
        $table->string('combustible');
        $table->string('transmision')->nullable();

        // Estado
        $table->string('estado')->default('Disponible');

        // Compra
        $table->date('fecha_compra')->nullable();
        $table->decimal('valor_compra',15,2)->nullable();

        // Archivos
        $table->string('foto')->nullable();
        $table->string('tarjeta_propiedad')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};