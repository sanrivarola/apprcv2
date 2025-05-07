@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Editar Subárea</h2>

        <form action="{{ route('subareas.update', $subarea->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Nombre de la Subárea</label>
                <input type="text" name="nombre" class="w-full border-gray-300 rounded px-3 py-2" value="{{ $subarea->nombre }}" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Actualizar
            </button>
        </form>
    </div>
@endsection
