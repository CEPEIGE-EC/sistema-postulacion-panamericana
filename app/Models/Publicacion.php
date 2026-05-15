<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Publicacion extends Model
{
    protected $table = 'publicaciones';

    protected $fillable = [
        'inscripcion_id',
        'tipo',
        'titulo',
        'institucion_publicacion',
        'anio_publicacion',
    ];

    public function inscripcion(): BelongsTo
    {
        return $this->belongsTo(Inscripcion::class);
    }
}
