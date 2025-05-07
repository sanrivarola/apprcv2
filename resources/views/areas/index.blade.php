@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-semibold text-gray-800">Áreas de Inventario</h1>
            <!-- Botón para agregar área -->
            <a href="{{ route('areas.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Agregar Área
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Área</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($areas as $area)
                        <!-- Fila principal del área -->
                        <tr class="border-b border-gray-200 bg-white">
                            <td class="px-6 py-4 text-sm font-medium text-gray-800">
                                {{ $area->nombre }}
                            </td>
                            <td class="px-6 py-4 text-sm space-x-2">
                                <!-- Editar área -->
                                <a href="{{ route('areas.edit', $area->id) }}" class="text-blue-600 hover:text-blue-800">
                                    <i class="fas fa-edit"></i> Editar
                                </a>

                                <!-- Eliminar área -->
                                <form action="{{ route('areas.destroy', $area->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta área y todas sus subáreas? Esta acción no se puede deshacer.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>

                                <!-- Agregar subárea -->
                                <a href="{{ route('subareas.create', ['area_id' => $area->id]) }}" class="text-green-600 hover:text-green-800">
                                    <i class="fas fa-plus"></i> Agregar Subárea
                                </a>
                            </td>
                        </tr>

                        <!-- Subáreas (si existen) -->
                        @if($area->subareas->count())
                            <tr class="bg-gray-50">
                                <td colspan="2" class="px-10 py-2">
                                    <ul class="list-disc list-inside text-sm text-gray-700 space-y-1">
                                        @foreach($area->subareas as $subarea)
                                            <li class="flex justify-between items-center">
                                                <span>{{ $subarea->nombre }}</span>
                                                <span class="space-x-2">
                                                    <!-- Editar subárea -->
                                                    <a href="{{ route('subareas.edit', $subarea->id) }}" class="text-blue-600 hover:text-blue-800 text-sm">
                                                        <i class="fas fa-edit"></i> Editar
                                                    </a>

                                                    <!-- Eliminar subárea -->
                                                    <form action="{{ route('subareas.destroy', $subarea->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta subárea?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-800 text-sm">
                                                            <i class="fas fa-trash-alt"></i> Eliminar
                                                        </button>
                                                    </form>
                                                </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
