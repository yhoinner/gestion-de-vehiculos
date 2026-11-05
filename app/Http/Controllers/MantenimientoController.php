<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    public function index()
    {
        $mantenimientos = Mantenimiento::with('vehiculo')
            ->orderBy('id', 'desc')
            ->get();

        return view('mantenimientos.index', compact('mantenimientos'));
    }


    public function create()
    {
        $vehiculos = Vehiculo::all();

        return view('mantenimientos.create', compact('vehiculos'));
    }


    public function store(Request $request)
    {
        $request->validate([

            'vehiculo_id' => 'required|exists:vehiculos,id',

            'fecha_solicitud' => 'required|date',

            'tipo' => 'required|max:100',

            'fecha' => 'required|date',

            'taller' => 'required|max:150',

            'costo' => 'required|numeric|min:0',

            'kilometraje' => 'required|integer|min:0',

            'descripcion' => 'nullable',

            'proximo_mantenimiento' => 'nullable|date',

            'factura' => 'nullable|max:100',

            'tecnico' => 'nullable|max:100',

            'aprobacion' => 'required|in:Pendiente,Aprobada,No aprobada',

            'estado' => 'required|in:Pendiente,En proceso,Finalizado',

        ]);


        Mantenimiento::create([

            'vehiculo_id' => $request->vehiculo_id,

            'fecha_solicitud' => $request->fecha_solicitud,

            'tipo' => $request->tipo,

            'fecha' => $request->fecha,

            'taller' => $request->taller,

            'costo' => $request->costo,

            'kilometraje' => $request->kilometraje,

            'descripcion' => $request->descripcion,

            'proximo_mantenimiento' => $request->proximo_mantenimiento,

            'factura' => $request->factura,

            'tecnico' => $request->tecnico,

            'aprobacion' => $request->aprobacion,

            'estado' => $request->estado,

        ]);


        if (
            $request->estado === 'Pendiente' ||
            $request->estado === 'En proceso'
        ) {
            Vehiculo::where('id', $request->vehiculo_id)
                ->update([
                    'estado' => 'Mantenimiento'
                ]);
        }


        return redirect()
            ->route('mantenimientos.index')
            ->with('success', 'Mantenimiento registrado correctamente.');
    }


    public function show(Mantenimiento $mantenimiento)
    {
        $mantenimiento->load('vehiculo');

        return view('mantenimientos.show', compact('mantenimiento'));
    }


    public function edit(Mantenimiento $mantenimiento)
    {
        $vehiculos = Vehiculo::all();

        return view('mantenimientos.edit', compact(
            'mantenimiento',
            'vehiculos'
        ));
    }


    public function update(Request $request, Mantenimiento $mantenimiento)
    {
        $request->validate([

            'vehiculo_id' => 'required|exists:vehiculos,id',

            'fecha_solicitud' => 'required|date',

            'tipo' => 'required|max:100',

            'fecha' => 'required|date',

            'taller' => 'required|max:150',

            'costo' => 'required|numeric|min:0',

            'kilometraje' => 'required|integer|min:0',

            'descripcion' => 'nullable',

            'proximo_mantenimiento' => 'nullable|date',

            'factura' => 'nullable|max:100',

            'tecnico' => 'nullable|max:100',

            'aprobacion' => 'required|in:Pendiente,Aprobada,No aprobada',

            'estado' => 'required|in:Pendiente,En proceso,Finalizado',

        ]);


        $mantenimiento->update([

            'vehiculo_id' => $request->vehiculo_id,

            'fecha_solicitud' => $request->fecha_solicitud,

            'tipo' => $request->tipo,

            'fecha' => $request->fecha,

            'taller' => $request->taller,

            'costo' => $request->costo,

            'kilometraje' => $request->kilometraje,

            'descripcion' => $request->descripcion,

            'proximo_mantenimiento' => $request->proximo_mantenimiento,

            'factura' => $request->factura,

            'tecnico' => $request->tecnico,

            'aprobacion' => $request->aprobacion,

            'estado' => $request->estado,

        ]);


        if ($request->estado === 'Finalizado') {

            Vehiculo::where('id', $request->vehiculo_id)
                ->update([
                    'estado' => 'Disponible'
                ]);

        } else {

            Vehiculo::where('id', $request->vehiculo_id)
                ->update([
                    'estado' => 'Mantenimiento'
                ]);
        }


        return redirect()
            ->route('mantenimientos.index')
            ->with('success', 'Mantenimiento actualizado correctamente.');
    }


    public function destroy(Mantenimiento $mantenimiento)
    {
        $vehiculo = $mantenimiento->vehiculo_id;

        $mantenimiento->delete();

        Vehiculo::where('id', $vehiculo)
            ->update([
                'estado' => 'Disponible'
            ]);

        return redirect()
            ->route('mantenimientos.index')
            ->with('success', 'Mantenimiento eliminado correctamente.');
    }
}