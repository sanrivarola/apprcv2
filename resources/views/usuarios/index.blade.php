@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Usuarios</h2>
            <a href="{{ route('usuarios.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">+ Agregar Usuario</a>
        </div>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-semibold">Nombre</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold">Email</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold">Estado</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">
                            <span class="text-sm {{ $user->active ? 'text-green-500' : 'text-red-500' }}">
                                {{ $user->active ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('usuarios.edit', $user->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                            |
                            <form action="{{ route('usuarios.toggleStatus', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-red-600 hover:underline">
                                    {{ $user->active ? 'Desactivar' : 'Activar' }}
                                </button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
