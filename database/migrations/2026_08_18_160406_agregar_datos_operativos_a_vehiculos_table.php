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
        Schema::table('vehiculos', function (Blueprint $table) {

            // Tipo de protección
            $table->string('tipo_proteccion')
                ->default('Convencional')
                ->after('tipo_vehiculo');

            // Nivel de blindaje
            // Solo se utilizará cuando el vehículo sea blindado
            $table->string('nivel_blindaje')
                ->nullable()
                ->change();

            // Clase de servicio
            // Misional / Administrativo
            $table->string('clase_servicio')
                ->nullable()
                ->after('nivel_blindaje');

            // AdBlue
            $table->boolean('tiene_adblue')
                ->default(false)
                ->after('transmision');

            $table->decimal('nivel_adblue', 5, 2)
                ->nullable()
                ->after('tiene_adblue');

            // Kit de carretera
            $table->boolean('kit_carretera')
                ->default(false)
                ->after('nivel_adblue');

            // Fecha de vencimiento del extintor
            $table->date('fecha_vencimiento_extintor')
                ->nullable()
                ->after('kit_carretera');

            // Regional actual
            // Ejemplo: Neiva / Ibagué
            $table->string('regional')
                ->default('Neiva')
                ->after('estado');

            // Fecha desde la cual el vehículo pertenece a la regional
            $table->date('fecha_llegada_regional')
                ->nullable()
                ->after('regional');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehiculos', function (Blueprint $table) {

            $table->dropColumn([
                'tipo_proteccion',
                'clase_servicio',
                'tiene_adblue',
                'nivel_adblue',
                'kit_carretera',
                'fecha_vencimiento_extintor',
                'regional',
                'fecha_llegada_regional',
            ]);
        });
    }
};