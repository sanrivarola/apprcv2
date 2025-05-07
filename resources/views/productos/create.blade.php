@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Nuevo Producto</h1>

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block">Nombre</label>
            <input type="text" name="nombre" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block">Detalle</label>
            <textarea name="detalle" class="border p-2 w-full"></textarea>
        </div>

        <div class="mb-4">
            <label class="block">Vencimiento</label>
            <input type="date" name="vencimiento" class="border p-2 w-full">
        </div>

        <div class="mb-4">
            <label class="block">Stock mínimo</label>
            <input type="number" name="stock_minimo" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block">Stock inicial</label>
            <input type="number" name="stock" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block">Área Inventario (ID)</label>
            <input type="number" name="area_inventario_id" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block">Subárea Inventario (ID)</label>
            <input type="number" name="subarea_inventario_id" class="border p-2 w-full" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
    </form>
</div>
@endsection
