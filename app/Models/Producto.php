<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Relación con el área de inventario
    public function areaInventario()
    {
        return $this->belongsTo(AreaInventario::class, 'area_inventario_id');
    }

    // Relación con la subárea de inventario
    public function subareaInventario()
    {
        return $this->belongsTo(SubareaInventario::class, 'subarea_inventario_id');
    }

    // Relación con el historial de stock
    public function historial()
    {
        return $this->hasMany(HistorialStock::class);
    }

    public function compras()
    {
        return $this->hasMany(Compra::class);
    }

    // Campos que pueden asignarse masivamente
    protected $fillable = [
        'nombre',
        'detalle',
        'vencimiento',
        'stock_minimo',
        'stock',
        'fecha_carga',
        'fecha_modificado',
        'area_inventario_id',
        'subarea_inventario_id',
    ];
}

