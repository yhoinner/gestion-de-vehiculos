<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->decimal('adblue_salida', 5, 2)
                ->nullable()
                ->after('combustible_salida');

            $table->decimal('adblue_regreso', 5, 2)
                ->nullable()
                ->after('combustible_llegada');
        });
    }

    public function down(): void
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->dropColumn([
                'adblue_salida',
                'adblue_regreso',
            ]);
        });
    }
};