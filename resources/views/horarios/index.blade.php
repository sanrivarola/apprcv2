@extends('layouts.app')

@section('header')
  <h2 class="text-xl font-semibold text-gray-800 leading-tight">
    Horarios
  </h2>
@endsection

@section('content')
@php
  use Carbon\Carbon;
  $now         = Carbon::now()->setTimezone('America/Argentina/Buenos_Aires');
  $DateAndTime = $now->format('d-m-Y h:i a');
@endphp

<div class="max-w-3xl mx-auto py-12 space-y-6">

  {{-- 1) No hay registro hoy: mostrar ENTRADA + botón Ausente --}}
  @if(!$row)
    <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col sm:flex-row items-center sm:justify-between border-2 border-lime-500">
      <div>
        <h3 class="text-lg font-semibold text-lime-600">Entrada</h3>
        <p class="mt-1 text-sm text-gray-400">Fecha y hora:</p>
        <p class="text-2xl sm:text-2xl font-bold text-gray-500">
          {{ $DateAndTime }}</p>
      </div>
      <div class="mt-4 sm:mt-0 flex space-x-3">
        <form method="POST" action="{{ route('horario.entrada') }}">
          @csrf
          <input type="hidden" name="horarioentrada" value="{{ $DateAndTime }}">
          <button
            type="submit"
            class="px-5 py-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition"
          >Registrar Entrada</button>
        </form>
        <form method="POST" action="{{ route('horario.ausente') }}">
          @csrf
          <button
            type="submit"
            class="px-5 py-2 bg-red-100 text-red-600 rounded-full hover:bg-red-200 transition"
          >Marcar Ausente</button>
        </form>
      </div>

  {{-- 2) Hay registro, no es ausente, y aún no tiene salida: mostrar SALIDA --}}
  @elseif($row->ausente !== 'SI' && !$row->horariosalida)
    <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col sm:flex-row items-center sm:justify-between border-2 border-amber-400">
      <div>
        <h3 class="text-lg font-semibold text-amber-500">Salida</h3>
        <p class="mt-1 text-sm text-gray-600">Fecha y hora:</p>
        <p class="text-2xl sm:text-2xl font-bold text-gray-500">{{ $DateAndTime }}</p>
      </div>
      <form method="POST" action="{{ route('horario.salida') }}" class="mt-4 sm:mt-0">
        @csrf
        <input type="hidden" name="id_horario" value="{{ $row->id_horario }}">
        <input type="hidden" name="horariosalida" value="{{ $DateAndTime }}">
        <button
          type="submit"
          class="px-5 py-2 bg-yellow-500 text-white rounded-full hover:bg-yellow-600 transition"
        >Registrar Salida</button>
      </form>

  {{-- 3) Ya completado o marcado ausente: mostrar mensaje final --}}
  @else
    <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col sm:flex-row items-center sm:justify-between border-2 border-orange-700">
      @if($row->ausente === 'SI')
        <div class="flex items-center space-x-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"/>
          </svg>
          <span class="text-orange-700 font-semibold">Has marcado el día como ausente.</span>
        </div>
      @else
        <div class="flex items-center space-x-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-orange-700" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                  d="M5 13l4 4L19 7"/>
          </svg>
          <span class="text-orange-700 font-semibold p-10">Tu entrada y salida ya están registradas.</span>
        </div>
        <a
          href="{{ route('horario.edit', $row->id_horario) }}"
          class="mt-4 sm:mt-0 inline-block px-5 py-2 bg-orange-700 text-white rounded-full hover:bg-orange-800 transition"
        >Editar Horario</a>
      @endif
  @endif

</div>
@endsection
