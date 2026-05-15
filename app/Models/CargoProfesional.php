<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CargoProfesional extends Model
{
    protected $table = 'cargos_profesionales';

    protected $fillable = [
        'inscripcion_id',
        'tipo_cargo',
        'cargo',
        'institucion',
        'ciudad_pais',
        'desde',
        'hasta',
        'tiempo_completo',
        'funciones',
    ];

    protected function casts(): array
    {
        return [
            'tiempo_completo' => 'boolean',
        ];
    }

    public function inscripcion(): BelongsTo
    {
        return $this->belongsTo(Inscripcion::class);
    }
}
