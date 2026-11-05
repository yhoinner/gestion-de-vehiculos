<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('conductors', function (Blueprint $table) {

            $table->string('tipo_contrato', 100)
                ->nullable()
                ->after('licencia');

            $table->string('sexo', 30)
                ->nullable()
                ->after('tipo_contrato');

            $table->string('regional', 100)
                ->nullable()
                ->after('sexo');

            $table->string('sede', 100)
                ->nullable()
                ->after('regional');

            $table->string('dependencia', 150)
                ->nullable()
                ->after('sede');

            $table->string('grupo_interno_trabajo', 150)
                ->nullable()
                ->after('dependencia');
        });
    }

    public function down(): void
    {
        Schema::table('conductors', function (Blueprint $table) {

            $table->dropColumn([
                'tipo_contrato',
                'sexo',
                'regional',
                'sede',
                'dependencia',
                'grupo_interno_trabajo'
            ]);

        });
    }
};