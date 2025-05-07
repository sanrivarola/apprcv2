{{-- resources/views/horarios/history.blade.php --}}
@extends('layouts.app')

@section('header')
  <h2 class="text-xl font-semibold text-gray-800 leading-tight">
    Historial de Horarios
  </h2>
@endsection

@section('content')
<div class="py-12">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">

    @if(session('success'))
      <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-4 py-2 text-left text-sm font-semibold">Fecha</th>
            <th class="px-4 py-2 text-left text-sm font-semibold">Entrada</th>
            <th class="px-4 py-2 text-left text-sm font-semibold">Salida</th>
            <th class="px-4 py-2 text-left text-sm font-semibold">Ausente</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @forelse($registros as $h)
            <tr>
              <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">
                {{ $h->dia->format('d-m-Y') }}
              </td>
              <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">
                {{ $h->horarioentrada }}
              </td>
              <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">
                {{ $h->horariosalida ?? '—' }}
              </td>
              <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-700">
                {{ $h->ausente ?? 'No' }}
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                No hay registros de horarios aún.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-4">
      {{ $registros->withQueryString()->links() }}
    </div>
  </div>
</div>
@endsection
