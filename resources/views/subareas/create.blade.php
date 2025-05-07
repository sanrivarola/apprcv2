@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold mb-6 text-gray-800">Agregar Subárea a "{{ $area->nombre }}"</h1>

        <form action="{{ route('subareas.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="area_inventario_id" value="{{ $area->id }}">

            <!-- Nombre de la Subárea -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre de la Subárea</label>
                <input type="text" name="nombre" id="nombre" class="mt-2 block w-full px-4 py-3 text-gray-700 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-transparent" required>
                @error('nombre')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón de Enviar -->
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Guardar Subárea
                </button>
            </div>
        </form>
    </div>
@endsection
