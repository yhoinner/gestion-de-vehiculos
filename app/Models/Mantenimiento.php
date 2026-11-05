<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $fillable = [

        'vehiculo_id',
        'fecha_solicitud',
        'tipo',
        'fecha',
        'taller',
        'costo',
        'kilometraje',
        'descripcion',
        'proximo_mantenimiento',
        'factura',
        'tecnico',
        'aprobacion',
        'estado'

    ];

    protected $casts = [
        'fecha_solicitud' => 'date',
        'fecha' => 'date',
        'proximo_mantenimiento' => 'date',
        'costo' => 'decimal:2',
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }
}