<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoProveedor extends Model
{
    //
    use SoftDeletes;

    use SoftDeletes;

    protected $table = 'producto_proveedor';
    protected $primaryKey = 'id';

    protected $fillable = [
        'producto_id',
        'proveedor_id',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

}
