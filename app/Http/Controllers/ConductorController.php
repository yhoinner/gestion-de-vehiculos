<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use Illuminate\Http\Request;

class ConductorController extends Controller
{
    public function index()
    {
        $conductores = Conductor::orderBy('id', 'desc')->get();

        return view('conductores.index', compact('conductores'));
    }

    public function create()
    {
        return view('conductores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cedula' => 'required|string|max:50|unique:conductors,cedula',
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:30',
            'correo' => 'nullable|email|max:150',
            'cargo' => 'nullable|string|max:100',
            'licencia' => 'required|string|max:50',
            'vence_licencia' => 'required|date',
            'tipo_contrato' => 'required|string|max:100',
            'sexo' => 'required|in:Masculino,Femenino,Otro',
            'regional' => 'required|in:Neiva,Ibagué',
            'sede' => 'required|string|max:100',
            'dependencia' => 'required|string|max:150',
            'grupo_interno_trabajo' => 'required|string|max:150',
            'estado' => 'required|in:Activo,Inactivo,Suspendido'
        ]);

        Conductor::create($request->only([
            'cedula','nombre','apellido','telefono','correo','cargo',
            'licencia','vence_licencia','tipo_contrato','sexo','regional',
            'sede','dependencia','grupo_interno_trabajo','estado'
        ]));

        return redirect()->route('conductores.index')
            ->with('success', 'Conductor registrado correctamente.');
    }

    public function show($id)
    {
        $conductor = Conductor::findOrFail($id);
        return view('conductores.show', compact('conductor'));
    }

    public function edit($id)
    {
        $conductor = Conductor::findOrFail($id);
        return view('conductores.edit', compact('conductor'));
    }

    public function update(Request $request, $id)
    {
        $conductor = Conductor::findOrFail($id);

        $request->validate([
            'cedula' => 'required|string|max:50|unique:conductors,cedula,' . $conductor->id,
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:30',
            'correo' => 'nullable|email|max:150',
            'cargo' => 'nullable|string|max:100',
            'licencia' => 'required|string|max:50',
            'vence_licencia' => 'required|date',
            'tipo_contrato' => 'required|string|max:100',
            'sexo' => 'required|in:Masculino,Femenino,Otro',
            'regional' => 'required|in:Neiva,Ibagué',
            'sede' => 'required|string|max:100',
            'dependencia' => 'required|string|max:150',
            'grupo_interno_trabajo' => 'required|string|max:150',
            'estado' => 'required|in:Activo,Inactivo,Suspendido'
        ]);

        $conductor->update($request->only([
            'cedula','nombre','apellido','telefono','correo','cargo',
            'licencia','vence_licencia','tipo_contrato','sexo','regional',
            'sede','dependencia','grupo_interno_trabajo','estado'
        ]));

        return redirect()->route('conductores.index')
            ->with('success', 'Conductor actualizado correctamente.');
    }

    public function destroy($id)
    {
        $conductor = Conductor::findOrFail($id);
        $conductor->delete();

        return redirect()->route('conductores.index')
            ->with('success', 'Conductor eliminado correctamente.');
    }
}
