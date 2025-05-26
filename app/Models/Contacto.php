<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacto extends Model
{   
    protected $table = 'contactos';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'mensaje',
        'fecha',     
    ];

    protected $casts = [
        'fecha' => 'datetime',
        
    ];

}
