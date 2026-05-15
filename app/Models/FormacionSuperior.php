<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormacionSuperior extends Model
{
    protected $table = 'formacion_superior';

    protected $fillable = [
        'inscripcion_id',
        'titulo_obtenido',
        'nivel',
        'institucion',
        'pais',
    ];

    public function inscripcion(): BelongsTo
    {
        return $this->belongsTo(Inscripcion::class);
    }
}
