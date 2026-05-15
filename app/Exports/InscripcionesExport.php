<?php

namespace App\Exports;

use App\Models\Inscripcion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InscripcionesExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inscripcion::with([
            'formacionSuperior',
            'cursosRealizados',
            'cargosProfesionales'
        ])->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        $headings = [
            'ID',
            'Apellido Paterno',
            'Apellido Materno',
            'Nombres',
            'Fecha Nacimiento',
            'Lugar Nacimiento',
            'Documento/Pasaporte',
            'Sexo',
            'Estado Civil',
            'Dirección',
            'Ciudad',
            'Provincia',
            'País',
            'Teléfono Contacto',
            'Teléfono Alterno',
            'Correo Personal',
            'Correo Institucional',
            'Estado',
            'Acepta Información CEPEIGE',
        ];

        // Secciones dinámicas aplanadas
        
        // 1. Formación Superior (Máximo 4 según formulario)
        for ($i = 1; $i <= 4; $i++) {
            $headings[] = "Formación $i: Título";
            $headings[] = "Formación $i: Nivel";
            $headings[] = "Formación $i: País";
        }

        // 2. Cursos Realizados (Máximo 6 según formulario)
        for ($i = 1; $i <= 6; $i++) {
            $headings[] = "Curso $i: Nombre";
            $headings[] = "Curso $i: Mes";
            $headings[] = "Curso $i: Año";
            $headings[] = "Curso $i: Horas";
        }

        // 3. Cargo Actual
        $headings[] = "Cargo Actual: Cargo";
        $headings[] = "Cargo Actual: Institución";
        $headings[] = "Cargo Actual: Ciudad/País";
        $headings[] = "Cargo Actual: Desde";
        $headings[] = "Cargo Actual: Tiempo Completo";
        $headings[] = "Cargo Actual: Funciones";

        // 4. Cargos Anteriores (Máximo 3 adicionales según JS del form)
        for ($i = 1; $i <= 3; $i++) {
            $headings[] = "Cargo Anterior $i: Cargo";
            $headings[] = "Cargo Anterior $i: Institución";
            $headings[] = "Cargo Anterior $i: Ciudad/País";
            $headings[] = "Cargo Anterior $i: Desde";
            $headings[] = "Cargo Anterior $i: Hasta";
            $headings[] = "Cargo Anterior $i: Funciones";
        }

        return $headings;
    }

    /**
    * @var Inscripcion $inscripcion
    */
    public function map($inscripcion): array
    {
        $data = [
            $inscripcion->id,
            $inscripcion->apellido_paterno,
            $inscripcion->apellido_materno,
            $inscripcion->nombres,
            $inscripcion->fecha_nacimiento ? $inscripcion->fecha_nacimiento->format('d/m/Y') : '',
            $inscripcion->lugar_nacimiento,
            $inscripcion->cedula_pasaporte,
            $inscripcion->sexo,
            $inscripcion->estado_civil,
            $inscripcion->direccion,
            $inscripcion->ciudad,
            $inscripcion->provincia,
            $inscripcion->pais,
            $inscripcion->telefono_contacto,
            $inscripcion->telefono_alterno,
            $inscripcion->correo_personal,
            $inscripcion->correo_institucional,
            $inscripcion->estado,
            $inscripcion->recibir_informacion ? 'SÍ' : 'NO',
        ];

        // Mapeo Formación (4 max)
        $formaciones = $inscripcion->formacionSuperior;
        for ($i = 0; $i < 4; $i++) {
            $item = $formaciones[$i] ?? null;
            $data[] = $item ? $item->titulo_obtenido : '';
            $data[] = $item ? $item->nivel : '';
            $data[] = $item ? $item->pais : '';
        }

        // Mapeo Cursos (6 max)
        $cursos = $inscripcion->cursosRealizados;
        for ($i = 0; $i < 6; $i++) {
            $item = $cursos[$i] ?? null;
            $data[] = $item ? $item->curso_realizado : '';
            $data[] = $item ? $item->mes : '';
            $data[] = $item ? $item->anio : '';
            $data[] = $item ? $item->numero_horas_academicas : '';
        }

        // Mapeo Cargo Actual
        $cargoActual = $inscripcion->cargosProfesionales->where('tipo_cargo', 'Actual')->first();
        $data[] = $cargoActual ? $cargoActual->cargo : '';
        $data[] = $cargoActual ? $cargoActual->institucion : '';
        $data[] = $cargoActual ? $cargoActual->ciudad_pais : '';
        $data[] = $cargoActual ? $cargoActual->desde : '';
        $data[] = $cargoActual ? ($cargoActual->tiempo_completo ? 'SÍ' : 'NO') : '';
        $data[] = $cargoActual ? $cargoActual->funciones : '';

        // Mapeo Cargos Anteriores (3 max)
        $cargosAnteriores = $inscripcion->cargosProfesionales->where('tipo_cargo', 'Anterior')->values();
        for ($i = 0; $i < 3; $i++) {
            $item = $cargosAnteriores[$i] ?? null;
            $data[] = $item ? $item->cargo : '';
            $data[] = $item ? $item->institucion : '';
            $data[] = $item ? $item->ciudad_pais : '';
            $data[] = $item ? $item->desde : '';
            $data[] = $item ? $item->hasta : '';
            $data[] = $item ? $item->funciones : '';
        }

        return $data;
    }

    /**
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo para la fila de encabezado
            1 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '02549E']
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ],
        ];
    }
}
