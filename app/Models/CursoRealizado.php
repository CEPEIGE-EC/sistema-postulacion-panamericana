<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CursoRealizado extends Model
{
    protected $table = 'cursos_realizados';

    protected $fillable = [
        'inscripcion_id',
        'curso_realizado',
        'mes',
        'anio',
        'numero_horas_academicas',
    ];

    public function inscripcion(): BelongsTo
    {
        return $this->belongsTo(Inscripcion::class);
    }
}
