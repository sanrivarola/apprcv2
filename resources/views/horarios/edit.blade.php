{{-- resources/views/horarios/edit.blade.php --}}
@extends('layouts.app')

@section('header')
  <h2 class="text-xl font-semibold text-gray-800 leading-tight">
    Editar Horario
  </h2>
@endsection

@section('content')
@php
  use Carbon\Carbon;
  // Hora actual como placeholder para editar
  $now = Carbon::now()->setTimezone('America/Argentina/Buenos_Aires');
@endphp

<div class="max-w-xl mx-auto py-12">
  <div class="bg-white shadow rounded-lg p-6">

    <form method="POST" action="{{ route('horario.update', $horario->id_horario) }}">
      @csrf
      @method('PUT')

      {{-- Fecha (solo lectura) --}}
      <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Fecha</label>
        <input type="text"
               value="{{ $horario->dia->format('d-m-Y') }}"
               class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md cursor-not-allowed"
               disabled>
      </div>

      {{-- Entrada --}}
      <div class="mb-4">
        <label for="horarioentrada" class="block text-sm font-medium text-gray-700">
          Hora de Entrada
        </label>
        <input
          id="horarioentrada"
          name="horarioentrada"
          type="text"
          value="{{ old('horarioentrada', $horario->horarioentrada) }}"
          placeholder="{{ $now->format('h:i a') }}"
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm
                 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
        >
        @error('horarioentrada')
          <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
      </div>

      {{-- Salida --}}
      <div class="mb-4">
        <label for="horariosalida" class="block text-sm font-medium text-gray-700">
          Hora de Salida
        </label>
        <input
          id="horariosalida"
          name="horariosalida"
          type="text"
          value="{{ old('horariosalida', $horario->horariosalida) }}"
          placeholder="{{ $now->format('h:i a') }}"
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm
                 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
        >
        @error('horariosalida')
          <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
        @enderror
      </div>

      {{-- Ausente --}}
      <div class="mb-6 flex items-center">
        <input
          id="ausente"
          name="ausente"
          type="checkbox"
          value="SI"
          {{ old('ausente', $horario->ausente) === 'SI' ? 'checked' : '' }}
          class="h-4 w-4 text-red-600 border-gray-300 rounded"
        >
        <label for="ausente" class="ml-2 block text-sm text-gray-700">
          Marcar como ausente (omitirá entrada/salida)
        </label>
      </div>

      {{-- Botones --}}
      <div class="flex justify-end space-x-3">
        <a href="{{ route('horarios.index') }}"
           class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
          Cancelar
        </a>
        <button type="submit"
                class="px-4 py-2 bg-sky-700 text-white rounded hover:bg-sky-800 transition">
          Guardar cambios
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
