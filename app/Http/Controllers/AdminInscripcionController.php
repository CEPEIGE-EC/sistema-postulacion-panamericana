<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Exports\InscripcionesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminInscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        # Obtener todas las inscripciones ordenadas de más reciente a más antigua
        $inscripciones = Inscripcion::latest()->paginate(15);
        
        return view('dashboard', compact('inscripciones'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Inscripcion $inscripcion)
    {
        # Eager loading para optimizar las consultas a las relaciones del modelo
        $inscripcion->load([
            'formacionSuperior', 
            'cursosRealizados', 
            'publicaciones', 
            'cargosProfesionales', 
            'justificacion'
        ]);

        return view('admin.show', compact('inscripcion'));
    }

    /**
     * Download the specified CV.
     */
    public function downloadCv(Inscripcion $inscripcion)
    {
        if (!$inscripcion->cv_path || !Storage::disk('public')->exists($inscripcion->cv_path)) {
            return redirect()->back()->with('error', 'El archivo no se encuentra disponible.');
        }

        # Generar un nombre de archivo amigable
        $fileName = 'CV_' . str_replace(' ', '_', $inscripcion->nombres . '_' . $inscripcion->apellido_paterno) . '.pdf';
        
        return Storage::disk('public')->download($inscripcion->cv_path, $fileName);
    }

    /**
     * Export all inscriptions to Excel.
     */
    public function exportExcel()
    {
        return Excel::download(
            new InscripcionesExport, 
            'Informe_Inscritos_CEPEIGE_' . now()->format('Y-m-d_His') . '.xlsx'
        );
    }
    public function edit(Inscripcion $inscripcion)
    {
        return view('admin.edit', compact('inscripcion'));
    }

    public function update(Request $request, Inscripcion $inscripcion)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'correo_personal' => 'required|email|max:255',
            'correo_institucional' => 'nullable|email|max:255',
            'telefono_contacto' => 'required|string|max:255',
            'telefono_alterno' => 'nullable|string|max:255',
        ]);

        $inscripcion->update($request->only([
            'nombres', 'apellido_paterno', 'apellido_materno', 
            'correo_personal', 'correo_institucional', 
            'telefono_contacto', 'telefono_alterno'
        ]));

        return redirect()->route('dashboard')->with('status', 'Inscripción actualizada correctamente.');
    }

    public function updateEstado(Request $request, Inscripcion $inscripcion)
    {
        $request->validate([
            'estado' => 'required|in:Pendiente,Aprobado,Rechazado',
        ]);

        $inscripcion->update(['estado' => $request->estado]);

        return redirect()->route('inscripciones.show', $inscripcion)->with('status', 'El dictamen ha sido guardado exitosamente.');
    }

    public function destroy(Inscripcion $inscripcion)
    {
        if ($inscripcion->cv_path && Storage::disk('public')->exists($inscripcion->cv_path)) {
            Storage::disk('public')->delete($inscripcion->cv_path);
        }
        $inscripcion->delete();
        
        return redirect()->route('dashboard')->with('status', 'Inscripción eliminada correctamente.');
    }
}
