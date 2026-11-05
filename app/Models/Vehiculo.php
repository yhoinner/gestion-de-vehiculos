<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TrasladoVehiculo;

class Vehiculo extends Model
{
    protected $fillable = [

        // ==========================
        // INFORMACIÓN GENERAL
        // ==========================

        'placa',
        'tipo_vehiculo',
        'tipo_proteccion',
        'blindado',
        'nivel_blindaje',

        'marca',
        'linea',
        'modelo',
        'anio',
        'color',

        // ==========================
        // DATOS TÉCNICOS
        // ==========================

        'vin',
        'motor',
        'cilindraje',
        'combustible',
        'transmision',

        // ==========================
        // SERVICIO
        // ==========================

        'clase_servicio',

        // ==========================
        // ADBLUE
        // ==========================

        'tiene_adblue',
        'nivel_adblue',

        // ==========================
        // EQUIPAMIENTO
        // ==========================

        'kit_carretera',
        'fecha_vencimiento_extintor',

        // ==========================
        // ESTADO Y REGIONAL
        // ==========================

        'estado',
        'regional',
        'fecha_llegada_regional',

        // ==========================
        // DOCUMENTACIÓN
        // ==========================

        'tarjeta_propiedad',
        'fecha_compra',

        // ==========================
        // FOTO
        // ==========================

        'foto',
    ];

    // ==========================
    // RELACIÓN CON PRÉSTAMOS
    // ==========================

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    // ==========================
    // RELACIÓN CON MANTENIMIENTOS
    // ==========================

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class);
    }

    // ==========================
    // RELACIÓN CON DOCUMENTOS
    // ==========================

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    // ==========================
    // RELACIÓN CON TRASLADOS
    // ==========================

    public function traslados()
    {
        return $this->hasMany(TrasladoVehiculo::class);
    }
}
