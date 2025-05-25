<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias'; // opcional si sigue la convención
    protected $fillable = ['nombre'];
}
