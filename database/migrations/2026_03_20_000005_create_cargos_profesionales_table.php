<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cargos_profesionales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inscripcion_id')->constrained('inscripciones')->onDelete('cascade');
            
            // Atributos Genéricos
            $table->string('tipo_cargo'); // 'Actual' o 'Anterior'
            $table->string('cargo')->nullable();
            $table->string('institucion')->nullable();
            $table->string('ciudad_pais')->nullable();
            $table->string('desde')->nullable();
            $table->string('hasta')->nullable();
            $table->boolean('tiempo_completo')->default(false);
            $table->text('funciones')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cargos_profesionales');
    }
};
