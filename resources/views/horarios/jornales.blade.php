@extends('layouts.app')

@section('header')
  <h2 class="text-xl font-semibold text-gray-800 leading-tight">
    Jornales
  </h2>
@endsection

@section('content')
<div class="py-12">
  <div class="max-w-7xl mx-auto px-6 lg:px-8 space-y-6">

    {{-- Formulario de filtros --}}
    <form method="GET" action="{{ route('horarios.jornales') }}" class="flex flex-wrap gap-4 items-end">
      <div>
        <label class="block text-sm font-medium text-gray-700">Desde</label>
        <input type="date" name="from" value="{{ $from }}" class="mt-1 block w-full border-gray-300 rounded" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Hasta</label>
        <input type="date" name="to" value="{{ $to }}" class="mt-1 block w-full border-gray-300 rounded" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Usuario</label>
        <select name="user_id" class="mt-1 block w-full border-gray-300 rounded">
          <option value="">— Todos —</option>
          @foreach($users as $u)
            <option value="{{ $u->id }}" @selected($userId == $u->id)>{{ $u->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="flex space-x-2">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
          Filtrar
        </button>
        <a href="{{ route('horarios.jornales.export', request()->query()) }}"
           class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-900">
          Exportar PDF
        </a>
      </div>
    </form>

    {{-- Tabla de resultados --}}
    <div class="overflow-x-auto bg-white shadow rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-4 py-2 text-left text-sm font-semibold">Fecha</th>
            <th class="px-4 py-2 text-left text-sm font-semibold">Usuario</th>
            <th class="px-4 py-2 text-left text-sm font-semibold">Entrada</th>
            <th class="px-4 py-2 text-left text-sm font-semibold">Salida</th>
            <th class="px-4 py-2 text-left text-sm font-semibold">Ausente</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @forelse($registros as $h)
            <tr>
              <td class="px-4 py-2 text-sm text-gray-700">{{ $h->dia->format('d-m-Y') }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">{{ $h->user->name }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">{{ $h->horarioentrada ?? '—' }}</td>
              <td class="px-4 py-2 text-sm text-gray-700">{{ $h->horariosalida ?? '—' }}</td>
              <td class="px-4 py-2 text-sm">
                @if($h->ausente === 'SI')
                  <span class="px-2 py-1 bg-red-100 text-red-600 rounded-full text-xs">Sí</span>
                @else
                  <span class="px-2 py-1 bg-green-100 text-green-600 rounded-full text-xs">No</span>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                No se encontraron registros.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- Paginación --}}
    <div class="mt-4">
      {{ $registros->links() }}
    </div>

  </div>
</div>
@endsection
