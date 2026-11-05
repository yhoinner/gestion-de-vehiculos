<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('documentos', function (Blueprint $table) {
            $table->boolean('tiene_documento')->nullable()->after('tipo');
            $table->string('aseguradora', 150)->nullable()->after('tiene_documento');
            $table->string('numero_poliza', 100)->nullable()->after('aseguradora');
            $table->string('centro_diagnostico', 150)->nullable()->after('numero_poliza');
            $table->string('numero_certificado', 100)->nullable()->after('centro_diagnostico');
        });
    }

    public function down(): void
    {
        Schema::table('documentos', function (Blueprint $table) {
            $table->dropColumn([
                'tiene_documento',
                'aseguradora',
                'numero_poliza',
                'centro_diagnostico',
                'numero_certificado',
            ]);
        });
    }
};