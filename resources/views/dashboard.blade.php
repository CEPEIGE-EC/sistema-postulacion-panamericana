<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            <h2 class="font-semibold text-xl leading-tight" style="color: #0367a6;">
                {{ __('Inscripciones Recibidas') }}
            </h2>
            <a href="{{ route('inscripciones.export.excel') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-bold text-xs text-white uppercase tracking-widest hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md" style="background: linear-gradient(135deg, #f3762b, #e65c00);">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Exportar Excel
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    
                    @if(session('error'))
                        <div class="mb-4 bg-red-50 border border-red-300 text-red-800 px-4 py-3 rounded-lg text-sm">
                            {{ session('error') }}
                        </div>
                    @endif

                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-white uppercase bg-gray-50" style="background: linear-gradient(135deg, #02549E, #0367A6);">
                            <tr>
                                <th scope="col" class="px-6 py-3 rounded-tl-lg">#</th>
                                <th scope="col" class="px-6 py-3">Fecha</th>
                                <th scope="col" class="px-6 py-3">Nombre Completo</th>
                                <th scope="col" class="px-6 py-3">Correo Personal</th>
                                <th scope="col" class="px-6 py-3">País</th>
                                <th scope="col" class="px-6 py-3 text-center">Estado</th>
                                <th scope="col" class="px-6 py-3 rounded-tr-lg text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($inscripciones as $inscripcion)
                                <tr class="bg-white border-b hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 font-medium">{{ $inscripcion->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $inscripcion->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $inscripcion->nombres }} {{ $inscripcion->apellido_paterno }} {{ $inscripcion->apellido_materno }}</td>
                                    <td class="px-6 py-4">{{ $inscripcion->correo_personal }}</td>
                                    <td class="px-6 py-4">{{ $inscripcion->pais }}</td>
                                    <td class="px-6 py-4 text-center">
                                        @if($inscripcion->estado === 'Aprobado')
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 border border-green-200">Aprobado</span>
                                        @elseif($inscripcion->estado === 'Rechazado')
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 border border-red-200">Rechazado</span>
                                        @else
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 border border-blue-200">Pendiente</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center flex justify-center items-center gap-2">
                                        <a href="{{ route('inscripciones.show', $inscripcion->id) }}" title="Ver Detalle" class="inline-flex items-center p-1.5 bg-white border border-gray-300 rounded-md text-gray-700 shadow-sm hover:bg-gray-50 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        </a>
                                        <a href="{{ route('inscripciones.edit', $inscripcion->id) }}" title="Editar" class="inline-flex items-center p-1.5 bg-white border border-gray-300 rounded-md text-gray-700 shadow-sm hover:bg-blue-50 hover:text-blue-600 hover:border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </a>
                                        <form action="{{ route('inscripciones.destroy', $inscripcion->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Está seguro de eliminar esta inscripción permanentemente? Esto borrará el CV y todo su historial.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Eliminar" class="inline-flex items-center p-1.5 bg-white border border-gray-300 rounded-md text-gray-700 shadow-sm hover:bg-red-50 hover:text-red-600 hover:border-red-300 focus:outline-none focus:ring-2 focus:ring-red-500 transition">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                        No se han registrado inscripciones todavía.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $inscripciones->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
