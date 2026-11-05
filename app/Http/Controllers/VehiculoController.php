<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\TrasladoVehiculo;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::orderBy('id', 'desc')->get();

        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        return view('vehiculos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|string|max:10|unique:vehiculos,placa',
            'tipo_vehiculo' => 'required|string|max:50',
            'tipo_proteccion' => 'required|in:Blindado,Convencional',
            'nivel_blindaje' => 'nullable|string|max:20',
            'clase_servicio' => 'required|in:Misional,Administrativo',
            'marca' => 'required|string|max:50',
            'linea' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'color' => 'required|string|max:30',
            'vin' => 'required|string|size:17|unique:vehiculos,vin',
            'motor' => 'required|string|max:30',
            'cilindraje' => 'required|integer|min:50|max:10000',
            'combustible' => 'required',
            'transmision' => 'required',
            'tiene_adblue' => 'required|boolean',
            'nivel_adblue' => 'nullable|numeric|min:0|max:100',
            'kit_carretera' => 'required|boolean',
            'fecha_vencimiento_extintor' => 'nullable|date',
            'estado' => 'required',
            'regional' => 'required|in:Neiva,Ibagué',
            'fecha_llegada_regional' => 'required|date|before_or_equal:today',
            'tarjeta_propiedad' => 'required|string|max:30',
            'fecha_compra' => 'required|date|before_or_equal:today',

            'tiene_soat' => 'required|boolean',
            'soat_aseguradora' => 'nullable|string|max:150|required_if:tiene_soat,1',
            'soat_numero_poliza' => 'nullable|string|max:100',
            'soat_fecha_vencimiento' => 'nullable|date|required_if:tiene_soat,1',
            'soat_archivo' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120|required_if:tiene_soat,1',

            'tiene_tecnomecanica' => 'required|boolean',
            'tecno_fecha_expedicion' => 'nullable|date|required_if:tiene_tecnomecanica,1',
            'tecno_fecha_vencimiento' => 'nullable|date|after_or_equal:tecno_fecha_expedicion|required_if:tiene_tecnomecanica,1',
            'tecno_centro_diagnostico' => 'nullable|string|max:150|required_if:tiene_tecnomecanica,1',
            'tecno_numero_certificado' => 'nullable|string|max:100',
            'tecno_archivo' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120|required_if:tiene_tecnomecanica,1',

            'tarjeta_archivo' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'foto_archivo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ], [
            'soat_aseguradora.required_if' => 'La aseguradora del SOAT es obligatoria cuando tiene SOAT.',
            'soat_fecha_vencimiento.required_if' => 'La fecha de vencimiento del SOAT es obligatoria cuando tiene SOAT.',
            'soat_archivo.required_if' => 'Debe cargar el archivo del SOAT cuando tiene SOAT.',
            'tecno_fecha_expedicion.required_if' => 'La fecha de expedición de la tecnomecánica es obligatoria.',
            'tecno_fecha_vencimiento.required_if' => 'La fecha de vencimiento de la tecnomecánica es obligatoria.',
            'tecno_centro_diagnostico.required_if' => 'El centro de diagnóstico es obligatorio.',
            'tecno_archivo.required_if' => 'Debe cargar el archivo de la tecnomecánica cuando tiene tecnomecánica.',
        ]);

        $nivelBlindaje = $request->tipo_proteccion === 'Blindado'
            ? $request->nivel_blindaje
            : null;

        $nivelAdblue = $request->boolean('tiene_adblue')
            ? $request->nivel_adblue
            : null;

        DB::transaction(function () use ($request, $nivelBlindaje, $nivelAdblue) {
            $vehiculo = Vehiculo::create([
                'placa' => strtoupper($request->placa),
                'tipo_vehiculo' => $request->tipo_vehiculo,
                'tipo_proteccion' => $request->tipo_proteccion,
                'blindado' => $request->tipo_proteccion === 'Blindado',
                'nivel_blindaje' => $nivelBlindaje,
                'clase_servicio' => $request->clase_servicio,
                'marca' => $request->marca,
                'linea' => $request->linea,
                'modelo' => $request->modelo,
                'color' => $request->color,
                'vin' => strtoupper($request->vin),
                'motor' => $request->motor,
                'cilindraje' => $request->cilindraje,
                'combustible' => $request->combustible,
                'transmision' => $request->transmision,
                'tiene_adblue' => $request->boolean('tiene_adblue'),
                'nivel_adblue' => $nivelAdblue,
                'kit_carretera' => $request->boolean('kit_carretera'),
                'fecha_vencimiento_extintor' => $request->fecha_vencimiento_extintor,
                'estado' => $request->estado,
                'regional' => $request->regional,
                'fecha_llegada_regional' => $request->fecha_llegada_regional,
                'tarjeta_propiedad' => $request->tarjeta_propiedad,
                'fecha_compra' => $request->fecha_compra,
                'foto' => null,
            ]);

            $this->guardarDocumento(
                $vehiculo,
                'SOAT',
                $request->file('soat_archivo'),
                $request->soat_fecha_vencimiento,
                [
                    'tiene_documento' => $request->boolean('tiene_soat'),
                    'aseguradora' => $request->soat_aseguradora,
                    'numero_poliza' => $request->soat_numero_poliza,
                    'fecha_expedicion' => null,
                    'observaciones' => null,
                ]
            );

            $this->guardarDocumento(
                $vehiculo,
                'Tecnomecanica',
                $request->file('tecno_archivo'),
                $request->tecno_fecha_vencimiento,
                [
                    'tiene_documento' => $request->boolean('tiene_tecnomecanica'),
                    'centro_diagnostico' => $request->tecno_centro_diagnostico,
                    'numero_certificado' => $request->tecno_numero_certificado,
                    'fecha_expedicion' => $request->tecno_fecha_expedicion,
                    'observaciones' => null,
                ]
            );

            $this->guardarDocumento(
                $vehiculo,
                'Tarjeta Propiedad',
                $request->file('tarjeta_archivo'),
                null,
                [
                    'tiene_documento' => $request->hasFile('tarjeta_archivo'),
                    'fecha_expedicion' => $request->fecha_compra,
                    'observaciones' => 'Número de tarjeta: '.$request->tarjeta_propiedad,
                ]
            );

            if ($request->hasFile('foto_archivo')) {
                $foto = $this->guardarDocumento(
                    $vehiculo,
                    'Foto Vehiculo',
                    $request->file('foto_archivo'),
                    null,
                    [
                        'tiene_documento' => true,
                        'fecha_expedicion' => now()->toDateString(),
                        'observaciones' => 'Fotografía principal del vehículo.',
                    ]
                );

                $vehiculo->update(['foto' => $foto->ruta]);
            }
        });

        return redirect()
            ->route('vehiculos.index')
            ->with('success', 'Vehículo registrado correctamente con su expediente documental.');
    }

    protected function guardarDocumento(Vehiculo $vehiculo, string $tipo, $archivo, ?string $fechaVencimiento, array $datos): Documento
    {
        $documento = Documento::where('vehiculo_id', $vehiculo->id)
            ->where('tipo', $tipo)
            ->first();

        // Si no hay archivo y el documento está marcado como NO registrado,
        // conservamos el archivo existente (si lo hubiera) y garantizamos
        // los campos obligatorios para documentos nuevos.
        if (!$archivo && empty($datos['tiene_documento'])) {
            $data = array_merge($datos, [
                'vehiculo_id' => $vehiculo->id,
                'tipo' => $tipo,
                'fecha_vencimiento' => $fechaVencimiento,
            ]);

            if ($documento) {
                $documento->update($data);
                return $documento->refresh();
            }

            $data['nombre_archivo'] = strtoupper(str_replace(' ', '_', $tipo));
            $data['ruta'] = '';

            return Documento::create($data);
        }

        $data = array_merge($datos, [
            'vehiculo_id' => $vehiculo->id,
            'tipo' => $tipo,
            'fecha_vencimiento' => $fechaVencimiento,
        ]);

        if ($archivo) {
            $nombre = time().'_'.$tipo.'_'.preg_replace('/[^A-Za-z0-9._-]/', '_', $archivo->getClientOriginalName());
            $ruta = $archivo->storeAs('documentos', $nombre, 'public');
            $data['nombre_archivo'] = $nombre;
            $data['ruta'] = $ruta;
        }

        if ($documento) {
            if ($archivo && $documento->ruta && Storage::disk('public')->exists($documento->ruta)) {
                Storage::disk('public')->delete($documento->ruta);
            }
            $documento->update($data);
            return $documento->refresh();
        }

        if (!isset($data['nombre_archivo'])) {
            $data['nombre_archivo'] = strtoupper(str_replace(' ', '_', $tipo));
            $data['ruta'] = '';
        }

        return Documento::create($data);
    }

    public function show(Vehiculo $vehiculo)
    {
        $vehiculo->load(['traslados', 'prestamos.conductor', 'mantenimientos', 'documentos']);

        $totalPrestamos = $vehiculo->prestamos->count();
        $totalMantenimientos = $vehiculo->mantenimientos->count();
        $totalDocumentos = $vehiculo->documentos->count();
        $totalTraslados = $vehiculo->traslados->count();

        $ultimoPrestamo = $vehiculo->prestamos()->with('conductor')->latest()->first();

        return view('vehiculos.show', compact(
            'vehiculo',
            'totalPrestamos',
            'totalMantenimientos',
            'totalDocumentos',
            'totalTraslados',
            'ultimoPrestamo'
        ));
    }

    public function edit(Vehiculo $vehiculo)
    {
        $vehiculo->load('documentos');

        return view('vehiculos.edit', compact('vehiculo'));
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
        $request->validate([
            'placa' => 'required|string|max:10|unique:vehiculos,placa,'.$vehiculo->id,
            'tipo_vehiculo' => 'required|string|max:50',
            'tipo_proteccion' => 'required|in:Blindado,Convencional',
            'nivel_blindaje' => 'nullable|string|max:20',
            'clase_servicio' => 'required|in:Misional,Administrativo',
            'marca' => 'required|string|max:50',
            'linea' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'color' => 'required|string|max:30',
            'vin' => 'required|string|size:17|unique:vehiculos,vin,'.$vehiculo->id,
            'motor' => 'required|string|max:30',
            'cilindraje' => 'required|integer|min:50|max:10000',
            'combustible' => 'required',
            'transmision' => 'required',
            'tiene_adblue' => 'required|boolean',
            'nivel_adblue' => 'nullable|numeric|min:0|max:100',
            'kit_carretera' => 'required|boolean',
            'fecha_vencimiento_extintor' => 'nullable|date',
            'estado' => 'required',
            'regional' => 'required|in:Neiva,Ibagué',
            'fecha_llegada_regional' => 'required|date|before_or_equal:today',
            'tarjeta_propiedad' => 'required|string|max:30',
            'fecha_compra' => 'required|date|before_or_equal:today',

            'tiene_soat' => 'required|boolean',
            'soat_aseguradora' => 'nullable|string|max:150|required_if:tiene_soat,1',
            'soat_numero_poliza' => 'nullable|string|max:100',
            'soat_fecha_vencimiento' => 'nullable|date|required_if:tiene_soat,1',
            'soat_archivo' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',

            'tiene_tecnomecanica' => 'required|boolean',
            'tecno_fecha_expedicion' => 'nullable|date|required_if:tiene_tecnomecanica,1',
            'tecno_fecha_vencimiento' => 'nullable|date|after_or_equal:tecno_fecha_expedicion|required_if:tiene_tecnomecanica,1',
            'tecno_centro_diagnostico' => 'nullable|string|max:150|required_if:tiene_tecnomecanica,1',
            'tecno_numero_certificado' => 'nullable|string|max:100',
            'tecno_archivo' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'tarjeta_archivo' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'foto_archivo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        DB::transaction(function () use ($request, $vehiculo) {
            $vehiculo->update([
                'placa' => strtoupper($request->placa),
                'tipo_vehiculo' => $request->tipo_vehiculo,
                'tipo_proteccion' => $request->tipo_proteccion,
                'blindado' => $request->tipo_proteccion === 'Blindado',
                'nivel_blindaje' => $request->tipo_proteccion === 'Blindado' ? $request->nivel_blindaje : null,
                'clase_servicio' => $request->clase_servicio,
                'marca' => $request->marca,
                'linea' => $request->linea,
                'modelo' => $request->modelo,
                'color' => $request->color,
                'vin' => strtoupper($request->vin),
                'motor' => $request->motor,
                'cilindraje' => $request->cilindraje,
                'combustible' => $request->combustible,
                'transmision' => $request->transmision,
                'tiene_adblue' => $request->boolean('tiene_adblue'),
                'nivel_adblue' => $request->boolean('tiene_adblue') ? $request->nivel_adblue : null,
                'kit_carretera' => $request->boolean('kit_carretera'),
                'fecha_vencimiento_extintor' => $request->fecha_vencimiento_extintor,
                'estado' => $request->estado,
                'regional' => $request->regional,
                'fecha_llegada_regional' => $request->fecha_llegada_regional,
                'tarjeta_propiedad' => $request->tarjeta_propiedad,
                'fecha_compra' => $request->fecha_compra,
            ]);

            $this->guardarDocumento(
                $vehiculo,
                'SOAT',
                $request->boolean('tiene_soat') ? $request->file('soat_archivo') : null,
                $request->boolean('tiene_soat') ? $request->soat_fecha_vencimiento : null,
                [
                    'tiene_documento' => $request->boolean('tiene_soat'),
                    'aseguradora' => $request->soat_aseguradora,
                    'numero_poliza' => $request->soat_numero_poliza,
                    'fecha_expedicion' => null,
                    'observaciones' => null,
                ]
            );

            $this->guardarDocumento(
                $vehiculo,
                'Tecnomecanica',
                $request->boolean('tiene_tecnomecanica') ? $request->file('tecno_archivo') : null,
                $request->boolean('tiene_tecnomecanica') ? $request->tecno_fecha_vencimiento : null,
                [
                    'tiene_documento' => $request->boolean('tiene_tecnomecanica'),
                    'centro_diagnostico' => $request->tecno_centro_diagnostico,
                    'numero_certificado' => $request->tecno_numero_certificado,
                    'fecha_expedicion' => $request->tecno_fecha_expedicion,
                    'observaciones' => null,
                ]
            );

            $this->guardarDocumento(
                $vehiculo,
                'Tarjeta Propiedad',
                $request->file('tarjeta_archivo'),
                null,
                [
                    'tiene_documento' => true,
                    'fecha_expedicion' => $request->fecha_compra,
                    'observaciones' => 'Número de tarjeta: '.$request->tarjeta_propiedad,
                ]
            );

            if ($request->hasFile('foto_archivo')) {
                $foto = $this->guardarDocumento(
                    $vehiculo,
                    'Foto Vehiculo',
                    $request->file('foto_archivo'),
                    null,
                    [
                        'tiene_documento' => true,
                        'fecha_expedicion' => now()->toDateString(),
                        'observaciones' => 'Fotografía principal del vehículo.',
                    ]
                );

                $vehiculo->update(['foto' => $foto->ruta]);
            }
        });

        return redirect()
            ->route('vehiculos.index')
            ->with('success', 'Vehículo actualizado correctamente.');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado correctamente.');
    }
}