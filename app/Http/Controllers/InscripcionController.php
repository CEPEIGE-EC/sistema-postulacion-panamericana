<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\EnsenanzaUniversitaria;
use App\Models\CursoRealizado;
use App\Models\Publicacion;
use App\Models\CargoProfesional;
use App\Models\Justificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscripcionController extends Controller
{
    public function create()
    {
        return view('formulario');
    }

    public function store(Request $request)
    {
        $request->validate([
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'nombres' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'lugar_nacimiento' => 'required|string|max:255',
            'cedula_pasaporte' => 'required|string|max:255',
            'sexo' => 'required|in:M,F',
            'estado_civil' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'provincia' => 'nullable|string|max:255',
            'pais' => 'required|string|max:255',
            'telefono_contacto' => 'required|string|max:255',
            'telefono_alterno' => 'nullable|string|max:255',
            'correo_personal' => 'required|email|max:255',
            'correo_institucional' => 'nullable|email|max:255',
            'cv_archivo' => 'required|file|mimes:pdf|max:2048',
        ]);

        DB::transaction(function () use ($request) {
            // Subir CV
            $cvPath = null;
            if ($request->hasFile('cv_archivo')) {
                $cvPath = $request->file('cv_archivo')->store('cvs', 'public');
            }

            // 1. Crear inscripción (Datos Personales)
            $data = $request->only([
                'apellido_paterno', 'apellido_materno', 'nombres',
                'fecha_nacimiento', 'lugar_nacimiento', 'cedula_pasaporte',
                'sexo', 'estado_civil', 'direccion', 'ciudad',
                'provincia', 'pais', 'telefono_contacto', 'telefono_alterno',
                'correo_personal', 'correo_institucional',
            ]);
            $data['cv_path'] = $cvPath;
            $data['declaracion_verdad'] = $request->boolean('declaracion_verdad');
            $data['recibir_informacion'] = $request->boolean('recibir_informacion');
            $inscripcion = Inscripcion::create($data);

            // 2. Formación Superior (hasta 4)
            if ($request->has('formacion')) {
                foreach ($request->input('formacion', []) as $item) {
                    if (!empty($item['institucion']) || !empty($item['titulo_obtenido'])) {
                        $inscripcion->formacionSuperior()->create($item);
                    }
                }
            }

            // 3. Cursos Realizados (hasta 6)
            if ($request->has('cursos')) {
                foreach ($request->input('cursos', []) as $item) {
                    if (!empty($item['curso_realizado']) || !empty($item['numero_horas_academicas'])) {
                        $inscripcion->cursosRealizados()->create($item);
                    }
                }
            }

            // 4. Publicaciones
            if ($request->has('publicaciones_tesis')) {
                foreach ($request->input('publicaciones_tesis', []) as $item) {
                    if (!empty($item['titulo'])) {
                        $inscripcion->publicaciones()->create(array_merge($item, ['tipo' => 'tesis']));
                    }
                }
            }
            if ($request->has('publicaciones_otras')) {
                foreach ($request->input('publicaciones_otras', []) as $item) {
                    if (!empty($item['titulo'])) {
                        $inscripcion->publicaciones()->create(array_merge($item, ['tipo' => 'otra']));
                    }
                }
            }

            // 5. Cargos Profesionales (Dinámicos)
            // Cargo Actual
            if ($request->filled('cargo_actual')) {
                $funcionesActuales = array_filter($request->input('funciones_actuales', []));
                $textoActuales = count($funcionesActuales) > 0 ? implode("\n", array_map(fn($f) => "• " . $f, $funcionesActuales)) : null;

                $inscripcion->cargosProfesionales()->create([
                    'tipo_cargo' => 'Actual',
                    'cargo' => $request->input('cargo_actual'),
                    'institucion' => $request->input('institucion_actual'),
                    'ciudad_pais' => $request->input('ciudad_pais_actual'),
                    'desde' => $request->input('desde_actual'),
                    'hasta' => null,
                    'tiempo_completo' => $request->boolean('tiempo_completo_actual'),
                    'funciones' => $textoActuales,
                ]);
            }

            // Cargos Anteriores (Array dinámico)
            if ($request->has('cargos_anteriores')) {
                foreach ($request->input('cargos_anteriores', []) as $cargoAnterior) {
                    if (!empty($cargoAnterior['cargo'])) {
                        $funcionesAnteriores = array_filter($cargoAnterior['funciones'] ?? []);
                        $textoAnteriores = count($funcionesAnteriores) > 0 ? implode("\n", array_map(fn($f) => "• " . $f, $funcionesAnteriores)) : null;

                        $inscripcion->cargosProfesionales()->create([
                            'tipo_cargo' => 'Anterior',
                            'cargo' => $cargoAnterior['cargo'] ?? null,
                            'institucion' => $cargoAnterior['institucion'] ?? null,
                            'ciudad_pais' => $cargoAnterior['ciudad_pais'] ?? null,
                            'desde' => $cargoAnterior['desde'] ?? null,
                            'hasta' => $cargoAnterior['hasta'] ?? null,
                            'tiempo_completo' => false,
                            'funciones' => $textoAnteriores,
                        ]);
                    }
                }
            }

            // 6. Justificación
            $razones = array_filter($request->input('razones_participacion', []));
            $textoRazones = count($razones) > 0 ? implode("\n", array_map(fn($f) => "• " . $f, $razones)) : null;

            $aprovechamientos = array_filter($request->input('aprovechamiento_conocimientos', []));
            $textoAprovechamientos = count($aprovechamientos) > 0 ? implode("\n", array_map(fn($f) => "• " . $f, $aprovechamientos)) : null;

            $inscripcion->justificacion()->create([
                'razones_participacion' => $textoRazones,
                'aprovechamiento_conocimientos' => $textoAprovechamientos,
            ]);
        });

        return redirect()->route('inscripcion.create')
            ->with('success', '¡Su inscripción ha sido registrada exitosamente!');
    }
}
