<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use SoftDeletes;

    protected $fillable = ['persona_id'];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
