<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacto extends Model
{

    // Nombre de la tabla si no es la convención 'contactos' (aquí es opcional)
    protected $table = 'contactos';

    // Campos que se pueden llenar con create() o update()
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'mensaje',
        'fecha',
        
    ];

    // Cast de tipos de datos
    protected $casts = [
        'fecha' => 'datetime',
        
    ];

}
