<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'active',
    ];

    // Definir el mutador para el estado de activación
    public function setActiveAttribute($value)
    {
        $this->attributes['active'] = (bool) $value;
    }

    // Método para verificar si el usuario está activo
    public function isActive()
    {
        return $this->active;
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
        'active' => 'boolean',
    ];
}
