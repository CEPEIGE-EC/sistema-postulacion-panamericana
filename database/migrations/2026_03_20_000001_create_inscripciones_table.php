<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('nombres');
            $table->date('fecha_nacimiento');
            $table->string('lugar_nacimiento');
            $table->string('cedula_pasaporte');
            $table->enum('sexo', ['M', 'F']);
            $table->string('estado_civil');
            $table->string('direccion');
            $table->string('ciudad')->nullable();
            $table->string('provincia')->nullable();
            $table->string('pais');
            $table->string('telefono_contacto');
            $table->string('telefono_alterno')->nullable();
            $table->string('correo_personal');
            $table->string('correo_institucional')->nullable();
            $table->boolean('declaracion_verdad')->default(false);
            $table->boolean('recibir_informacion')->default(false);
            $table->enum('estado', ['Pendiente', 'Aprobado', 'Rechazado'])->default('Pendiente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
