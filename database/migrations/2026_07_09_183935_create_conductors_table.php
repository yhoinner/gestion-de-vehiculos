<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conductors', function (Blueprint $table) {

            $table->id();

            $table->string('cedula')->unique();
            $table->string('nombre');
            $table->string('apellido');

            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();

            $table->string('licencia');
            $table->date('vence_licencia');

            $table->string('cargo')->nullable();

            $table->enum('estado',[
                'Activo',
                'Inactivo',
                'Suspendido'
            ])->default('Activo');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conductors');
    }
};
