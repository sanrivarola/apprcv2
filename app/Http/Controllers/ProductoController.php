<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\AreaInventario;
use App\Models\SubareaInventario;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $areaId = $request->input('area_id');
        $subareaId = $request->input('subarea_id');

        $productos = Producto::with('areaInventario', 'subareaInventario')
            ->when($search, fn($q) => $q->where('nombre', 'like', '%' . $search . '%'))
            ->when($areaId, fn($q) => $q->where('area_inventario_id', $areaId))
            ->when($subareaId, fn($q) => $q->where('subarea_inventario_id', $subareaId))
            ->orderBy('nombre')
            ->paginate($request->input('per_page', 10))
            ->appends([
                'search' => $search,
                'area_id' => $request->input('area_id'),
                'subarea_id' => $request->input('subarea_id'),
                'per_page' => $request->input('per_page', 10),
            ]);
            

        $areas = AreaInventario::orderBy('nombre')->get();
        $subareas = SubareaInventario::orderBy('nombre')->get();

        return view('productos.index', compact('productos', 'areas', 'subareas'));
    }

    public function create()
    {
        $areas = AreaInventario::orderBy('nombre')->get();
        $subareas = SubareaInventario::orderBy('nombre')->get();

        return view('productos.create', compact('areas', 'subareas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'detalle' => 'nullable|string',
            'vencimiento' => 'nullable|date',
            'stock_minimo' => 'required|integer',
            'stock' => 'required|integer',
            'area_inventario_id' => 'required|exists:area_inventario,id',
            'subarea_inventario_id' => 'required|exists:subarea_inventario,id',
        ]);

        Producto::create($data);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Producto $producto)
    {
        $producto->load(['historial', 'areaInventario', 'subareaInventario']);
        return view('productos.show', compact('producto'));
    }
}
