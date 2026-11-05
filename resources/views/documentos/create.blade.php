@extends('layouts.admin')

@section('titulo','Administrar Expediente')

@section('contenido')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">
                <i class="fas fa-folder-open"></i>
                Expediente del Vehículo
            </h4>

        </div>

        <div class="card-body">

            <h5>
                <strong>Placa:</strong>
                {{ $vehiculo->placa }}
            </h5>

            <h5>
                <strong>Vehículo:</strong>
                {{ $vehiculo->marca }} {{ $vehiculo->linea }}
            </h5>

            <hr>

            <form action="{{ route('documentos.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <input type="hidden"
                       name="vehiculo_id"
                       value="{{ $vehiculo->id }}">

                <div class="mb-3">
                    <label class="form-label">
                        Tipo de Documento
                    </label>

                    <select class="form-select"
                            name="tipo"
                            required>

                        <option value="">Seleccione...</option>
                        <option>SOAT</option>
                        <option>Tecnomecanica</option>
                        <option>Tarjeta Propiedad</option>
                        <option>Foto Vehiculo</option>
                        <option>Otro</option>

                    </select>
                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Fecha de Expedición
                    </label>

                    <input type="date"
                           name="fecha_expedicion"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Fecha de Vencimiento
                    </label>

                    <input type="date"
                           name="fecha_vencimiento"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Archivo
                    </label>

                    <input type="file"
                           name="archivo"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Observaciones
                    </label>

                    <textarea class="form-control"
                              rows="4"
                              name="observaciones"></textarea>

                </div>

                <button class="btn btn-success">
                    <i class="fas fa-upload"></i>
                    Guardar Documento
                </button>

                <a href="{{ route('documentos.index') }}"
                   class="btn btn-secondary">

                    Cancelar

                </a>

            </form>

            <hr class="mt-5">

            <h4 class="mb-3">
                <i class="fas fa-folder-open text-primary"></i>
                Documentos Registrados
            </h4>

            @if($documentos->count())

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>Tipo</th>
                        <th>Archivo</th>
                        <th>Vencimiento</th>
                        <th>Estado</th>
                        <th width="220">Acciones</th>

                    </tr>

                </thead>

                <tbody>

                @foreach($documentos as $doc)

                <tr>

                    <td>{{ $doc->tipo }}</td>

                    <td>{{ $doc->nombre_archivo }}</td>

                    <td>
                        {{ $doc->fecha_vencimiento ?? 'No aplica' }}
                    </td>

                    <td>

                        @if($doc->fecha_vencimiento)

                            @php
                                $dias = now()->diffInDays($doc->fecha_vencimiento, false);
                            @endphp

                            @if($dias < 0)

                                <span class="badge bg-danger">
                                    Vencido
                                </span>

                            @elseif($dias <= 30)

                                <span class="badge bg-warning text-dark">
                                    Próximo
                                </span>

                            @else

                                <span class="badge bg-success">
                                    Vigente
                                </span>

                            @endif

                        @else

                            <span class="badge bg-secondary">
                                Sin vencimiento
                            </span>

                        @endif

                    </td>

                    <td>

                        <a href="{{ asset('storage/'.$doc->ruta) }}"
                           target="_blank"
                           class="btn btn-primary btn-sm"
                           title="Ver">

                            <i class="fas fa-eye"></i>

                        </a>

                        <a href="{{ asset('storage/'.$doc->ruta) }}"
                           download
                           class="btn btn-success btn-sm"
                           title="Descargar">

                            <i class="fas fa-download"></i>

                        </a>

                        <form action="{{ route('documentos.destroy',$doc->id) }}"
                              method="POST"
                              style="display:inline-block;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    title="Eliminar"
                                    onclick="return confirm('¿Está seguro de eliminar este documento?')">

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

            @else

                <div class="alert alert-warning">

                    Este vehículo aún no tiene documentos registrados.

                </div>

            @endif

        </div>

    </div>

</div>

@endsection