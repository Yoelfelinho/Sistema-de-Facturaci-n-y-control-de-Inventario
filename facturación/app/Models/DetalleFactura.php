<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    protected $table = 'detalle_factura';
    public $timestamps = false;

    protected $fillable = [
        'Nnm_factura',
        'cod_articulo',
        'cantidad',
        'precio',
        'subtotal'
    ];

    public function articulo()
    {
        return $this->belongsTo(Articulo::class, 'cod_articulo', 'cod_articulo');
    }
}
