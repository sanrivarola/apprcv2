<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $primaryKey = 'id_horario';
    public $incrementing = true;
    protected $keyType = 'int';

    use HasFactory;

    protected $table = 'horarios';

    protected $fillable = [
        'dia',
        'horarioentrada',
        'horariosalida',
        'ausente',
        'user_id',
    ];

    protected $casts = [
        'dia' => 'date:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
