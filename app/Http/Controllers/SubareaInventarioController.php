<?php

namespace App\Http\Controllers;

use App\Models\SubareaInventario;
use App\Models\AreaInventario;
use Illuminate\Http\Request;

class SubareaInventarioController extends Controller
{
    // Mostrar formulario para crear subárea
    public function create($area_id)
    {
        $area = AreaInventario::findOrFail($area_id);
        return view('subareas.create', compact('area'));
    }

    // Guardar subárea
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'area_inventario_id' => 'required|exists:area_inventario,id',
        ]);

        SubareaInventario::create([
            'nombre' => $request->input('nombre'),
            'area_inventario_id' => $request->input('area_inventario_id'),
        ]);

        return redirect()->route('areas.index')->with('success', 'Subárea creada exitosamente.');

    }

    // Mostrar formulario para editar
public function edit(SubareaInventario $subarea)
{
    return view('subareas.edit', compact('subarea'));
}

// Actualizar subárea
public function update(Request $request, SubareaInventario $subarea)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
    ]);

    $subarea->update([
        'nombre' => $request->input('nombre'),
    ]);

    return redirect()->route('areas.index')->with('success', 'Subárea actualizada correctamente.');
}

// Eliminar subárea
public function destroy(SubareaInventario $subarea)
{
    $subarea->delete();

    return redirect()->route('areas.index')->with('success', 'Subárea eliminada correctamente.');
}

}
