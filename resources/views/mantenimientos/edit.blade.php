@extends('layouts.admin')

@section('titulo', 'Editar Mantenimiento')

@section('contenido')

<style>

    .maintenance-edit-container {
        padding: 5px 5px 30px;
    }

    .maintenance-edit-card {
        background: #ffffff;
        border: none;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(15, 23, 42, 0.07);
        overflow: hidden;
    }

    /* HEADER */

    .edit-header {
        padding: 24px 28px;
        border-bottom: 1px solid #edf1f7;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .edit-header-icon {
        width: 48px;
        height: 48px;
        border-radius: 13px;
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        box-shadow: 0 5px 12px rgba(245, 158, 11, 0.22);
    }

    .edit-header h3 {
        margin: 0;
        color: #172033;
        font-size: 21px;
        font-weight: 700;
    }

    .edit-header p {
        margin: 4px 0 0;
        color: #98a2b3;
        font-size: 13px;
    }

    /* BODY */

    .edit-body {
        padding: 28px;
    }

    /* SECCIONES */

    .edit-section {
        margin-bottom: 30px;
    }

    .edit-section:last-child {
        margin-bottom: 0;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 9px;
        margin-bottom: 17px;
        color: #344054;
        font-size: 15px;
        font-weight: 700;
    }

    .section-title i {
        color: #2563eb;
        font-size: 14px;
    }

    /* LABEL */

    .edit-label {
        display: block;
        margin-bottom: 7px;
        color: #344054;
        font-size: 13px;
        font-weight: 600;
    }

    .required {
        color: #dc2626;
    }

    /* INPUTS */

    .edit-input,
    .edit-select,
    .edit-textarea {
        width: 100%;
        border: 1px solid #d0d5dd;
        border-radius: 10px;
        background: #ffffff;
        color: #344054;
        font-size: 14px;
        padding: 11px 13px;
        transition: all .18s ease;
        outline: none;
    }

    .edit-input,
    .edit-select {
        height: 44px;
    }

    .edit-input:focus,
    .edit-select:focus,
    .edit-textarea:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
    }

    .edit-input[readonly] {
        background: #f8fafc;
        color: #475467;
    }

    .edit-textarea {
        min-height: 110px;
        resize: vertical;
    }

    /* ICON INPUT */

    .input-icon-wrapper {
        position: relative;
    }

    .input-icon-wrapper i {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: #98a2b3;
        font-size: 13px;
        pointer-events: none;
    }

    .input-icon-wrapper .edit-input,
    .input-icon-wrapper .edit-select {
        padding-left: 37px;
    }

    /* VEHÍCULO */

    .vehicle-selected {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 13px;
        min-height: 44px;
        background: #eff6ff;
        border: 1px solid #dbeafe;
        border-radius: 10px;
        color: #1d4ed8;
        font-size: 14px;
        font-weight: 700;
    }

    .vehicle-selected i {
        width: 28px;
        height: 28px;
        border-radius: 7px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #dbeafe;
        color: #2563eb;
    }

    /* COSTO */

    .cost-wrapper {
        position: relative;
    }

    .cost-prefix {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: #667085;
        font-size: 13px;
        font-weight: 600;
        pointer-events: none;
    }

    .cost-wrapper .edit-input {
        padding-left: 29px;
    }

    /* ALERTA VALIDACIÓN */

    .validation-error {
        margin-top: 6px;
        color: #dc2626;
        font-size: 12px;
    }

    /* FOOTER */

    .edit-footer {
        padding: 18px 28px;
        background: #fafbfc;
        border-top: 1px solid #edf1f7;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;
    }

    .btn-cancel {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 17px;
        border-radius: 10px;
        background: #eef2f6;
        color: #475467;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all .18s ease;
    }

    .btn-cancel:hover {
        background: #e2e8f0;
        color: #1e293b;
    }

    .btn-save {
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 19px;
        border-radius: 10px;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        font-size: 14px;
        font-weight: 600;
        box-shadow: 0 5px 12px rgba(37, 99, 235, 0.20);
        cursor: pointer;
        transition: all .18s ease;
    }

    .btn-save:hover {
        transform: translateY(-1px);
        box-shadow: 0 7px 16px rgba(37, 99, 235, 0.28);
    }

    /* RESPONSIVE */

    @media (max-width: 768px) {

        .edit-body {
            padding: 20px;
        }

        .edit-footer {
            padding: 15px 20px;
            flex-direction: column-reverse;
        }

        .btn-cancel,
        .btn-save {
            width: 100%;
            justify-content: center;
        }

    }

</style>


<div class="maintenance-edit-container">

    <div class="maintenance-edit-card">


        {{-- ENCABEZADO --}}

        <div class="edit-header">

            <div class="edit-header-icon">
                <i class="fa fa-pen"></i>
            </div>

            <div>

                <h3>Editar Mantenimiento</h3>

                <p>
                    Actualiza la información del mantenimiento del vehículo
                </p>

            </div>

        </div>


        {{-- FORMULARIO --}}

        <form action="{{ route('mantenimientos.update', $mantenimiento->id) }}"
              method="POST">

            @csrf

            @method('PUT')


            <div class="edit-body">


                {{-- INFORMACIÓN DEL VEHÍCULO --}}

                <div class="edit-section">

                    <div class="section-title">

                        <i class="fa fa-car"></i>

                        Información del vehículo

                    </div>


                    <div class="row g-3">


                        {{-- VEHÍCULO --}}

                        <div class="col-md-6">

                            <label class="edit-label">
                                Vehículo
                            </label>

                            <div class="vehicle-selected">

                                <i class="fa fa-car"></i>

                                <span>

                                    {{ $mantenimiento->vehiculo->placa }}
                                    -
                                    {{ $mantenimiento->vehiculo->marca }}

                                </span>

                            </div>

                            <input type="hidden"
                                   name="vehiculo_id"
                                   value="{{ $mantenimiento->vehiculo_id }}">

                        </div>


                        {{-- TIPO --}}

                        <div class="col-md-6">

                            <label class="edit-label">
                                Tipo de mantenimiento
                                <span class="required">*</span>
                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-wrench"></i>

                                <select name="tipo"
                                        class="edit-select"
                                        required>

                                    <option value="Preventivo"
                                        {{ $mantenimiento->tipo == 'Preventivo' ? 'selected' : '' }}>
                                        Preventivo
                                    </option>

                                    <option value="Correctivo"
                                        {{ $mantenimiento->tipo == 'Correctivo' ? 'selected' : '' }}>
                                        Correctivo
                                    </option>

                                    <option value="Cambio de aceite"
                                        {{ $mantenimiento->tipo == 'Cambio de aceite' ? 'selected' : '' }}>
                                        Cambio de aceite
                                    </option>

                                    <option value="Revisión"
                                        {{ $mantenimiento->tipo == 'Revisión' ? 'selected' : '' }}>
                                        Revisión
                                    </option>

                                    <option value="Otro"
                                        {{ $mantenimiento->tipo == 'Otro' ? 'selected' : '' }}>
                                        Otro
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- DATOS DEL MANTENIMIENTO --}}

                <div class="edit-section">

                    <div class="section-title">

                        <i class="fa fa-tools"></i>

                        Datos del mantenimiento

                    </div>


                    <div class="row g-3">


                        {{-- FECHA DE SOLICITUD --}}

                        <div class="col-md-4">

                            <label class="edit-label">

                                Fecha de solicitud

                                <span class="required">*</span>

                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-calendar-plus"></i>

                                <input type="date"
                                       name="fecha_solicitud"
                                       class="edit-input"
                                       value="{{ $mantenimiento->fecha_solicitud }}"
                                       required>

                            </div>

                        </div>


                        {{-- FECHA --}}

                        <div class="col-md-4">

                            <label class="edit-label">

                                Fecha

                                <span class="required">*</span>

                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-calendar"></i>

                                <input type="date"
                                       name="fecha"
                                       class="edit-input"
                                       value="{{ $mantenimiento->fecha }}"
                                       required>

                            </div>

                        </div>


                        {{-- TALLER --}}

                        <div class="col-md-4">

                            <label class="edit-label">

                                Taller

                                <span class="required">*</span>

                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-building"></i>

                                <input type="text"
                                       name="taller"
                                       class="edit-input"
                                       value="{{ $mantenimiento->taller }}"
                                       required>

                            </div>

                        </div>


                        {{-- KILOMETRAJE --}}

                        <div class="col-md-4">

                            <label class="edit-label">

                                Kilometraje

                                <span class="required">*</span>

                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-road"></i>

                                <input type="number"
                                       name="kilometraje"
                                       class="edit-input"
                                       value="{{ $mantenimiento->kilometraje }}"
                                       min="0"
                                       required>

                            </div>

                        </div>


                        {{-- COSTO --}}

                        <div class="col-md-4">

                            <label class="edit-label">

                                Costo

                                <span class="required">*</span>

                            </label>

                            <div class="cost-wrapper">

                                <span class="cost-prefix">$</span>

                                <input type="number"
                                       name="costo"
                                       class="edit-input"
                                       value="{{ $mantenimiento->costo }}"
                                       min="0"
                                       step="0.01"
                                       required>

                            </div>

                        </div>


                        {{-- TÉCNICO --}}

                        <div class="col-md-4">

                            <label class="edit-label">
                                Técnico
                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-user-cog"></i>

                                <input type="text"
                                       name="tecnico"
                                       class="edit-input"
                                       value="{{ $mantenimiento->tecnico }}">

                            </div>

                        </div>


                        {{-- FACTURA --}}

                        <div class="col-md-4">

                            <label class="edit-label">
                                Factura
                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-file-invoice"></i>

                                <input type="text"
                                       name="factura"
                                       class="edit-input"
                                       value="{{ $mantenimiento->factura }}">

                            </div>

                        </div>

                    </div>

                </div>



                {{-- DESCRIPCIÓN --}}

                <div class="edit-section">

                    <div class="section-title">

                        <i class="fa fa-align-left"></i>

                        Descripción

                    </div>


                    <label class="edit-label">
                        Descripción del trabajo realizado
                    </label>

                    <textarea name="descripcion"
                              class="edit-textarea"
                              placeholder="Describe el mantenimiento realizado...">{{ $mantenimiento->descripcion }}</textarea>

                </div>



                {{-- PRÓXIMO MANTENIMIENTO --}}

                <div class="edit-section">

                    <div class="section-title">

                        <i class="fa fa-calendar-check"></i>

                        Programación y estado

                    </div>


                    <div class="row g-3">


                        {{-- PRÓXIMO MANTENIMIENTO --}}

                        <div class="col-md-6">

                            <label class="edit-label">

                                Próximo mantenimiento

                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-calendar-alt"></i>

                                <input type="date"
                                       name="proximo_mantenimiento"
                                       class="edit-input"
                                       value="{{ $mantenimiento->proximo_mantenimiento }}">

                            </div>

                        </div>


                        {{-- APROBACIÓN --}}

                        <div class="col-md-6">

                            <label class="edit-label">

                                Aprobación

                                <span class="required">*</span>

                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-clipboard-check"></i>

                                <select name="aprobacion"
                                        class="edit-select"
                                        required>

                                    <option value="Pendiente"
                                        {{ $mantenimiento->aprobacion == 'Pendiente' ? 'selected' : '' }}>
                                        Pendiente
                                    </option>

                                    <option value="Aprobada"
                                        {{ $mantenimiento->aprobacion == 'Aprobada' ? 'selected' : '' }}>
                                        Aprobada
                                    </option>

                                    <option value="No aprobada"
                                        {{ $mantenimiento->aprobacion == 'No aprobada' ? 'selected' : '' }}>
                                        No aprobada
                                    </option>

                                </select>

                            </div>

                        </div>


                        {{-- ESTADO --}}

                        <div class="col-md-6">

                            <label class="edit-label">

                                Estado

                                <span class="required">*</span>

                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-circle-check"></i>

                                <select name="estado"
                                        class="edit-select"
                                        required>

                                    <option value="Pendiente"
                                        {{ $mantenimiento->estado == 'Pendiente' ? 'selected' : '' }}>
                                        Pendiente
                                    </option>

                                    <option value="En proceso"
                                        {{ $mantenimiento->estado == 'En proceso' ? 'selected' : '' }}>
                                        En proceso
                                    </option>

                                    <option value="Finalizado"
                                        {{ $mantenimiento->estado == 'Finalizado' ? 'selected' : '' }}>
                                        Finalizado
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>


            </div>


            {{-- FOOTER --}}

            <div class="edit-footer">

                <a href="{{ route('mantenimientos.index') }}"
                   class="btn-cancel">

                    <i class="fa fa-arrow-left"></i>

                    Cancelar

                </a>


                <button type="submit"
                        class="btn-save">

                    <i class="fa fa-save"></i>

                    Guardar cambios

                </button>

            </div>


        </form>

    </div>

</div>

@endsection