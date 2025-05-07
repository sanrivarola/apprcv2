<?php

namespace App\Http\Controllers;

use App\Models\AreaInventario;
use Illuminate\Http\Request;

class AreaInventarioController extends Controller
{
    // Mostrar las áreas
    public function index()
    {
        $areas = AreaInventario::with('subareas')->get();
        return view('areas.index', compact('areas'));
    }

    // Mostrar el formulario de creación
    public function create()
    {
        return view('areas.create');
    }

    // Almacenar un área
    public function store(Request $request)
    {
        // Crear el área
        AreaInventario::create([
            'nombre' => $request->nombre,
            'created_at' => now(),  // Asigna el timestamp actual
        ]);
        
        // Redirigir a la vista de index con un mensaje de éxito
        return redirect()->route('areas.index')->with('success', 'Área creada exitosamente');
    }

    // Mostrar el formulario de edición
    public function edit($id)
    {
        $area = AreaInventario::findOrFail($id);
        return view('areas.edit', compact('area'));
    }

    // Actualizar un área existente
    public function update(Request $request, $id)
    {
        $area = AreaInventario::findOrFail($id);
        $area->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('areas.index')->with('success', 'Área actualizada exitosamente');
    }

    // Eliminar un área
    public function destroy($id)
    {
        $area = AreaInventario::findOrFail($id);
        $area->delete();
        return redirect()->route('areas.index')->with('success', 'Área eliminada exitosamente');
    }
}
