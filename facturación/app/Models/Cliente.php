<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'Documento';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'Documento',
        'cod_tipo_documento',
        'Nombres',
        'Apellidos',
        'Direccion',
        'cod_ciudad',
        'Telefono'
    ];

    // Relación con Ciudad
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'cod_ciudad', 'Codigo_ciudad');
    }
}

