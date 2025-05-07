@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-5xl mx-auto px-6 lg:px-8 bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Detalle del Producto</h1>
            <a href="{{ route('productos.index') }}" class="text-blue-600 hover:underline">&larr; Volver al listado</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
                <p><strong>Detalle:</strong> {{ $producto->detalle ?? '—' }}</p>
            </div>
            <div>
                <p><strong>Stock actual:</strong> {{ $producto->stock }}</p>
                <p><strong>Stock mínimo:</strong> {{ $producto->stock_minimo }}</p>
            </div>
        </div>

        @if($producto->stock <= $producto->stock_minimo)
            <a href="{{ route('compras.create', $producto) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Comprar</a>
        @endif

        <div class="border-t pt-6 mt-6">
            <h2 class="text-xl font-bold mb-2">Movimiento de Stock</h2>

            <form action="{{ route('stock.entrada', $producto) }}" method="POST" class="mb-4">
                @csrf
                <div class="flex flex-wrap gap-2 md:gap-4">
                    <input type="number" name="cantidad" class="border p-2 rounded w-full md:w-1/4" placeholder="Cantidad" required>
                    <input type="text" name="observacion" class="border p-2 rounded w-full md:w-1/2" placeholder="Observación (opcional)">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Entrada</button>
                </div>
            </form>

            <form action="{{ route('stock.salida', $producto) }}" method="POST">
                @csrf
                <div class="flex flex-wrap gap-2 md:gap-4">
                    <input type="number" name="cantidad" class="border p-2 rounded w-full md:w-1/4" placeholder="Cantidad" required>
                    <input type="text" name="observacion" class="border p-2 rounded w-full md:w-1/2" placeholder="Observación (opcional)">
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">Salida</button>
                </div>
            </form>
        </div>

        <div class="border-t pt-6 mt-8">
            <h2 class="text-xl font-bold mb-2">Historial de Stock</h2>

            @if($producto->historial->isEmpty())
                <p class="text-gray-600">No hay historial registrado.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto mt-4 border">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left">Tipo</th>
                                <th class="px-4 py-2 text-left">Cantidad</th>
                                <th class="px-4 py-2 text-left">Usuario</th>
                                <th class="px-4 py-2 text-left">Fecha</th>
                                <th class="px-4 py-2 text-left">Observación</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($producto->historial as $registro)
                                <tr class="border-t">
                                    <td class="px-4 py-2">{{ ucfirst($registro->tipo) }}</td>
                                    <td class="px-4 py-2">{{ $registro->cantidad }}</td>
                                    <td class="px-4 py-2">{{ $registro->user->name ?? 'Desconocido' }}</td>
                                    <td class="px-4 py-2">{{ $registro->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="px-4 py-2">{{ $registro->observacion ?? '—' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
