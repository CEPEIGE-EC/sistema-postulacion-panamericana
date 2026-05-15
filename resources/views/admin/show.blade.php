<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            <div class="flex items-center gap-4">
                <h2 class="font-semibold text-xl leading-tight" style="color: #0367a6;">
                    Detalle de Inscripción #{{ $inscripcion->id }}
                </h2>
                @if($inscripcion->estado === 'Aprobado')
                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 border border-green-200">Aprobado</span>
                @elseif($inscripcion->estado === 'Rechazado')
                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 border border-red-200">Rechazado</span>
                @else
                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 border border-blue-200">Pendiente</span>
                @endif
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 underline hidden sm:inline-block">
                    &larr; Volver
                </a>

                <a href="{{ route('inscripciones.edit', $inscripcion->id) }}" title="Editar Postulante" class="inline-flex items-center px-4 py-2 border border-blue-300 rounded-md font-semibold text-xs text-blue-700 uppercase tracking-widest bg-white hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Editar
                </a>

                <form action="{{ route('inscripciones.destroy', $inscripcion->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Está seguro de eliminar permanentemente a este postulante?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" title="Eliminar Postulante" class="inline-flex items-center px-4 py-2 border border-red-300 rounded-md font-semibold text-xs text-red-600 uppercase tracking-widest bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition shadow-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Eliminar
                    </button>
                </form>

                @if($inscripcion->cv_path)
                <a href="{{ route('inscripciones.cv', $inscripcion->id) }}" target="_blank" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md" style="background-color: #f3762b;">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Descargar CV (PDF)
                </a>
                @else
                <span class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-semibold text-xs text-gray-400 uppercase tracking-widest bg-gray-100 cursor-not-allowed shadow-sm">
                    Sin CV Adjunto
                </span>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- SECCIÓN DICTAMEN Y APROBACIÓN (FASE 16) --}}
            <div class="bg-white shadow sm:rounded-lg overflow-hidden border border-gray-100">
                <div class="px-6 py-4 border-b border-gray-100" style="background: linear-gradient(145deg, #ffffff 0%, #fffaf7 100%);">
                    <h3 class="text-lg font-bold flex items-center gap-2" style="color: #f3762b;">
                        <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Resolución del Postulante
                    </h3>
                </div>
                <div class="p-6">
                    <form action="{{ route('inscripciones.estado', $inscripcion->id) }}" method="POST" class="flex flex-col sm:flex-row items-center gap-4">
                        @csrf
                        @method('PATCH')
                        <p class="text-sm text-gray-600 font-medium w-full sm:w-auto">Estado Actual y Dictamen:</p>
                        <select name="estado" class="block w-full sm:w-64 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm font-semibold py-2.5 px-3 transition-colors duration-200 border-gray-300
                            {{ $inscripcion->estado === 'Aprobado' ? 'text-green-800 bg-green-50 border-green-200' : ($inscripcion->estado === 'Rechazado' ? 'text-red-800 bg-red-50 border-red-200' : 'text-blue-800 bg-blue-50 border-blue-200') }}">
                            <option value="Pendiente" {{ $inscripcion->estado === 'Pendiente' ? 'selected' : '' }}>Pendiente (En Evaluación)</option>
                            <option value="Aprobado" {{ $inscripcion->estado === 'Aprobado' ? 'selected' : '' }}>Aprobado (Admitido)</option>
                            <option value="Rechazado" {{ $inscripcion->estado === 'Rechazado' ? 'selected' : '' }}>Rechazado (No Cumple)</option>
                        </select>
                        <button type="submit" class="w-full sm:w-auto px-6 py-2.5 border border-transparent rounded-md font-bold text-xs text-white uppercase tracking-widest hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md" style="background: linear-gradient(135deg, #f3762b, #e65c00);">
                            Guardar Dictamen
                        </button>
                    </form>
                </div>
            </div>

            {{-- SECCIÓN DATOS PERSONALES --}}
            <div class="bg-white shadow sm:rounded-lg overflow-hidden border border-gray-100">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="text-lg font-bold" style="color: #02549E;">1. DATOS PERSONALES</h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
                    <div><span class="block text-gray-500 text-xs font-semibold mb-1">Apellidos</span>
                        <p class="font-medium text-gray-900">{{ $inscripcion->apellido_paterno }} {{ $inscripcion->apellido_materno }}</p>
                    </div>
                    <div><span class="block text-gray-500 text-xs font-semibold mb-1">Nombres</span>
                        <p class="font-medium text-gray-900">{{ $inscripcion->nombres }}</p>
                    </div>
                    <div><span class="block text-gray-500 text-xs font-semibold mb-1">Documento Identidad o Pasaporte</span>
                        <p class="font-medium text-gray-900">{{ $inscripcion->cedula_pasaporte }}</p>
                    </div>

                    <div><span class="block text-gray-500 text-xs font-semibold mb-1">Fecha de Nacimiento</span>
                        <p class="font-medium text-gray-900">{{ $inscripcion->fecha_nacimiento->format('d/m/Y') }}</p>
                    </div>
                    <div><span class="block text-gray-500 text-xs font-semibold mb-1">Lugar de Nacimiento</span>
                        <p class="font-medium text-gray-900">{{ $inscripcion->lugar_nacimiento }}</p>
                    </div>
                    <div><span class="block text-gray-500 text-xs font-semibold mb-1">Sexo / Estado Civil</span>
                        <p class="font-medium text-gray-900">{{ $inscripcion->sexo == 'M' ? 'Masculino' : 'Femenino' }} / {{ $inscripcion->estado_civil }}</p>
                    </div>

                    <div class="md:col-span-3"><span class="block text-gray-500 text-xs font-semibold mb-1">Dirección Completa</span>
                        <p class="font-medium text-gray-900">{{ $inscripcion->direccion }} ({{ $inscripcion->ciudad }}, {{ $inscripcion->provincia }}, {{ $inscripcion->pais }})</p>
                    </div>

                    <div><span class="block text-gray-500 text-xs font-semibold mb-1">Teléfono Contacto (WhatsApp)</span>
                        <p class="font-medium text-gray-900">{{ $inscripcion->telefono_contacto }}</p>
                    </div>
                    <div><span class="block text-gray-500 text-xs font-semibold mb-1">Teléfono Alterno</span>
                        <p class="font-medium text-gray-900">{{ $inscripcion->telefono_alterno ?: 'No registrado' }}</p>
                    </div>
                    <div><span class="block text-gray-500 text-xs font-semibold mb-1">Correo Personal</span>
                        <p class="font-medium text-gray-900">{{ $inscripcion->correo_personal }}</p>
                    </div>
                    <div class="md:col-span-2"><span class="block text-gray-500 text-xs font-semibold mb-1">Correo Institucional</span>
                        <p class="font-medium text-gray-900">{{ $inscripcion->correo_institucional ?: 'No registrado' }}</p>
                    </div>
                </div>
            </div>

            {{-- SECCIÓN FORMACIÓN SUPERIOR --}}
            <div class="bg-white shadow sm:rounded-lg overflow-hidden border border-gray-100">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="text-lg font-bold" style="color: #02549E;">2. FORMACIÓN DE EDUCACIÓN SUPERIOR</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-gray-600 bg-gray-50 uppercase border-b">
                            <tr>
                                <th class="px-6 py-3">Título Obtenido</th>
                                <th class="px-6 py-3">Nivel</th>
                                <th class="px-6 py-3">Institución</th>
                                <th class="px-6 py-3">País</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($inscripcion->formacionSuperior as $edu)
                            <tr class="border-b last:border-0 hover:bg-gray-50">
                                <td class="px-6 py-3 font-medium">{{ $edu->titulo_obtenido ?: '-' }}</td>
                                <td class="px-6 py-3">{{ $edu->nivel ?: '-' }}</td>
                                <td class="px-6 py-3">{{ $edu->institucion ?: '-' }}</td>
                                <td class="px-6 py-3">{{ $edu->pais ?: '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">No se registraron datos</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- SECCIÓN CURSOS REALIZADOS --}}
            <div class="bg-white shadow sm:rounded-lg overflow-hidden border border-gray-100">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="text-lg font-bold" style="color: #02549E;">3. PRINCIPALES CAPACITACIONES RECIBIDAS AFINES A LA TEMÁTICA DEL CURSO (con Certificado de aprobación)</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-gray-600 bg-gray-50 uppercase border-b">
                            <tr>
                                <th class="px-6 py-3">Curso Realizado</th>
                                <th class="px-6 py-3">Mes</th>
                                <th class="px-6 py-3">Año</th>
                                <th class="px-6 py-3">Horas Académicas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($inscripcion->cursosRealizados as $curso)
                            <tr class="border-b last:border-0 hover:bg-gray-50">
                                <td class="px-6 py-3 font-medium">{{ $curso->curso_realizado ?: '-' }}</td>
                                <td class="px-6 py-3">{{ $curso->mes ?: '-' }}</td>
                                <td class="px-6 py-3">{{ $curso->anio ?: '-' }}</td>
                                <td class="px-6 py-3">{{ $curso->numero_horas_academicas ? $curso->numero_horas_academicas . ' Horas' : '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">No se registraron datos</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- PUBLICACIONES Y CARGOS --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                {{-- PUBLICACIONES --}}
                <div class="bg-white shadow sm:rounded-lg overflow-hidden border border-gray-100">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                        <h3 class="text-lg font-bold" style="color: #02549E;">4. PUBLICACIONES O INVESTIGACIONES</h3>
                    </div>
                    <div class="p-6 space-y-6 text-sm">
                        {{-- Tesis --}}
                        <div>
                            <h4 class="font-bold text-gray-800 border-b pb-1 mb-3">a) Título de la Tesis, Disertación o Trabajo de graduación</h4>
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm text-left">
                                    <thead class="text-xs text-gray-600 bg-gray-50 uppercase border-b">
                                        <tr>
                                            <th class="px-4 py-2">Título</th>
                                            <th class="px-4 py-2">Institución</th>
                                            <th class="px-4 py-2">Año</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($inscripcion->publicaciones->where('tipo', 'tesis') as $tesis)
                                        <tr class="border-b last:border-0 hover:bg-gray-50">
                                            <td class="px-4 py-2 font-medium italic">{{ $tesis->titulo ?: '-' }}</td>
                                            <td class="px-4 py-2">{{ $tesis->institucion_publicacion ?: '-' }}</td>
                                            <td class="px-4 py-2">{{ $tesis->anio_publicacion ?: '-' }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="px-4 py-3 text-center text-gray-500 italic">No se registraron datos</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Otras --}}
                        <div>
                            <h4 class="font-bold text-gray-800 border-b pb-1 mb-3">b) Otras Publicaciones / Investigaciones</h4>
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm text-left">
                                    <thead class="text-xs text-gray-600 bg-gray-50 uppercase border-b">
                                        <tr>
                                            <th class="px-4 py-2">Título</th>
                                            <th class="px-4 py-2">Institución</th>
                                            <th class="px-4 py-2">Año</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($inscripcion->publicaciones->where('tipo', 'otra') as $otra)
                                        <tr class="border-b last:border-0 hover:bg-gray-50">
                                            <td class="px-4 py-2 font-medium italic">{{ $otra->titulo ?: '-' }}</td>
                                            <td class="px-4 py-2">{{ $otra->institucion_publicacion ?: '-' }}</td>
                                            <td class="px-4 py-2">{{ $otra->anio_publicacion ?: '-' }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="px-4 py-3 text-center text-gray-500 italic">No se registraron datos</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- CARGOS --}}
                <div class="bg-white shadow sm:rounded-lg overflow-hidden border border-gray-100">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                        <h3 class="text-lg font-bold" style="color: #02549E;">5. CARGOS PROFESIONALES O TÉCNICOS DESEMPEÑADOS</h3>
                    </div>
                    <div class="p-6 space-y-6 text-sm">
                        @if($inscripcion->cargosProfesionales->count() > 0)
                        @php
                        $cargoActual = $inscripcion->cargosProfesionales->where('tipo_cargo', 'Actual')->first();
                        $cargosAnteriores = $inscripcion->cargosProfesionales->where('tipo_cargo', 'Anterior');
                        @endphp

                        @if($cargoActual)
                        <div>
                            <h4 class="font-bold text-gray-800 border-b pb-1 mb-3">Cargo Actual ({{ $cargoActual->tiempo_completo ? 'Tiempo Completo' : 'Medio Tiempo' }})</h4>
                            <p><span class="font-semibold text-gray-600">Cargo:</span> {{ $cargoActual->cargo ?: '-' }}</p>
                            <p><span class="font-semibold text-gray-600">Institución:</span> {{ $cargoActual->institucion ?: '-' }} ({{ $cargoActual->ciudad_pais }})</p>
                            <p><span class="font-semibold text-gray-600">Desde:</span> {{ $cargoActual->desde ?: '-' }}</p>
                            <p class="mt-2 text-gray-700"><span class="font-semibold text-gray-600">Funciones:</span></p>
                            <div class="mt-1 pl-3 border-l-2 border-orange-300 text-gray-700">{!! nl2br(e($cargoActual->funciones ?: 'Sin descripción')) !!}</div>
                        </div>
                        @endif

                        @if($cargosAnteriores->count() > 0)
                        <div>
                            <h4 class="font-bold text-gray-800 border-b pb-1 mb-3 mt-2">Cargos o Puestos Anteriores</h4>
                            <div class="space-y-4">
                                @foreach($cargosAnteriores as $index => $cargoAnterior)
                                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                                    <p class="font-bold mb-2 flex items-center gap-2" style="color: #02549E;">
                                        <span class="w-6 h-6 flex items-center justify-center rounded-full text-white text-xs" style="background-color: #02549E;">{{ $loop->iteration }}</span>
                                        Cargo Anterior
                                    </p>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-3">
                                        <p><span class="font-semibold text-gray-600">Cargo:</span> {{ $cargoAnterior->cargo ?: '-' }}</p>
                                        <p><span class="font-semibold text-gray-600">Institución:</span> {{ $cargoAnterior->institucion ?: '-' }} ({{ $cargoAnterior->ciudad_pais }})</p>
                                        <p><span class="font-semibold text-gray-600">Desde:</span> {{ $cargoAnterior->desde ?: '-' }}</p>
                                        <p><span class="font-semibold text-gray-600">Hasta:</span> {{ $cargoAnterior->hasta ?: '-' }}</p>
                                    </div>
                                    <p class="text-gray-700"><span class="font-semibold text-gray-600">Funciones:</span></p>
                                    <div class="mt-1 pl-3 border-l-2 border-gray-300 text-gray-700">{!! nl2br(e($cargoAnterior->funciones ?: 'Sin descripción')) !!}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @else
                        <p class="text-gray-500 italic">No se registraron cargos profesionales.</p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- JUSTIFICACIÓN --}}
            <div class="bg-white shadow sm:rounded-lg overflow-hidden border border-gray-100">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="text-lg font-bold" style="color: #02549E;">6. MOTIVACIONES Y APLICABILIDAD POST-CURSO</h3>
                </div>
                <div class="p-6 space-y-4 text-sm">
                    @if($inscripcion->justificacion)
                    <div>
                        <span class="block text-gray-600 font-semibold mb-2">Razones de participación:</span>
                        <div class="mt-1 text-gray-700 pl-3 border-l-2 border-orange-300">{!! nl2br(e($inscripcion->justificacion->razones_participacion ?: 'Sin registro')) !!}</div>
                    </div>
                    <div>
                        <span class="block text-gray-600 font-semibold mb-2 mt-4">Expectativas de aprovechamiento:</span>
                        <div class="mt-1 text-gray-700 pl-3 border-l-2 border-orange-300">{!! nl2br(e($inscripcion->justificacion->aprovechamiento_conocimientos ?: 'Sin registro')) !!}</div>
                    </div>
                    @else
                    <p class="text-gray-500 italic">No se registró justificación.</p>
                    @endif
                </div>
            </div>

            {{-- OPT-IN MARKETING --}}
            @if($inscripcion->recibir_informacion)
            <div class="mt-8 flex justify-end">
                <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-50 border border-green-200 text-green-700 text-sm font-semibold shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Aceptó recibir información periódica del CEPEIGE
                </span>
            </div>
            @endif

        </div>
    </div>
</x-app-layout>