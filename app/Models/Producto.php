<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    //
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'categoria_id',
        'imagen',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}
