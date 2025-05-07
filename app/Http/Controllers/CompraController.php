<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function create(Producto $producto)
    {
        return view('compras.create', compact('producto'));
    }
    
    public function store(Request $request, Producto $producto)
    {
        $data = $request->validate([
            'cantidad' => 'required|integer|min:1',
            'proveedor' => 'nullable|string|max:255',
        ]);
    
        $producto->compras()->create([
            'cantidad' => $data['cantidad'],
            'proveedor' => $data['proveedor'],
            'fecha_compra' => now(),
        ]);
    
        return redirect()->route('productos.show', $producto)->with('success', 'Compra registrada.');
    }

    
}
