<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('vehiculos', 'tipo_proteccion')) {

            Schema::table('vehiculos', function (Blueprint $table) {

                $table->enum('tipo_proteccion', [
                    'Blindado',
                    'Convencional'
                ])
                ->default('Convencional')
                ->after('tipo_vehiculo');

            });

        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('vehiculos', 'tipo_proteccion')) {

            Schema::table('vehiculos', function (Blueprint $table) {

                $table->dropColumn('tipo_proteccion');

            });

        }
    }
};
