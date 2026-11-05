<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrasladoVehiculo extends Model
{
    /**
     * Nombre real de la tabla en la base de datos.
     */
    protected $table = 'traslados_vehiculos';

    protected $fillable = [
        'vehiculo_id',
        'regional_origen',
        'regional_destino',
        'fecha_traslado',
        'motivo',
    ];

    protected $casts = [
        'fecha_traslado' => 'date',
    ];

    /**
     * Vehículo relacionado.
     */
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }
}