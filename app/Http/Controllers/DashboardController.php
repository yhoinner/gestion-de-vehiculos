<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Conductor;
use App\Models\Prestamo;
use App\Models\Mantenimiento;
use App\Models\Documento;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | ESTADÍSTICAS PRINCIPALES
        |--------------------------------------------------------------------------
        */

        $totalVehiculos = Vehiculo::count();

        $vehiculosDisponibles = Vehiculo::where('estado', 'Disponible')->count();

        $vehiculosPrestados = Vehiculo::where('estado', 'Prestado')->count();

        $vehiculosMantenimiento = Vehiculo::where('estado', 'Mantenimiento')->count();

        $totalConductores = Conductor::count();

        $prestamosActivos = Prestamo::where('estado', 'Activo')->count();

        $mantenimientosPendientes = Mantenimiento::where('estado', 'Pendiente')->count();


        /*
        |--------------------------------------------------------------------------
        | PROTECCIÓN: BLINDADOS / CONVENCIONALES
        |--------------------------------------------------------------------------
        */

        $vehiculosBlindados = Vehiculo::where('tipo_proteccion', 'Blindado')->count();

        $vehiculosConvencionales = Vehiculo::where('tipo_proteccion', 'Convencional')->count();


        /*
        |--------------------------------------------------------------------------
        | REGIONALES
        |--------------------------------------------------------------------------
        */

        $vehiculosNeiva = Vehiculo::where('regional', 'Neiva')->count();

        $vehiculosIbague = Vehiculo::where('regional', 'Ibagué')->count();

        $blindadosNeiva = Vehiculo::where('regional', 'Neiva')
            ->where('tipo_proteccion', 'Blindado')
            ->count();

        $convencionalesNeiva = Vehiculo::where('regional', 'Neiva')
            ->where('tipo_proteccion', 'Convencional')
            ->count();

        $blindadosIbague = Vehiculo::where('regional', 'Ibagué')
            ->where('tipo_proteccion', 'Blindado')
            ->count();

        $convencionalesIbague = Vehiculo::where('regional', 'Ibagué')
            ->where('tipo_proteccion', 'Convencional')
            ->count();


        /*
        |--------------------------------------------------------------------------
        | FECHAS PARA ALERTAS
        |--------------------------------------------------------------------------
        | Importante: ahora se incluyen tanto documentos vencidos como
        | documentos que vencen dentro de los próximos 30 días.
        |--------------------------------------------------------------------------
        */

        $hoy = Carbon::today();
        $limiteAlertas = $hoy->copy()->addDays(30);


        /*
        |--------------------------------------------------------------------------
        | ALERTAS SOAT
        |--------------------------------------------------------------------------
        */

        $alertasSoat = Documento::with('vehiculo')
            ->where('tipo', 'SOAT')
            ->whereNotNull('fecha_vencimiento')
            ->whereDate('fecha_vencimiento', '<=', $limiteAlertas)
            ->orderBy('fecha_vencimiento')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | ALERTAS TECNOMECÁNICA
        |--------------------------------------------------------------------------
        | En documentos el valor utilizado es "Tecnomecanica".
        |--------------------------------------------------------------------------
        */

        $alertasTecno = Documento::with('vehiculo')
            ->where('tipo', 'Tecnomecanica')
            ->whereNotNull('fecha_vencimiento')
            ->whereDate('fecha_vencimiento', '<=', $limiteAlertas)
            ->orderBy('fecha_vencimiento')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | ALERTAS DE LICENCIAS
        |--------------------------------------------------------------------------
        */

        $alertasLicencias = Conductor::whereNotNull('vence_licencia')
            ->whereDate('vence_licencia', '<=', $limiteAlertas)
            ->orderBy('vence_licencia')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | ALERTAS DE MANTENIMIENTOS
        |--------------------------------------------------------------------------
        */

        $alertasMantenimientos = Mantenimiento::with('vehiculo')
            ->whereNotNull('proximo_mantenimiento')
            ->whereDate('proximo_mantenimiento', '<=', $limiteAlertas)
            ->orderBy('proximo_mantenimiento')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | ALERTAS DE EXTINTORES
        |--------------------------------------------------------------------------
        */

        $alertasExtintores = Vehiculo::whereNotNull('fecha_vencimiento_extintor')
            ->whereDate('fecha_vencimiento_extintor', '<=', $limiteAlertas)
            ->orderBy('fecha_vencimiento_extintor')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | GRÁFICA DE ESTADOS
        |--------------------------------------------------------------------------
        */

        $graficaVehiculos = [
            'Disponibles' => $vehiculosDisponibles,
            'Prestados' => $vehiculosPrestados,
            'Mantenimiento' => $vehiculosMantenimiento,
        ];


        /*
        |--------------------------------------------------------------------------
        | ENVIAR TODO AL DASHBOARD
        |--------------------------------------------------------------------------
        | Conservamos las variables que ya utiliza tu Dashboard actual.
        |--------------------------------------------------------------------------
        */

        return view('dashboard.index', compact(
            'totalVehiculos',
            'vehiculosDisponibles',
            'vehiculosPrestados',
            'vehiculosMantenimiento',
            'totalConductores',
            'prestamosActivos',
            'mantenimientosPendientes',

            'vehiculosBlindados',
            'vehiculosConvencionales',

            'vehiculosNeiva',
            'vehiculosIbague',
            'blindadosNeiva',
            'convencionalesNeiva',
            'blindadosIbague',
            'convencionalesIbague',

            'alertasSoat',
            'alertasTecno',
            'alertasLicencias',
            'alertasMantenimientos',
            'alertasExtintores',

            'graficaVehiculos'
        ));
    }
}