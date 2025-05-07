<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaInventario extends Model
{
    protected $table = 'area_inventario';

    protected $primaryKey = 'id';

    public $timestamps = false; // si no usas los campos `created_at` y `updated_at`

    protected $fillable = [
        'nombre', // Solo estos campos pueden ser asignados masivamente
    ];

    public function subareas()
    {
        return $this->hasMany(SubareaInventario::class, 'area_inventario_id');
    }
}
