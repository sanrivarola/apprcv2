<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubareaInventario extends Model
{
    // Si la tabla se llama 'subarea_inventario' y no 'subarea_inventarios'
    protected $table = 'subarea_inventario';

    protected $fillable = ['nombre', 'area_inventario_id'];

    // Relación con el área (opcional, pero útil)
    public function area()
    {
        return $this->belongsTo(AreaInventario::class, 'area_inventario_id');
    }
}
