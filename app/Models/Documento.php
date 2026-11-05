<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = [

        'vehiculo_id',

        'tipo',

        'nombre_archivo',

        'ruta',

        'fecha_expedicion',

        'fecha_vencimiento',

        'observaciones'

    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }
}