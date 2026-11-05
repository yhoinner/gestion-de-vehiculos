<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mantenimientos', function (Blueprint $table) {

            $table->date('fecha_solicitud')
                ->nullable()
                ->after('vehiculo_id');

            $table->enum('aprobacion', [
                'Pendiente',
                'Aprobada',
                'No aprobada'
            ])
                ->default('Pendiente')
                ->after('tecnico');
        });
    }

    public function down(): void
    {
        Schema::table('mantenimientos', function (Blueprint $table) {

            $table->dropColumn([
                'fecha_solicitud',
                'aprobacion'
            ]);

        });
    }
};