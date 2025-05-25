<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
     protected $table = 'personas';
     protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'correo',
        'foto',
        'tipo',
    ];
}
