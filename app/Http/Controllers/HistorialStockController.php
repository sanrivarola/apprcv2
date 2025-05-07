<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\HistorialStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistorialStockController extends Controller
{
    public function entrada(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'cantidad' => 'required|integer|min:1',
            'observacion' => 'nullable|string',
        ]);

        $producto->increment('stock', $validated['cantidad']);

        HistorialStock::create([
            'producto_id' => $producto->id,
            'cantidad' => $validated['cantidad'],
            'tipo' => 'entrada',
            'user_id' => Auth::id(),
            'observacion' => $validated['observacion'] ?? null,
        ]);

        return back()->with('success', 'Entrada registrada');
    }

    public function salida(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'cantidad' => 'required|integer|min:1',
            'observacion' => 'nullable|string',
        ]);

        if ($producto->stock < $validated['cantidad']) {
            return back()->withErrors('Stock insuficiente');
        }

        $producto->decrement('stock', $validated['cantidad']);

        HistorialStock::create([
            'producto_id' => $producto->id,
            'cantidad' => $validated['cantidad'],
            'tipo' => 'salida',
            'user_id' => Auth::id(),
            'observacion' => $validated['observacion'] ?? null,
        ]);

        return back()->with('success', 'Salida registrada');
    }
}
