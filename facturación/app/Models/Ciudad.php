<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudad';
    protected $primaryKey = 'Codigo_ciudad';
    public $timestamps = false;

    protected $fillable = [
        'nombre_ciudad'
    ];
}
