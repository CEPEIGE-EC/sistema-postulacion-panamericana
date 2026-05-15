<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';

    protected $fillable = [
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'fecha_nacimiento',
        'lugar_nacimiento',
        'cedula_pasaporte',
        'sexo',
        'estado_civil',
        'direccion',
        'ciudad',
        'pais',
        'telefono_contacto',
        'telefono_alterno',
        'correo_personal',
        'correo_institucional',
        'cv_path',
        'estado',
        'declaracion_verdad',
        'recibir_informacion',
    ];

    protected function casts(): array
    {
        return [
            'fecha_nacimiento' => 'date',
            'declaracion_verdad' => 'boolean',
            'recibir_informacion' => 'boolean',
        ];
    }

    public function formacionSuperior(): HasMany
    {
        return $this->hasMany(FormacionSuperior::class);
    }

    public function cursosRealizados(): HasMany
    {
        return $this->hasMany(CursoRealizado::class);
    }

    public function publicaciones(): HasMany
    {
        return $this->hasMany(Publicacion::class);
    }

    public function cargosProfesionales(): HasMany
    {
        return $this->hasMany(CargoProfesional::class);
    }

    public function justificacion(): HasOne
    {
        return $this->hasOne(Justificacion::class);
    }
}
