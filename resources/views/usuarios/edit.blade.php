@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Editar Usuario</h2>

    <form method="POST" action="{{ route('usuarios.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Nombre</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border px-4 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border px-4 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Contraseña (dejar en blanco para mantener la actual)</label>
            <input type="password" name="password" class="w-full border px-4 py-2 rounded">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('usuarios.index') }}" class="text-gray-600 hover:underline">← Volver</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Actualizar</button>
        </div>
    </form>
</div>
@endsection
