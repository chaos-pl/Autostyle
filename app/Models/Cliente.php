<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cliente extends Model
{
    use HasFactory;

    // Aquí defines qué campos pueden llenarse masivamente
    protected $fillable = ['persona_id', 'direccion'];


    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

}
