<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Conductor;

class ReporteController extends Controller
{
    public function vehiculos()
    {
        $vehiculos = Vehiculo::orderBy('placa')->get();

        $pdf = Pdf::loadView('reportes.vehiculos', compact('vehiculos'));

        return $pdf->download('Reporte_Vehiculos_UNP.pdf');
    }

    public function conductores()
    {
    $conductores = Conductor::orderBy('nombre')->get();

    $pdf = Pdf::loadView('reportes.conductores', compact('conductores'));

    return $pdf->download('Reporte_Conductores_UNP.pdf');
    }

    public function prestamos()
    {
    $prestamos = \App\Models\Prestamo::with(['vehiculo','conductor'])
                    ->orderByDesc('id')
                    ->get();

    $pdf = Pdf::loadView('reportes.prestamos', compact('prestamos'));

    return $pdf->download('Reporte_Prestamos_UNP.pdf');
    }

    public function mantenimientos()
    {
    $mantenimientos = \App\Models\Mantenimiento::with('vehiculo')
                        ->orderByDesc('id')
                        ->get();

    $pdf = Pdf::loadView('reportes.mantenimientos', compact('mantenimientos'));

    return $pdf->download('Reporte_Mantenimientos_UNP.pdf');
    }

    public function fichaVehiculo(Vehiculo $vehiculo)
{
    $vehiculo->load([
        'prestamos.conductor',
        'mantenimientos',
        'documentos'
    ]);

    $pdf = Pdf::loadView('reportes.ficha_vehiculo', compact('vehiculo'));

    return $pdf->download('Ficha_'.$vehiculo->placa.'.pdf');
}

}