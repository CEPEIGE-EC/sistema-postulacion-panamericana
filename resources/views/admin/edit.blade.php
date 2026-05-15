<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl leading-tight" style="color: #0367a6;">
                {{ __('Resolución de Postulación') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900 underline flex items-center gap-1 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Volver al listado
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Encabezado con Identidad CEPEIGE --}}
            <div class="bg-white rounded-t-2xl overflow-hidden shadow-md border border-gray-100 border-b-0">
                <div class="h-3 w-full" style="background: linear-gradient(90deg, #f3762b 0%, #0367A6 100%);"></div>
                <div class="p-6 sm:p-8 flex flex-col md:flex-row items-center justify-between gap-6 bg-slate-50">
                    <div class="flex flex-col md:flex-row items-center gap-6 text-center md:text-left">
                        <div class="hidden md:block h-16 w-px bg-gray-300"></div>
                        <div>
                            <h2 class="text-xl sm:text-2xl font-black tracking-tight leading-tight" style="color: #02549E; font-family: 'Montserrat', sans-serif;">
                                CENTRO PANAMERICANO DE ESTUDIOS E INVESTIGACIONES GEOGRÁFICAS
                            </h2>
                            <p class="text-gray-600 font-semibold mt-1 tracking-wide uppercase text-sm">Edición de Datos del Postulante</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Formulario Principal --}}
            <div class="bg-white overflow-hidden shadow-xl rounded-b-2xl border border-gray-100 p-8 sm:p-10 relative">
                <!-- Watermark Decorativo -->
                <div class="absolute -right-20 -top-20 opacity-5 pointer-events-none">
                    <svg class="w-96 h-96" style="color: #0367A6;" fill="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l9-5-9-5-9 5 9 5z"/></svg>
                </div>

                <div class="mb-10 text-center md:text-left border-b border-gray-100 pb-5">
                    <h1 class="text-3xl font-extrabold text-gray-800">
                        Postulante: <span style="color: #f3762b;">{{ $inscripcion->nombres }} {{ $inscripcion->apellido_paterno }}</span>
                    </h1>
                    <div class="flex items-center justify-center md:justify-start gap-4 mt-3 text-sm text-gray-500 font-medium">
                        <span class="bg-gray-100 px-3 py-1 rounded-md">ID: #{{ str_pad($inscripcion->id, 5, '0', STR_PAD_LEFT) }}</span>
                        <span>País: {{ $inscripcion->pais }}</span>
                        <span>Registrado el {{ $inscripcion->created_at->format('d/m/Y') }}</span>
                    </div>
                </div>

                <form action="{{ route('inscripciones.update', $inscripcion) }}" method="POST" class="space-y-12 relative z-10">
                    @csrf
                    @method('PUT')

                    {{-- SECCIÓN DATOS --}}
                    <section>
                        <div class="flex items-center gap-3 mb-6">
                            <span class="flex items-center justify-center w-8 h-8 rounded-full text-white font-bold shadow-sm" style="background-color: #0367A6;">1</span>
                            <h3 class="text-xl font-bold" style="color: #02549E;">Corrección de Datos Personales</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 sm:p-8 rounded-2xl border border-gray-200 bg-gray-50 shadow-inner">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Nombres <span class="text-red-500">*</span></label>
                                <input type="text" name="nombres" value="{{ old('nombres', $inscripcion->nombres) }}" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition shadow-sm" required>
                                @error('nombres') <span class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Apellido Paterno <span class="text-red-500">*</span></label>
                                <input type="text" name="apellido_paterno" value="{{ old('apellido_paterno', $inscripcion->apellido_paterno) }}" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition shadow-sm" required>
                                @error('apellido_paterno') <span class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Apellido Materno <span class="text-red-500">*</span></label>
                                <input type="text" name="apellido_materno" value="{{ old('apellido_materno', $inscripcion->apellido_materno) }}" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition shadow-sm" required>
                                @error('apellido_materno') <span class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Correo Personal <span class="text-red-500">*</span></label>
                                <input type="email" name="correo_personal" value="{{ old('correo_personal', $inscripcion->correo_personal) }}" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition shadow-sm" required>
                                @error('correo_personal') <span class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Correo Institucional</label>
                                <input type="email" name="correo_institucional" value="{{ old('correo_institucional', $inscripcion->correo_institucional) }}" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition shadow-sm">
                                @error('correo_institucional') <span class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Teléfono Contacto <span class="text-red-500">*</span></label>
                                <input type="text" name="telefono_contacto" value="{{ old('telefono_contacto', $inscripcion->telefono_contacto) }}" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition shadow-sm" required>
                                @error('telefono_contacto') <span class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Teléfono Alterno</label>
                                <input type="text" name="telefono_alterno" value="{{ old('telefono_alterno', $inscripcion->telefono_alterno) }}" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition shadow-sm">
                                @error('telefono_alterno') <span class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </section>



                    {{-- BOTONERA --}}
                    <div class="pt-8 pb-4 mt-8 border-t border-gray-200 flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="text-center md:text-left">
                            <p class="text-sm font-semibold text-gray-600">Registro Original:</p>
                            <p class="text-xs text-gray-400 mt-1">{{ $inscripcion->created_at->format('d \d\e F, Y \a \l\a\s H:i') }}</p>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row items-center gap-4 w-full md:w-auto">
                            <a href="{{ route('dashboard') }}" class="px-8 py-3.5 border-2 border-gray-200 rounded-full text-gray-600 hover:bg-gray-50 hover:text-gray-900 hover:border-gray-300 transition font-bold text-sm w-full sm:w-auto text-center tracking-wide">
                                CANCELAR
                            </a>
                            <button type="submit" class="px-8 py-3.5 rounded-full text-white font-bold text-sm tracking-wide shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5 w-full sm:w-auto flex items-center justify-center gap-2" style="background: linear-gradient(135deg, #f3762b, #e65c00);">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                GUARDAR
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
