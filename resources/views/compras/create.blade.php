@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto">
    <h2 class="text-xl font-bold mb-4">Nueva Compra para: {{ $producto->nombre }}</h2>

    <form method="POST" action="{{ route('compras.store', $producto) }}">
        @csrf
        <div class="mb-4">
            <label for="cantidad" class="block font-semibold mb-1">Cantidad</label>
            <input type="number" name="cantidad" required class="w-full border p-2 rounded">
        </div>
        <div class="mb-4">
            <label for="proveedor" class="block font-semibold mb-1">Proveedor</label>
            <input type="text" name="proveedor" class="w-full border p-2 rounded">
        </div>
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Registrar Compra</button>
    </form>
</div>
@endsection
