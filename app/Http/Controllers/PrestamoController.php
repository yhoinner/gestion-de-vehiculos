<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Vehiculo;
use App\Models\Conductor;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with(['vehiculo', 'conductor'])
            ->orderBy('id', 'desc')
            ->get();

        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        $vehiculos = Vehiculo::where('estado', 'Disponible')->get();
        $conductores = Conductor::where('estado', 'Activo')->get();

        return view('prestamos.create', compact('vehiculos', 'conductores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'conductor_id' => 'required|exists:conductors,id',
            'dependencia' => 'required|max:100',
            'destino' => 'required|max:150',
            'fecha_salida' => 'required|date',
            'hora_salida' => 'required',
            'motivo' => 'required|max:255',
            'km_salida' => 'required|integer|min:0',
            'combustible_salida' => 'required',
            'adblue_salida' => 'nullable|numeric|min:0|max:100',
            'observaciones' => 'nullable|max:500',
        ]);

        $vehiculo = Vehiculo::findOrFail($request->vehiculo_id);

        if ($vehiculo->estado !== 'Disponible') {
            return back()
                ->withInput()
                ->with('error', 'El vehículo seleccionado no está disponible para préstamo.');
        }

        $prestamoActivo = Prestamo::where('conductor_id', $request->conductor_id)
            ->where('estado', 'Activo')
            ->exists();

        if ($prestamoActivo) {
            return back()
                ->withInput()
                ->with('error', 'El conductor ya tiene un préstamo activo.');
        }

        $nivelSalida = null;

        if ($vehiculo->tiene_adblue) {
            $nivelSalida = $request->input('adblue_salida');

            if ($nivelSalida === null || $nivelSalida === '') {
                return back()
                    ->withInput()
                    ->with('error', 'El vehículo tiene AdBlue y debes registrar el nivel de salida.');
            }

            if ((float) $nivelSalida < 0 || (float) $nivelSalida > 100) {
                return back()
                    ->withInput()
                    ->with('error', 'El nivel de AdBlue de salida debe estar entre 0 y 100 %.');
            }
        }

        Prestamo::create([
            'vehiculo_id' => $request->vehiculo_id,
            'conductor_id' => $request->conductor_id,
            'dependencia' => $request->dependencia,
            'destino' => $request->destino,
            'fecha_salida' => $request->fecha_salida,
            'hora_salida' => $request->hora_salida,
            'motivo' => $request->motivo,
            'km_salida' => $request->km_salida,
            'combustible_salida' => $request->combustible_salida,
            'adblue_salida' => $nivelSalida,
            'observaciones' => $request->observaciones,
            'estado' => 'Activo',
        ]);

        $vehiculo->update([
            'estado' => 'Prestado',
        ]);

        return redirect()
            ->route('prestamos.index')
            ->with('success', 'Préstamo registrado correctamente.');
    }

    public function show(Prestamo $prestamo)
    {
        $prestamo->load('vehiculo', 'conductor');

        return view('prestamos.show', compact('prestamo'));
    }

    /**
     * Muestra el formulario de finalización.
     */
    public function edit(Prestamo $prestamo)
    {
        $prestamo->load('vehiculo', 'conductor');

        return view('prestamos.finalizar', compact('prestamo'));
    }

    /**
     * Guarda la finalización del préstamo.
     * Esta ruta también puede llamarse prestamos.finalizar.
     */
    public function finalizar(Request $request, Prestamo $prestamo)
    {
        $prestamo->load('vehiculo', 'conductor');

        $request->validate([
            'fecha_regreso' => 'required|date',
            'hora_regreso' => 'required',
            'km_llegada' => 'required|integer|min:' . $prestamo->km_salida,
            'combustible_llegada' => 'required',
            'adblue_llegada' => 'nullable|numeric|min:0|max:100',
            'observaciones' => 'nullable|max:500',
        ]);

        if ($prestamo->estado === 'Finalizado') {
            return redirect()
                ->route('prestamos.index')
                ->with('error', 'Este préstamo ya fue finalizado.');
        }

        $vehiculo = $prestamo->vehiculo;
        $nivelAdblueLlegada = null;

        if ($vehiculo->tiene_adblue) {
            $nivelAdblueLlegada = $request->input('adblue_llegada');

            if ($nivelAdblueLlegada === null || $nivelAdblueLlegada === '') {
                return back()
                    ->withInput()
                    ->with('error', 'El vehículo tiene AdBlue y debes registrar el nivel de llegada.');
            }

            if ((float) $nivelAdblueLlegada < 0 || (float) $nivelAdblueLlegada > 100) {
                return back()
                    ->withInput()
                    ->with('error', 'El nivel de AdBlue de llegada debe estar entre 0 y 100 %.');
            }
        }

        $prestamo->update([
            'fecha_regreso' => $request->fecha_regreso,
            'hora_regreso' => $request->hora_regreso,
            'km_llegada' => $request->km_llegada,
            'combustible_llegada' => $request->combustible_llegada,
            'adblue_llegada' => $nivelAdblueLlegada,
            'observaciones' => $request->observaciones,
            'estado' => 'Finalizado',
        ]);

        $vehiculo->update([
            'estado' => 'Disponible',
            'nivel_adblue' => $vehiculo->tiene_adblue ? $nivelAdblueLlegada : null,
        ]);

        return redirect()
            ->route('prestamos.index')
            ->with('success', 'Préstamo finalizado correctamente.');
    }

    /**
     * Compatibilidad con route resource.
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        return $this->finalizar($request, $prestamo);
    }

    public function destroy(Prestamo $prestamo)
    {
        if ($prestamo->estado === 'Activo') {
            $prestamo->vehiculo()->update([
                'estado' => 'Disponible',
            ]);
        }

        $prestamo->delete();

        return redirect()
            ->route('prestamos.index')
            ->with('success', 'Préstamo eliminado correctamente.');
    }
}