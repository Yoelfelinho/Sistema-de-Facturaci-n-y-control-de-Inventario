<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormaDePago extends Model
{
    protected $table = 'forma_de_pago';
    protected $primaryKey = 'id_formapago';
    public $timestamps = false;

    protected $fillable = [
        'Descripcion_formapago'
    ];

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'id_formapago', 'id_formapago');
    }
}
