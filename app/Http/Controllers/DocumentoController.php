<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $vehiculos = \App\Models\Vehiculo::with('documentos')
                    ->orderBy('placa')
                    ->get();

    return view('documentos.index', compact('vehiculos'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
{
    $vehiculo = Vehiculo::findOrFail($request->vehiculo);

    $documentos = Documento::where('vehiculo_id', $vehiculo->id)
                    ->orderBy('tipo')
                    ->get();

    return view('documentos.create', compact(
        'vehiculo',
        'documentos'
    ));
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([

        'vehiculo_id' => 'required|exists:vehiculos,id',

        'tipo' => 'required',

        'archivo' => 'required|mimes:pdf,jpg,jpeg,png|max:5120',

        'fecha_expedicion' => 'nullable|date',

        'fecha_vencimiento' => 'nullable|date',

        'observaciones' => 'nullable'

    ]);

    $archivo = $request->file('archivo');

    $nombre = time().'_'.$archivo->getClientOriginalName();

    $ruta = $archivo->storeAs(
        'documentos',
        $nombre,
        'public'
    );

    Documento::create([

        'vehiculo_id' => $request->vehiculo_id,

        'tipo' => $request->tipo,

        'nombre_archivo' => $nombre,

        'ruta' => $ruta,

        'fecha_expedicion' => $request->fecha_expedicion,

        'fecha_vencimiento' => $request->fecha_vencimiento,

        'observaciones' => $request->observaciones

    ]);

    return redirect()
            ->route('documentos.index')
            ->with('success','Documento registrado correctamente.');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documento $documento)
{
    // Eliminar archivo físico
    if ($documento->ruta && Storage::disk('public')->exists($documento->ruta)) {
        Storage::disk('public')->delete($documento->ruta);
    }

    // Guardar el id del vehículo antes de eliminar
    $vehiculoId = $documento->vehiculo_id;

    // Eliminar registro
    $documento->delete();

    return redirect()
        ->route('documentos.create', ['vehiculo' => $vehiculoId])
        ->with('success', 'Documento eliminado correctamente.');
}
}
