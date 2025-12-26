<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetalleFactura;

class Factura extends Model
{
    protected $table = 'factura';
    protected $primaryKey = 'Nnm_factura';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'Nnm_factura',
        'cod_cliente',
        'Nombre_empleado',
        'Fecha_facturacion',
        'id_formapago',
        'iva',
        'monto_iva',
        'total_factura',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cod_cliente', 'Documento');
    }

    public function formaPago()
    {
        return $this->belongsTo(FormaDePago::class, 'id_formapago', 'id_formapago');
    }

    // 🔥 RELACIÓN CLAVE PARA INVENTARIO
    public function detalles()
    {
        return $this->hasMany(
            DetalleFactura::class,
            'Nnm_factura',
            'Nnm_factura'
        );
    }
}
