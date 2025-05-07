@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Editar Área de Inventario</h1>

        <form action="{{ route('areas.update', $area->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Área</label>
                <input type="text" name="nombre" id="nombre" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" value="{{ $area->nombre }}" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Actualizar Área
                </button>
            </div>
        </form>
    </div>
@endsection
