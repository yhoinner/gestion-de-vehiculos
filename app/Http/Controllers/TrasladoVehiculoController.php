<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\TrasladoVehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrasladoVehiculoController extends Controller
{
    public function create(Vehiculo $vehiculo)
    {
        return view('traslados.create', compact('vehiculo'));
    }

    public function store(Request $request, Vehiculo $vehiculo)
    {
        $request->validate([
            'regional_destino' => 'required|in:Neiva,Ibagué',
            'fecha_traslado' => 'required|date',
            'motivo' => 'nullable|string|max:500',
        ], [
            'regional_destino.required' => 'Debe seleccionar una regional.',
            'regional_destino.in' => 'La regional seleccionada no es válida.',
            'fecha_traslado.required' => 'Debe indicar la fecha del traslado.',
            'fecha_traslado.date' => 'La fecha del traslado no es válida.',
            'motivo.max' => 'El motivo no puede superar los 500 caracteres.',
        ]);

        if ($vehiculo->regional === $request->regional_destino) {
            return back()
                ->withErrors([
                    'regional_destino' =>
                        'El vehículo ya se encuentra en esa regional.'
                ])
                ->withInput();
        }

        DB::transaction(function () use ($request, $vehiculo) {

            TrasladoVehiculo::create([
                'vehiculo_id' => $vehiculo->id,
                'regional_origen' => $vehiculo->regional,
                'regional_destino' => $request->regional_destino,
                'fecha_traslado' => $request->fecha_traslado,
                'motivo' => $request->motivo,
            ]);

            $vehiculo->update([
                'regional' => $request->regional_destino,
                'fecha_llegada_regional' => $request->fecha_traslado,
            ]);
        });

        return redirect()
            ->route('vehiculos.show', $vehiculo)
            ->with(
                'success',
                'El vehículo fue trasladado correctamente.'
            );
    }
}
