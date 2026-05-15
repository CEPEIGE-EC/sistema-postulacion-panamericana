<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Justificacion extends Model
{
    protected $table = 'justificaciones';

    protected $fillable = [
        'inscripcion_id',
        'razones_participacion',
        'aprovechamiento_conocimientos',
    ];

    public function inscripcion(): BelongsTo
    {
        return $this->belongsTo(Inscripcion::class);
    }
}
