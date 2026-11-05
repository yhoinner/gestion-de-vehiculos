<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = [
        'vehiculo_id',
        'conductor_id',

        'dependencia',
        'destino',

        'fecha_salida',
        'hora_salida',

        'fecha_regreso',
        'hora_regreso',

        'motivo',

        'km_salida',
        'km_llegada',

        'combustible_salida',
        'combustible_llegada',
        'combustible_regreso',

        'adblue_salida',
        'adblue_llegada',

        'observaciones',
        'estado',
    ];

    protected $casts = [
        'fecha_salida' => 'date',
        'fecha_regreso' => 'date',
        'adblue_salida' => 'decimal:1',
        'adblue_llegada' => 'decimal:1',
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function conductor()
    {
        return $this->belongsTo(Conductor::class);
    }
}