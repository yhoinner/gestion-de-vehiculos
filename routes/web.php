<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\TrasladoVehiculoController;


/*
|--------------------------------------------------------------------------
| RUTA PRINCIPAL
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});


/*
|--------------------------------------------------------------------------
| RUTAS AUTENTICADAS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | VEHÍCULOS
    |--------------------------------------------------------------------------
    */

    Route::resource('vehiculos', VehiculoController::class);

    // Formulario para trasladar vehículo
    Route::get(
        '/vehiculos/{vehiculo}/trasladar',
        [TrasladoVehiculoController::class, 'create']
    )->name('vehiculos.trasladar');

    // Guardar traslado
    Route::post(
        '/vehiculos/{vehiculo}/trasladar',
        [TrasladoVehiculoController::class, 'store']
    )->name('vehiculos.trasladar.store');


    /*
    |--------------------------------------------------------------------------
    | CONDUCTORES
    |--------------------------------------------------------------------------
    */

    Route::resource('conductores', ConductorController::class);


    /*
    |--------------------------------------------------------------------------
    | PRÉSTAMOS
    |--------------------------------------------------------------------------
    */

    Route::resource('prestamos', PrestamoController::class);

    // Mostrar formulario para finalizar préstamo
    Route::get(
        '/prestamos/{prestamo}/finalizar',
        [PrestamoController::class, 'edit']
    )->name('prestamos.finalizar.form');

    // Guardar finalización del préstamo
    Route::put(
        '/prestamos/{prestamo}/finalizar',
        [PrestamoController::class, 'finalizar']
    )->name('prestamos.finalizar');


    /*
    |--------------------------------------------------------------------------
    | MANTENIMIENTOS
    |--------------------------------------------------------------------------
    */

    Route::resource('mantenimientos', MantenimientoController::class);


    /*
    |--------------------------------------------------------------------------
    | DOCUMENTOS
    |--------------------------------------------------------------------------
    */

    Route::resource('documentos', DocumentoController::class);


    /*
    |--------------------------------------------------------------------------
    | REPORTES
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/reportes/vehiculos',
        [ReporteController::class, 'vehiculos']
    )->name('reportes.vehiculos');

    Route::get(
        '/reportes/conductores',
        [ReporteController::class, 'conductores']
    )->name('reportes.conductores');

    Route::get(
        '/reportes/prestamos',
        [ReporteController::class, 'prestamos']
    )->name('reportes.prestamos');

    Route::get(
        '/reportes/mantenimientos',
        [ReporteController::class, 'mantenimientos']
    )->name('reportes.mantenimientos');


    /*
    |--------------------------------------------------------------------------
    | FICHA PDF DEL VEHÍCULO
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/vehiculos/{vehiculo}/pdf',
        [ReporteController::class, 'fichaVehiculo']
    )->name('vehiculos.pdf');

});


/*
|--------------------------------------------------------------------------
| AUTENTICACIÓN
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';