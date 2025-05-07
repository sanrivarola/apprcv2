{{-- resources/views/usuarios/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="py-12">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <h2 class="text-2xl font-bold mb-6">Agregar Nuevo Usuario</h2>

    <form action="{{ route('usuarios.store') }}" method="POST" class="space-y-6">
      @csrf

      {{-- Nombre --}}
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
        <input
          type="text"
          name="name"
          id="name"
          value="{{ old('name') }}"
          required
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('name')
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      {{-- Email --}}
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input
          type="email"
          name="email"
          id="email"
          value="{{ old('email') }}"
          required
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('email')
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      {{-- Contraseña --}}
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
        <input
          type="password"
          name="password"
          id="password"
          required
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('password')
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      {{-- Rol --}}
      <div>
        <label for="role" class="block text-sm font-medium text-gray-700">Rol</label>
        <select
          name="role"
          id="role"
          required
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        >
          <option value="editor" {{ old('role') === 'editor' ? 'selected' : '' }}>Editor</option>
          <option value="admin"  {{ old('role') === 'admin'  ? 'selected' : '' }}>Administrador</option>
        </select>
        @error('role')
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      {{-- Botón --}}
      <div>
        <button
          type="submit"
          class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md shadow"
        >
          Crear Usuario
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
