@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Productos - Inventario</h2>
            <a href="{{ route('productos.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                + Nuevo Producto
            </a>
        </div>

        <form method="GET" action="{{ route('productos.index') }}" class="mb-4 space-y-2 md:space-y-0 md:flex md:items-center md:gap-4">
            <select name="per_page" onchange="this.form.submit()" class="px-4 py-2 border border-gray-300 rounded">
                @foreach([10, 25, 50, 100] as $size)
                    <option value="{{ $size }}" {{ request('per_page', 10) == $size ? 'selected' : '' }}>
                        {{ $size }} por página
                    </option>
                @endforeach
            </select>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar por nombre..."
                class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded">
        
            <select name="area_id" id="area_id" class="px-4 py-2 border border-gray-300 rounded">
                <option value="">-- Todas las áreas --</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}" {{ request('area_id') == $area->id ? 'selected' : '' }}>
                        {{ $area->nombre }}
                    </option>
                @endforeach
            </select>
        
            <select name="subarea_id" id="subarea_id" class="px-4 py-2 border border-gray-300 rounded">
                <option value="">-- Todas las subáreas --</option>
                @foreach($subareas as $subarea)
                    <option value="{{ $subarea->id }}" data-area="{{ $subarea->area_inventario_id }}" {{ request('subarea_id') == $subarea->id ? 'selected' : '' }}>
                        {{ $subarea->nombre }}
                    </option>
                @endforeach
            </select>
        
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Filtrar
            </button>
        </form>
        

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Nombre</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Stock</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Área</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Subárea</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($productos as $producto)
                        <tr>
                            <td class="px-4 py-2">{{ $producto->nombre }}</td>
                            <td class="px-4 py-2">{{ $producto->stock }}</td>
                            <td class="px-4 py-2">{{ $producto->areaInventario->nombre ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $producto->subareaInventario->nombre ?? '-' }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('productos.show', $producto) }}" class="text-blue-600 hover:underline">Ver</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-gray-500">No se encontraron productos.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $productos->appends(request()->query())->links() }}
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const areaSelect = document.getElementById('area_id');
        const subareaSelect = document.getElementById('subarea_id');
        const allOptions = Array.from(subareaSelect.options);

        function filterSubareas() {
            const selectedArea = areaSelect.value;

            subareaSelect.innerHTML = '';
            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = '-- Todas las subáreas --';
            subareaSelect.appendChild(defaultOption);

            allOptions.forEach(option => {
                const areaId = option.getAttribute('data-area');
                if (!areaId || areaId === selectedArea) {
                    subareaSelect.appendChild(option);
                }
            });
        }

        areaSelect.addEventListener('change', filterSubareas);

        // Ejecutar al cargar para reflejar selección previa
        filterSubareas();
    });
</script>
@endpush

@endsection
