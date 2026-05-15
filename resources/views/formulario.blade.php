<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario de Inscripción - CEPEIGE</title>
    <meta name="description" content="Formulario de inscripción al IV Curso de la Escuela Panamericana de Geofísica - CEPEIGE">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,500&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #f0f4f8 0%, #e8eef5 50%, #f5f0eb 100%);
            min-height: 100vh;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: #0367A6;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #02549E;
        }
    </style>
</head>

<body class="antialiased">

    {{-- ===== HEADER ===== --}}
    <header class="relative overflow-hidden">
        {{-- Gradient bar top --}}
        <div class="h-2" style="background: linear-gradient(90deg, #02549E 0%, #0367A6 40%, #f3762b 100%);"></div>

        <div class="bg-white shadow-lg">
            <div class="max-w-5xl mx-auto px-6 py-6">
                <div class="flex items-center gap-6">
                    {{-- Logo --}}
                    <div class="shrink-0">
                        <img src="{{ asset('img/LOGO_F_1973.webp') }}" alt="Logo CEPEIGE" class="w-24 h-24 object-contain">
                    </div>
                    {{-- Titles --}}
                    <div class="flex-1 text-center">
                        <h1 class="text-lg md:text-xl font-extrabold tracking-wide" style="color: #f3762b;">
                            CENTRO PANAMERICANO DE ESTUDIOS E INVESTIGACIONES GEOGRÁFICAS
                        </h1>
                        <p class="text-lg md:text-sm font-semibold italic mt-1" style="color: #02549E;">
                            PANAMERICAN CENTER FOR GEOGRAPHICAL STUDIES AND RESEARCH
                        </p>
                        <p class="text-xs md:text-sm font-semibold mt-1" style="color: #02549E;">
                            QUINCUAGÉSIMO SEGUNDO CURSO PANAMERICANO DE GEOGRAFÍA APLICADA
                        </p>
                        <div class="mt-3 inline-block px-10 py-6 rounded-full" style="background: linear-gradient(135deg, #02549E, #0367A6);">
                            <h2 class="text-white text-base md:text-lg font-bold tracking-wider">
                                CURSO: GEOGRAFÍA APLICADA A LA EVALUACIÓN Y GESTIÓN DE LA CALIDAD EN LA INFORMACIÓN GEOGRÁFICA
                            </h2>
                        </div>
                    </div>
                    {{-- Logo --}}
                    <div class="shrink-0">
                        <img src="{{ asset('img/IPGH_azul_oficial_2.png') }}" alt="Logo CEPEIGE" class="w-20 h-20 object-contain">
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- ===== SUCCESS MESSAGE ===== --}}
    @if(session('success'))
    <div class="max-w-5xl mx-auto px-6 mt-6">
        <div class="bg-green-50 border border-green-300 text-green-800 px-6 py-4 rounded-xl shadow-sm flex items-center gap-3" id="success-alert">
            <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="font-semibold">{{ session('success') }}</span>
        </div>
    </div>
    @endif

    {{-- ===== FORM ===== --}}
    <form action="{{ route('inscripcion.store') }}" method="POST" enctype="multipart/form-data" class="max-w-5xl mx-auto px-4 md:px-6 py-8 space-y-8">
        @csrf

        {{-- ===== SECTION 1: INFORMACIÓN GENERAL ===== --}}
        <section class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="px-6 py-3 flex items-center gap-3" style="background: linear-gradient(135deg, #02549E, #0367A6);">
                <span class="bg-white text-sm font-bold w-8 h-8 flex items-center justify-center rounded-full" style="color: #02549E;">1</span>
                <h3 class="text-white font-bold text-lg tracking-wide">INFORMACIÓN GENERAL</h3>
            </div>
            <div class="p-6">
                <ul class="space-y-4 text-sm text-gray-800">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 mt-0.5 shrink-0" style="color: #f3762b;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <div>
                            <p><span class="font-bold" style="color: #0367A6;">Fecha de inicio:</span> Lunes 03 de agosto de 2026</p>
                            <p class="mt-1"><span class="font-bold" style="color: #0367A6;">Fecha de finalización:</span> Viernes 20 de noviembre de 2026</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 mt-0.5 shrink-0" style="color: #f3762b;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                        <div>
                            <span class="font-bold" style="color: #0367A6;">Modalidad Virtual (240 horas totales):</span>
                            <ul class="mt-2 space-y-1 ml-1">
                                <li class="flex items-start gap-2"><span class="text-gray-400 font-bold">•</span> 135 horas Componente Teórico.</li>
                                <li class="flex items-start gap-2"><span class="text-gray-400 font-bold">•</span> 105 horas Componente Práctico.</li>
                            </ul>
                        </div>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 mt-0.5 shrink-0" style="color: #f3762b;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p>
                            <span class="font-bold" style="color: #0367A6;">Tipo de certificado:</span> Este curso es Aprobatorio. El Certificado de aprobación es Panamericano, validado por OEA-IPGH / CEPEIGE.
                        </p>
                    </li>
                </ul>
            </div>
        </section>

        {{-- ===== SECTION 2: DATOS PERSONALES ===== --}}
        <section class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="px-6 py-3 flex items-center gap-3" style="background: linear-gradient(135deg, #02549E, #0367A6);">
                <span class="bg-white text-sm font-bold w-8 h-8 flex items-center justify-center rounded-full" style="color: #02549E;">2</span>
                <h3 class="text-white font-bold text-lg tracking-wide">DATOS PERSONALES</h3>
            </div>
            <div class="p-6 space-y-5">
                {{-- Nombre completo --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="apellido_paterno" class="block text-xs font-semibold text-gray-500 mb-1">Apellido Paterno <span class="text-red-500">*</span></label>
                        <input type="text" name="apellido_paterno" id="apellido_paterno" value="{{ old('apellido_paterno') }}" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all duration-200"
                            style="focus:ring-color: #0367A6;" placeholder="Apellido paterno">
                        @error('apellido_paterno') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="apellido_materno" class="block text-xs font-semibold text-gray-500 mb-1">Apellido Materno <span class="text-red-500">*</span></label>
                        <input type="text" name="apellido_materno" id="apellido_materno" value="{{ old('apellido_materno') }}" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all duration-200"
                            placeholder="Apellido materno">
                        @error('apellido_materno') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="nombres" class="block text-xs font-semibold text-gray-500 mb-1">Nombres <span class="text-red-500">*</span></label>
                        <input type="text" name="nombres" id="nombres" value="{{ old('nombres') }}" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all duration-200"
                            placeholder="Nombres">
                        @error('nombres') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Fecha y lugar nacimiento --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="fecha_nacimiento" class="block text-xs font-semibold text-gray-500 mb-1">Fecha de Nacimiento <span class="text-red-500">*</span></label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all duration-200">
                        @error('fecha_nacimiento') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="lugar_nacimiento" class="block text-xs font-semibold text-gray-500 mb-1">Lugar de Nacimiento <span class="text-red-500">*</span></label>
                        <input type="text" name="lugar_nacimiento" id="lugar_nacimiento" value="{{ old('lugar_nacimiento') }}" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all duration-200"
                            placeholder="Ciudad de nacimiento">
                        @error('lugar_nacimiento') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Cédula, Sexo, Estado Civil --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="cedula_pasaporte" class="block text-xs font-semibold text-gray-500 mb-1">Documento de Identidad o Pasaporte <span class="text-red-500">*</span></label>
                        <input type="text" name="cedula_pasaporte" id="cedula_pasaporte" value="{{ old('cedula_pasaporte') }}" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all duration-200"
                            placeholder="Número de documento">
                        @error('cedula_pasaporte') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 mb-1">Sexo <span class="text-red-500">*</span></label>
                        <div class="flex items-center gap-6 h-[42px]">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="sexo" value="M" {{ old('sexo') == 'M' ? 'checked' : '' }} required
                                    class="w-4 h-4" style="accent-color: #0367A6;">
                                <span class="text-sm font-medium">Masculino</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="sexo" value="F" {{ old('sexo') == 'F' ? 'checked' : '' }}
                                    class="w-4 h-4" style="accent-color: #0367A6;">
                                <span class="text-sm font-medium">Femenino</span>
                            </label>
                        </div>
                        @error('sexo') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="estado_civil" class="block text-xs font-semibold text-gray-500 mb-1">Estado Civil <span class="text-red-500">*</span></label>
                        <select name="estado_civil" id="estado_civil" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all duration-200 bg-white">
                            <option value="">Seleccionar...</option>
                            <option value="Soltero/a" {{ old('estado_civil') == 'Soltero/a' ? 'selected' : '' }}>Soltero/a</option>
                            <option value="Casado/a" {{ old('estado_civil') == 'Casado/a' ? 'selected' : '' }}>Casado/a</option>
                            <option value="Divorciado/a" {{ old('estado_civil') == 'Divorciado/a' ? 'selected' : '' }}>Divorciado/a</option>
                            <option value="Viudo/a" {{ old('estado_civil') == 'Viudo/a' ? 'selected' : '' }}>Viudo/a</option>
                            <option value="Unión libre" {{ old('estado_civil') == 'Unión libre' ? 'selected' : '' }}>Unión libre</option>
                        </select>
                        @error('estado_civil') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Dirección --}}
                <div>
                    <label for="direccion" class="block text-xs font-semibold text-gray-500 mb-1">Dirección Domicilio <span class="text-red-500">*</span></label>
                    <input type="text" name="direccion" id="direccion" value="{{ old('direccion') }}" required
                        class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all duration-200"
                        placeholder="Dirección completa">
                    @error('direccion') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                {{-- Ciudad, Provincia, País --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="ciudad" class="block text-xs font-semibold text-gray-500 mb-1">Ciudad</label>
                        <input type="text" name="ciudad" id="ciudad" value="{{ old('ciudad') }}"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all duration-200"
                            placeholder="Ciudad">
                        @error('ciudad') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="provincia" class="block text-xs font-semibold text-gray-500 mb-1">Departamento/Provincia</label>
                        <input type="text" name="provincia" id="provincia" value="{{ old('provincia') }}"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all duration-200"
                            placeholder="Departamento/Provincia">
                        @error('provincia') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="pais" class="block text-xs font-semibold text-gray-500 mb-1">País <span class="text-red-500">*</span></label>
                        <input type="text" name="pais" id="pais" value="{{ old('pais') }}" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all duration-200"
                            placeholder="País">
                        @error('pais') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Teléfonos y Correos --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="telefono_contacto" class="block text-xs font-semibold text-gray-500 mb-1">Teléfono de Contacto (Móvil/WhatsApp) <span class="text-red-500">*</span></label>
                        <input type="tel" name="telefono_contacto" id="telefono_contacto" value="{{ old('telefono_contacto') }}" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all duration-200"
                            placeholder="+593 99 999 9999">
                        @error('telefono_contacto') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="telefono_alterno" class="block text-xs font-semibold text-gray-500 mb-1">Teléfono Alterno</label>
                        <input type="tel" name="telefono_alterno" id="telefono_alterno" value="{{ old('telefono_alterno') }}"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all duration-200"
                            placeholder="Teléfono Alterno">
                        @error('telefono_alterno') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="correo_personal" class="block text-xs font-semibold text-gray-500 mb-1">Correo Electrónico Personal <span class="text-red-500">*</span></label>
                        <input type="email" name="correo_personal" id="correo_personal" value="{{ old('correo_personal') }}" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all duration-200"
                            placeholder="correo@ejemplo.com">
                        @error('correo_personal') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="correo_institucional" class="block text-xs font-semibold text-gray-500 mb-1">Correo Electrónico Institucional</label>
                        <input type="email" name="correo_institucional" id="correo_institucional" value="{{ old('correo_institucional') }}"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all duration-200"
                            placeholder="correo.institucional@empresa.com">
                        @error('correo_institucional') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </section>

        {{-- ===== SECTION 3: FORMACIÓN DE EDUCACIÓN SUPERIOR ===== --}}
        <section class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="px-6 py-3 flex items-center gap-3" style="background: linear-gradient(135deg, #02549E, #0367A6);">
                <span class="bg-white text-sm font-bold w-8 h-8 flex items-center justify-center rounded-full" style="color: #02549E;">3</span>
                <h3 class="text-white font-bold text-lg tracking-wide">FORMACIÓN DE EDUCACIÓN SUPERIOR</h3>
            </div>
            <div class="p-6 overflow-x-auto">
                <table class="w-full text-sm border-collapse">
                    <thead>
                        <tr style="background: linear-gradient(135deg, #f0f7ff, #e8f0fe);">
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">#</th>
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">Título Obtenido</th>
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">Nivel</th>
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">Institución</th>
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">País</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 4; $i++)
                            <tr class="border-b border-gray-100 hover:bg-blue-50/30 transition-colors">
                            <td class="px-3 py-2 font-semibold text-gray-400">{{ $i + 1 }}</td>
                            <td class="px-1 py-1"><input type="text" name="formacion[{{ $i }}][titulo_obtenido]" value="{{ old("formacion.$i.titulo_obtenido") }}" class="w-full px-2 py-2 border border-gray-200 rounded text-sm focus:ring-1 focus:border-transparent transition-all" placeholder="Título Obtenido"></td>
                            <td class="px-1 py-1">
                                <select name="formacion[{{ $i }}][nivel]" class="w-full px-2 py-2 border border-gray-200 rounded text-sm focus:ring-1 focus:border-transparent transition-all text-gray-700">
                                    <option value="">Seleccione Nivel</option>
                                    <option value="Tercer Nivel" {{ old("formacion.$i.nivel") == 'Tercer Nivel' ? 'selected' : '' }}>Tercer Nivel</option>
                                    <option value="Cuarto Nivel" {{ old("formacion.$i.nivel") == 'Cuarto Nivel' ? 'selected' : '' }}>Cuarto Nivel</option>
                                    <option value="Diplomado" {{ old("formacion.$i.nivel") == 'Diplomado' ? 'selected' : '' }}>Diplomado</option>
                                    <option value="Postdoctorado" {{ old("formacion.$i.nivel") == 'Postdoctorado' ? 'selected' : '' }}>Postdoctorado</option>
                                </select>
                            </td>
                            <td class="px-1 py-1"><input type="text" name="formacion[{{ $i }}][institucion]" value="{{ old("formacion.$i.institucion") }}" class="w-full px-2 py-2 border border-gray-200 rounded text-sm focus:ring-1 focus:border-transparent transition-all" placeholder="Universidad/Instituto"></td>
                            <td class="px-1 py-1"><input type="text" name="formacion[{{ $i }}][pais]" value="{{ old("formacion.$i.pais") }}" class="w-full px-2 py-2 border border-gray-200 rounded text-sm focus:ring-1 focus:border-transparent transition-all" placeholder="País"></td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
            </div>
        </section>

        {{-- ===== SECTION 4: CURSOS REALIZADOS AFINES A LA TEMÁTICA DEL CURSO ===== --}}
        <section class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="px-6 py-3 flex items-center gap-3" style="background: linear-gradient(135deg, #02549E, #0367A6);">
                <span class="bg-white text-sm font-bold w-8 h-8 flex items-center justify-center rounded-full" style="color: #02549E;">4</span>
                <h3 class="text-white font-bold text-md tracking-wide">PRINCIPALES CAPACITACIONES RECIBIDAS AFINES A LA TEMÁTICA DEL CURSO (con Certificado de aprobación)</h3>
            </div>
            <div class="p-6 overflow-x-auto">
                <table class="w-full text-sm border-collapse">
                    <thead>
                        <tr style="background: linear-gradient(135deg, #f0f7ff, #e8f0fe);">
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">#</th>
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">Curso Realizado</th>
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">Mes</th>
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">Año</th>
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">No. Horas Académicas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 6; $i++)
                            <tr class="border-b border-gray-100 hover:bg-blue-50/30 transition-colors">
                            <td class="px-3 py-2 font-semibold text-gray-400">{{ $i + 1 }}</td>
                            <td class="px-1 py-1"><input type="text" name="cursos[{{ $i }}][curso_realizado]" value="{{ old("cursos.$i.curso_realizado") }}" class="w-full px-2 py-2 border border-gray-200 rounded text-sm focus:ring-1 focus:border-transparent transition-all" placeholder="Nombre completo del curso"></td>
                            <td class="px-1 py-1"><input type="text" name="cursos[{{ $i }}][mes]" value="{{ old("cursos.$i.mes") }}" class="w-full px-2 py-2 border border-gray-200 rounded text-sm focus:ring-1 focus:border-transparent transition-all" placeholder="Mes"></td>
                            <td class="px-1 py-1"><input type="text" name="cursos[{{ $i }}][anio]" value="{{ old("cursos.$i.anio") }}" class="w-full px-2 py-2 border border-gray-200 rounded text-sm focus:ring-1 focus:border-transparent transition-all" placeholder="Año"></td>
                            <td class="px-1 py-1"><input type="number" min="1" name="cursos[{{ $i }}][numero_horas_academicas]" value="{{ old("cursos.$i.numero_horas_academicas") }}" class="w-full px-2 py-2 border border-gray-200 rounded text-sm focus:ring-1 focus:border-transparent transition-all" placeholder="Horas"></td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
            </div>
        </section>

        {{-- ===== SECTION 5: PUBLICACIONES O INVESTIGACIONES ===== --}}
        <section class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="px-6 py-3 flex items-center gap-3" style="background: linear-gradient(135deg, #02549E, #0367A6);">
                <span class="bg-white text-sm font-bold w-8 h-8 flex items-center justify-center rounded-full" style="color: #02549E;">5</span>
                <h3 class="text-white font-bold text-lg tracking-wide">PUBLICACIONES O INVESTIGACIONES</h3>
            </div>

            {{-- A: Tesis --}}
            <div class="p-6 overflow-x-auto border-b border-gray-100">
                <h4 class="text-sm font-semibold mb-3" style="color: #0367A6;">a) Título de la Tesis, Disertación o Trabajo de graduación</h4>
                <table class="w-full text-sm border-collapse">
                    <thead>
                        <tr style="background: linear-gradient(135deg, #f0f7ff, #e8f0fe);">
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">#</th>
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">Título</th>
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">Institución de Publicación</th>
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">Año de presentación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 3; $i++)
                            <tr class="border-b border-gray-100 hover:bg-blue-50/30 transition-colors">
                            <td class="px-3 py-2 font-semibold text-gray-400">{{ $i + 1 }}</td>
                            <td class="px-1 py-1"><input type="text" name="publicaciones_tesis[{{ $i }}][titulo]" value="{{ old("publicaciones_tesis.$i.titulo") }}" class="w-full px-2 py-2 border border-gray-200 rounded text-sm focus:ring-1 focus:border-transparent transition-all" placeholder="Título de la investigación"></td>
                            <td class="px-1 py-1"><input type="text" name="publicaciones_tesis[{{ $i }}][institucion_publicacion]" value="{{ old("publicaciones_tesis.$i.institucion_publicacion") }}" class="w-full px-2 py-2 border border-gray-200 rounded text-sm focus:ring-1 focus:border-transparent transition-all" placeholder="Institución"></td>
                            <td class="px-1 py-1"><input type="text" name="publicaciones_tesis[{{ $i }}][anio_publicacion]" value="{{ old("publicaciones_tesis.$i.anio_publicacion") }}" class="w-full px-2 py-2 border border-gray-200 rounded text-sm focus:ring-1 focus:border-transparent transition-all" placeholder="Año"></td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
            </div>

            {{-- B: Otras --}}
            <div class="p-6 overflow-x-auto">
                <h4 class="text-sm font-semibold mb-3" style="color: #0367A6;">b) Otras Publicaciones / Investigaciones</h4>
                <table class="w-full text-sm border-collapse">
                    <thead>
                        <tr style="background: linear-gradient(135deg, #f0f7ff, #e8f0fe);">
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">#</th>
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">Título</th>
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">Institución de Publicación</th>
                            <th class="px-3 py-2.5 text-left font-semibold text-xs uppercase tracking-wider border-b-2" style="color: #0367A6; border-color: #0367A6;">Año de Publicación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 3; $i++)
                            <tr class="border-b border-gray-100 hover:bg-blue-50/30 transition-colors">
                            <td class="px-3 py-2 font-semibold text-gray-400">{{ $i + 1 }}</td>
                            <td class="px-1 py-1"><input type="text" name="publicaciones_otras[{{ $i }}][titulo]" value="{{ old("publicaciones_otras.$i.titulo") }}" class="w-full px-2 py-2 border border-gray-200 rounded text-sm focus:ring-1 focus:border-transparent transition-all" placeholder="Título de la publicación"></td>
                            <td class="px-1 py-1"><input type="text" name="publicaciones_otras[{{ $i }}][institucion_publicacion]" value="{{ old("publicaciones_otras.$i.institucion_publicacion") }}" class="w-full px-2 py-2 border border-gray-200 rounded text-sm focus:ring-1 focus:border-transparent transition-all" placeholder="Institución"></td>
                            <td class="px-1 py-1"><input type="text" name="publicaciones_otras[{{ $i }}][anio_publicacion]" value="{{ old("publicaciones_otras.$i.anio_publicacion") }}" class="w-full px-2 py-2 border border-gray-200 rounded text-sm focus:ring-1 focus:border-transparent transition-all" placeholder="Año"></td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
            </div>
        </section>

        {{-- ===== SECTION 6: CARGOS PROFESIONALES ===== --}}
        <section class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="px-6 py-3 flex items-center gap-3" style="background: linear-gradient(135deg, #02549E, #0367A6);">
                <span class="bg-white text-sm font-bold w-8 h-8 flex items-center justify-center rounded-full" style="color: #02549E;">6</span>
                <h3 class="text-white font-bold text-lg tracking-wide">CARGOS PROFESIONALES O TÉCNICOS DESEMPEÑADOS</h3>
            </div>
            <div class="p-6 space-y-6">
                {{-- Cargo Actual --}}
                <div class="p-5 rounded-xl border-2 border-dashed" style="border-color: #0367A633; background: linear-gradient(135deg, #f8fbff, #f0f7ff);">
                    <h4 class="font-bold text-sm mb-4 flex items-center gap-2" style="color: #02549E;">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        CARGO O PUESTO ACTUAL
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                        <div class="md:col-span-1">
                            <label class="block text-xs font-semibold text-gray-500 mb-1">Cargo o puesto actual</label>
                            <input type="text" name="cargo_actual" value="{{ old('cargo_actual') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Cargo">
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-xs font-semibold text-gray-500 mb-1">Institución</label>
                            <input type="text" name="institucion_actual" value="{{ old('institucion_actual') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Institución">
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-xs font-semibold text-gray-500 mb-1">Ciudad/País</label>
                            <input type="text" name="ciudad_pais_actual" value="{{ old('ciudad_pais_actual') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Ciudad/País">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 mb-1">Desde</label>
                            <input type="text" name="desde_actual" value="{{ old('desde_actual') }}"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Año">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-500 mb-3">Describa las 3 funciones principales que desempeña</label>
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <span class="text-gray-400 font-bold text-lg">•</span>
                                <input type="text" name="funciones_actuales[0]" value="{{ old('funciones_actuales.0') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Función principal 1">
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-gray-400 font-bold text-lg">•</span>
                                <input type="text" name="funciones_actuales[1]" value="{{ old('funciones_actuales.1') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Función principal 2">
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-gray-400 font-bold text-lg">•</span>
                                <input type="text" name="funciones_actuales[2]" value="{{ old('funciones_actuales.2') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Función principal 3">
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-sm font-semibold italic" style="color: #0367A6;">Cargo de tiempo completo:</span>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="tiempo_completo_actual" value="1" {{ old('tiempo_completo_actual') == '1' ? 'checked' : '' }} class="w-4 h-4" style="accent-color: #0367A6;">
                            <span class="text-sm font-medium">SÍ</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="tiempo_completo_actual" value="0" {{ old('tiempo_completo_actual') == '0' ? 'checked' : '' }} class="w-4 h-4" style="accent-color: #0367A6;">
                            <span class="text-sm font-medium">NO</span>
                        </label>
                    </div>
                </div>

                {{-- Contenedor de Cargos Anteriores --}}
                <div id="cargos-anteriores-container" class="space-y-4 relative mt-6">
                    {{-- Cargo Anterior #1 (Fijo) --}}
                    <div class="cargo-item p-5 rounded-xl border border-gray-200 bg-gray-50/50 relative">
                        <h4 class="cargo-title font-bold text-sm mb-4 flex items-center gap-2" style="color: #02549E;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            CARGO / PUESTO ANTERIOR #1
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 mb-1">Cargo o puesto anterior</label>
                                <input type="text" name="cargos_anteriores[0][cargo]" value="{{ old('cargos_anteriores.0.cargo') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Cargo">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 mb-1">Institución</label>
                                <input type="text" name="cargos_anteriores[0][institucion]" value="{{ old('cargos_anteriores.0.institucion') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Institución">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 mb-1">Ciudad/País</label>
                                <input type="text" name="cargos_anteriores[0][ciudad_pais]" value="{{ old('cargos_anteriores.0.ciudad_pais') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Ciudad/País">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 mb-1">Desde</label>
                                <input type="text" name="cargos_anteriores[0][desde]" value="{{ old('cargos_anteriores.0.desde') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Año">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 mb-1">Hasta</label>
                                <input type="text" name="cargos_anteriores[0][hasta]" value="{{ old('cargos_anteriores.0.hasta') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Año">
                            </div>
                        </div>
                        <div class="mb-4 mt-2">
                            <label class="block text-xs font-semibold text-gray-500 mb-3">Describa las 3 funciones principales que desempeñó</label>
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <span class="text-gray-400 font-bold text-lg">•</span>
                                    <input type="text" name="cargos_anteriores[0][funciones][0]" value="{{ old('cargos_anteriores.0.funciones.0') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Función principal 1">
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="text-gray-400 font-bold text-lg">•</span>
                                    <input type="text" name="cargos_anteriores[0][funciones][1]" value="{{ old('cargos_anteriores.0.funciones.1') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Función principal 2">
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="text-gray-400 font-bold text-lg">•</span>
                                    <input type="text" name="cargos_anteriores[0][funciones][2]" value="{{ old('cargos_anteriores.0.funciones.2') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Función principal 3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Botón de Añadir MÁS Cargos Anteriores --}}
                <div class="mt-4 pb-2 flex justify-end">
                    <button type="button" id="btn-add-cargo-anterior" class="inline-flex items-center px-4 py-2 bg-blue-50 border border-blue-200 rounded-md font-bold text-xs text-blue-700 uppercase tracking-widest hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition shadow-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Añadir otro cargo o puesto anterior
                    </button>
                </div>

                {{-- Plantilla Oculta JS --}}
                <template id="cargo-anterior-template">
                    <div class="cargo-item p-5 rounded-xl border border-gray-200 bg-gray-50/50 mt-4 relative animate-fade-in shadow-sm">
                        <button type="button" class="btn-remove-cargo absolute top-4 right-4 text-gray-400 hover:text-red-500 transition-colors bg-white rounded-full p-1" title="Eliminar cargo">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                        <h4 class="cargo-title font-bold text-sm mb-4 flex items-center gap-2" style="color: #02549E;">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            CARGO / PUESTO ANTERIOR #__DISPLAY_INDEX__
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 mb-1">Cargo o puesto anterior</label>
                                <input type="text" name="cargos_anteriores[__INDEX__][cargo]" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Cargo">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 mb-1">Institución</label>
                                <input type="text" name="cargos_anteriores[__INDEX__][institucion]" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Institución">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 mb-1">Ciudad/País</label>
                                <input type="text" name="cargos_anteriores[__INDEX__][ciudad_pais]" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Ciudad/País">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 mb-1">Desde</label>
                                <input type="text" name="cargos_anteriores[__INDEX__][desde]" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Año">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 mb-1">Hasta</label>
                                <input type="text" name="cargos_anteriores[__INDEX__][hasta]" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Año">
                            </div>
                        </div>
                        <div class="mb-4 mt-2">
                            <label class="block text-xs font-semibold text-gray-500 mb-3">Describa las 3 funciones principales que desempeñó</label>
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <span class="text-gray-400 font-bold text-lg">•</span>
                                    <input type="text" name="cargos_anteriores[__INDEX__][funciones][0]" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Función principal 1">
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="text-gray-400 font-bold text-lg">•</span>
                                    <input type="text" name="cargos_anteriores[__INDEX__][funciones][1]" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Función principal 2">
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="text-gray-400 font-bold text-lg">•</span>
                                    <input type="text" name="cargos_anteriores[__INDEX__][funciones][2]" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Función principal 3">
                                </div>
                            </div>
                        </div>
                    </div>
                </template>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const container = document.getElementById('cargos-anteriores-container');
                        const templateHtml = document.getElementById('cargo-anterior-template').innerHTML;
                        const btnAdd = document.getElementById('btn-add-cargo-anterior');
                        let index = 1;

                        if (btnAdd && container && templateHtml) {
                            btnAdd.addEventListener('click', function() {
                                if (container.children.length >= 3) {
                                    alert('Puede añadir un máximo de 3 cargos anteriores adicionales.');
                                    return;
                                }

                                // Replace placeholders. __INDEX__ for array logic, __DISPLAY_INDEX__ for UI numbering
                                let newHtml = templateHtml.replace(/__INDEX__/g, index);
                                newHtml = newHtml.replace(/__DISPLAY_INDEX__/g, index + 1);

                                const wrapper = document.createElement('div');
                                wrapper.innerHTML = newHtml;
                                const newEl = wrapper.firstElementChild;

                                // Setup remove button
                                const btnRemove = newEl.querySelector('.btn-remove-cargo');
                                if (btnRemove) {
                                    btnRemove.addEventListener('click', function(e) {
                                        // Update index numbering of remaining items if we wanted to be super exact, 
                                        // but just deleting is fine for the form builder as long as array indexes don't conflict.
                                        e.target.closest('.cargo-item').remove();
                                    });
                                }

                                container.appendChild(newEl);
                                index++;
                            });
                        }
                    });
                </script>

            </div>
        </section>

        {{-- ===== SECTION 7: JUSTIFICACIÓN ===== --}}
        <section class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="px-6 py-3 flex items-center gap-3" style="background: linear-gradient(135deg, #02549E, #0367A6);">
                <span class="bg-white text-sm font-bold w-8 h-8 flex items-center justify-center rounded-full" style="color: #02549E;">7</span>
                <h3 class="text-white font-bold text-lg tracking-wide">MOTIVACIONES Y APLICABILIDAD POST-CURSO</h3>
            </div>
            <div class="p-6 space-y-5">
                <div>
                    <label class="block text-sm font-semibold mb-2" style="color: #0367A6;">
                        a) Explique las razones por las cuales desea participar en el Curso:
                    </label>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="text-gray-400 font-bold text-lg">•</span>
                            <input type="text" name="razones_participacion[0]" value="{{ old('razones_participacion.0') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Razón 1">
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-gray-400 font-bold text-lg">•</span>
                            <input type="text" name="razones_participacion[1]" value="{{ old('razones_participacion.1') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Razón 2">
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-gray-400 font-bold text-lg">•</span>
                            <input type="text" name="razones_participacion[2]" value="{{ old('razones_participacion.2') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Razón 3">
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-2" style="color: #0367A6;">
                        b) ¿Cómo aplicaría usted los conocimientos y experiencias obtenidas en este curso a favor de su institución, comunidad o país?
                    </label>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="text-gray-400 font-bold text-lg">•</span>
                            <input type="text" name="aprovechamiento_conocimientos[0]" value="{{ old('aprovechamiento_conocimientos.0') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Aplicación 1">
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-gray-400 font-bold text-lg">•</span>
                            <input type="text" name="aprovechamiento_conocimientos[1]" value="{{ old('aprovechamiento_conocimientos.1') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Aplicación 2">
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-gray-400 font-bold text-lg">•</span>
                            <input type="text" name="aprovechamiento_conocimientos[2]" value="{{ old('aprovechamiento_conocimientos.2') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:border-transparent transition-all" placeholder="Aplicación 3">
                        </div>
                    </div>
                </div>

                {{-- Declaración --}}
                <div class="p-4 rounded-xl border-l-4" style="border-color: #f3762b; background: #fef7f2;">
                    <div class="flex items-start gap-3">
                        <input type="checkbox" name="declaracion_verdad" id="declaracion" required class="w-5 h-5 mt-0.5 shrink-0 rounded" style="accent-color: #f3762b;">
                        <label for="declaracion" class="text-sm font-medium text-gray-700 cursor-pointer">
                            Declaro que la información constante en esta solicitud es verdadera. <span class="text-red-500">*</span>
                        </label>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===== SECTION 8: HOJA DE VIDA (CV) ===== --}}
        <section class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100">
            <div class="px-6 py-3 flex items-center gap-3" style="background: linear-gradient(135deg, #02549E, #0367A6);">
                <span class="bg-white text-sm font-bold w-8 h-8 flex items-center justify-center rounded-full" style="color: #02549E;">8</span>
                <h3 class="text-white font-bold text-lg tracking-wide">HOJA DE VIDA ACTUALIZADA (CV)</h3>
            </div>
            <div class="p-6">

                {{-- Nota Aclaratoria --}}
                <div class="mb-5 p-4 rounded-xl border-l-4 shadow-sm" style="border-color: #f3762b; background: #fef7f2;">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 mt-0.5 shrink-0" style="color: #f3762b;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-sm text-gray-800 leading-relaxed">
                            <strong style="color: #02549E;">Nota Aclaratoria:</strong> Su <strong>Hoja de Vida (CV)</strong> debe incluir obligatoriamente una <strong>fotografía actualizada de su rostro</strong>. De manera opcional, puede anexar una copia de su identificación o pasaporte. Toda esta documentación debe estar unificada en <strong>un único archivo PDF</strong>.
                        </p>
                    </div>
                </div>

                <div class="relative">
                    <label for="cv_archivo" class="block cursor-pointer">
                        <div id="cv-drop-zone" class="border-2 border-dashed rounded-xl p-8 text-center transition-all duration-300 hover:border-[#0367A6] hover:bg-blue-50/30" style="border-color: #0367A633;">
                            <div class="flex flex-col items-center gap-3">
                                <div class="w-16 h-16 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #f3762b20, #0367A620);">
                                    <svg class="w-8 h-8" style="color: #0367A6;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-sm text-gray-700">Haga clic o arrastre su archivo aquí</p>
                                    <p class="text-xs text-gray-400 mt-1">Solo archivos <strong style="color: #f3762b;">PDF</strong> — Peso máximo: <strong style="color: #f3762b;">2 MB</strong></p>
                                </div>
                                <span id="cv-file-name" class="text-xs font-medium hidden px-3 py-1 rounded-full" style="background: #0367A615; color: #0367A6;"></span>
                            </div>
                        </div>
                    </label>
                    <input type="file" name="cv_archivo" id="cv_archivo" accept=".pdf" required
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                </div>
                @error('cv_archivo') <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span> @enderror
            </div>
        </section>

        {{-- ===== OPT-IN INFORMACION COMERCIAL ===== --}}
        <div class="mb-8 max-w-3xl mx-auto p-5 rounded-xl border border-blue-100 bg-blue-50/50 shadow-sm transition-all hover:shadow-md">
            <div class="flex items-start gap-3">
                <input type="checkbox" name="recibir_informacion" id="recibir_informacion" value="1" {{ old('recibir_informacion') ? 'checked' : '' }} class="w-5 h-5 mt-0.5 shrink-0 rounded" style="accent-color: #0367A6;">
                <label for="recibir_informacion" class="text-sm font-medium text-gray-700 cursor-pointer leading-relaxed">
                    ¿Le interesaría recibir información periódica sobre las actividades y cursos realizados por el CEPEIGE? <span class="text-gray-400 font-normal italic">(Opcional)</span>
                </label>
            </div>
        </div>

        {{-- ===== SUBMIT BUTTON ===== --}}
        <div class="flex justify-center pb-8">
            <button type="submit"
                class="group relative px-12 py-4 text-white font-bold text-lg rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 overflow-hidden"
                style="background: linear-gradient(135deg, #f3762b, #e06520);">
                <span class="relative z-10 flex items-center gap-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    ENVIAR INSCRIPCIÓN
                </span>
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
            </button>
        </div>
    </form>

    {{-- ===== FOOTER ===== --}}
    <footer class="text-center py-6 text-xs text-gray-400">
        <div class="h-1 max-w-5xl mx-auto mb-6" style="background: linear-gradient(90deg, #02549E 0%, #0367A6 40%, #f3762b 100%);"></div>
        <p>&copy; {{ date('Y') }} CEPEIGE - Centro Panamericano de Estudios e Investigaciones Geográficas</p>
        <p class="mt-1">Quito - Ecuador | Desde 1973</p>
    </footer>

    {{-- Auto-hide success message --}}
    <script>
        // Auto-hide success message
        const alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 5000);
        }

        // CV file upload feedback
        const cvInput = document.getElementById('cv_archivo');
        const cvFileName = document.getElementById('cv-file-name');
        const cvDropZone = document.getElementById('cv-drop-zone');

        if (cvInput) {
            cvInput.addEventListener('change', function() {
                if (this.files.length > 0) {
                    const file = this.files[0];
                    const sizeMB = (file.size / 1024 / 1024).toFixed(2);

                    if (file.type !== 'application/pdf') {
                        cvFileName.textContent = '⚠ Solo se permiten archivos PDF';
                        cvFileName.style.background = '#fee2e2';
                        cvFileName.style.color = '#dc2626';
                        cvFileName.classList.remove('hidden');
                        this.value = '';
                        return;
                    }

                    if (file.size > 2 * 1024 * 1024) {
                        cvFileName.textContent = '⚠ El archivo excede 2 MB (' + sizeMB + ' MB)';
                        cvFileName.style.background = '#fee2e2';
                        cvFileName.style.color = '#dc2626';
                        cvFileName.classList.remove('hidden');
                        this.value = '';
                        return;
                    }

                    cvFileName.textContent = '📄 ' + file.name + ' (' + sizeMB + ' MB)';
                    cvFileName.style.background = '#0367A615';
                    cvFileName.style.color = '#0367A6';
                    cvFileName.classList.remove('hidden');
                    cvDropZone.style.borderColor = '#0367A6';
                    cvDropZone.style.background = '#f0f7ff';
                } else {
                    cvFileName.classList.add('hidden');
                    cvDropZone.style.borderColor = '#0367A633';
                    cvDropZone.style.background = '';
                }
            });
        }
    </script>
</body>

</html>