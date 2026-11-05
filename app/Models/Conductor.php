<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    protected $table = 'conductors';

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'cargo',
        'direccion',
        'licencia',
        'categoria',
        'vence_licencia',
        'tipo_contrato',
        'sexo',
        'regional',
        'sede',
        'dependencia',
        'grupo_interno_trabajo',
        'estado'
    ];

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}