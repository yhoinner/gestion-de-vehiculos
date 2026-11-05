@extends('layouts.admin')

@section('titulo', 'Registrar Mantenimiento')

@section('contenido')

<style>

    .maintenance-create-container {
        padding: 5px 5px 30px;
    }

    .maintenance-create-card {
        background: #ffffff;
        border: none;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(15, 23, 42, 0.07);
        overflow: hidden;
    }

    /* HEADER */

    .create-header {
        padding: 24px 28px;
        border-bottom: 1px solid #edf1f7;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .create-header-icon {
        width: 48px;
        height: 48px;
        border-radius: 13px;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        box-shadow: 0 5px 12px rgba(37, 99, 235, 0.22);
    }

    .create-header h3 {
        margin: 0;
        color: #172033;
        font-size: 21px;
        font-weight: 700;
    }

    .create-header p {
        margin: 4px 0 0;
        color: #98a2b3;
        font-size: 13px;
    }

    /* ERRORES */

    .validation-alert {
        margin: 20px 28px 0;
        padding: 14px 16px;
        border: 1px solid #fecaca;
        border-radius: 11px;
        background: #fff5f5;
        color: #b42318;
    }

    .validation-alert-title {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .validation-alert ul {
        margin: 0;
        padding-left: 24px;
        font-size: 13px;
    }

    .validation-alert li {
        margin-bottom: 3px;
    }

    /* BODY */

    .create-body {
        padding: 28px;
    }

    /* SECCIONES */

    .create-section {
        margin-bottom: 30px;
    }

    .create-section:last-child {
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

    /* LABELS */

    .create-label {
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

    .create-input,
    .create-select,
    .create-textarea {
        width: 100%;
        border: 1px solid #d0d5dd;
        border-radius: 10px;
        background: #ffffff;
        color: #344054;
        font-size: 14px;
        padding: 11px 13px;
        outline: none;
        transition: all .18s ease;
    }

    .create-input,
    .create-select {
        height: 44px;
    }

    .create-input:focus,
    .create-select:focus,
    .create-textarea:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
    }

    .create-textarea {
        min-height: 110px;
        resize: vertical;
    }

    /* ICONOS */

    .input-icon-wrapper {
        position: relative;
    }

    .input-icon-wrapper > i {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: #98a2b3;
        font-size: 13px;
        pointer-events: none;
        z-index: 2;
    }

    .input-icon-wrapper .create-input,
    .input-icon-wrapper .create-select {
        padding-left: 37px;
    }

    /* SELECT VEHÍCULO */

    .vehicle-select-wrapper {
        position: relative;
    }

    .vehicle-select-wrapper > i {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: #2563eb;
        font-size: 14px;
        pointer-events: none;
        z-index: 2;
    }

    .vehicle-select-wrapper .create-select {
        padding-left: 38px;
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
        z-index: 2;
    }

    .cost-wrapper .create-input {
        padding-left: 29px;
    }

    /* AYUDA */

    .field-help {
        margin-top: 5px;
        color: #98a2b3;
        font-size: 11px;
    }

    /* ESTADO */

    .status-wrapper {
        position: relative;
    }

    .status-wrapper > i {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        color: #d97706;
        font-size: 13px;
        pointer-events: none;
        z-index: 2;
    }

    .status-wrapper .create-select {
        padding-left: 37px;
    }

    /* FOOTER */

    .create-footer {
        padding: 18px 28px;
        background: #fafbfc;
        border-top: 1px solid #edf1f7;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;
    }

    .btn-cancel-create {
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

    .btn-cancel-create:hover {
        background: #e2e8f0;
        color: #1e293b;
    }

    .btn-save-create {
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

    .btn-save-create:hover {
        transform: translateY(-1px);
        box-shadow: 0 7px 16px rgba(37, 99, 235, 0.28);
    }

    /* RESPONSIVE */

    @media (max-width: 768px) {

        .create-body {
            padding: 20px;
        }

        .validation-alert {
            margin-left: 20px;
            margin-right: 20px;
        }

        .create-footer {
            padding: 15px 20px;
            flex-direction: column-reverse;
        }

        .btn-cancel-create,
        .btn-save-create {
            width: 100%;
            justify-content: center;
        }

    }

</style>


<div class="maintenance-create-container">

    <div class="maintenance-create-card">


        {{-- ENCABEZADO --}}

        <div class="create-header">

            <div class="create-header-icon">
                <i class="fa fa-tools"></i>
            </div>

            <div>

                <h3>Registrar Mantenimiento</h3>

                <p>
                    Registra la información del mantenimiento realizado al vehículo
                </p>

            </div>

        </div>


        {{-- FORMULARIO --}}

        <form action="{{ route('mantenimientos.store') }}"
              method="POST">

            @csrf


            {{-- ERRORES --}}

            @if ($errors->any())

                <div class="validation-alert">

                    <div class="validation-alert-title">

                        <i class="fa fa-circle-exclamation"></i>

                        Se encontraron algunos errores

                    </div>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <div class="create-body">


                {{-- INFORMACIÓN DEL VEHÍCULO --}}

                <div class="create-section">

                    <div class="section-title">

                        <i class="fa fa-car"></i>

                        Información del vehículo

                    </div>


                    <div class="row g-3">


                        {{-- VEHÍCULO --}}

                        <div class="col-md-6">

                            <label class="create-label">

                                Vehículo

                                <span class="required">*</span>

                            </label>

                            <div class="vehicle-select-wrapper">

                                <i class="fa fa-car"></i>

                                <select name="vehiculo_id"
                                        class="create-select"
                                        required>

                                    <option value="">
                                        Seleccione un vehículo...
                                    </option>

                                    @foreach($vehiculos as $vehiculo)

                                        <option value="{{ $vehiculo->id }}"
                                            {{ old('vehiculo_id') == $vehiculo->id ? 'selected' : '' }}>

                                            {{ $vehiculo->placa }} -
                                            {{ $vehiculo->marca }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>


                        {{-- TIPO --}}

                        <div class="col-md-6">

                            <label class="create-label">

                                Tipo de mantenimiento

                                <span class="required">*</span>

                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-wrench"></i>

                                <select name="tipo"
                                        class="create-select"
                                        required>

                                    <option value="">
                                        Seleccione un tipo...
                                    </option>

                                    <option value="Cambio de aceite"
                                        {{ old('tipo') == 'Cambio de aceite' ? 'selected' : '' }}>
                                        Cambio de aceite
                                    </option>

                                    <option value="Preventivo"
                                        {{ old('tipo') == 'Preventivo' ? 'selected' : '' }}>
                                        Preventivo
                                    </option>

                                    <option value="Correctivo"
                                        {{ old('tipo') == 'Correctivo' ? 'selected' : '' }}>
                                        Correctivo
                                    </option>

                                    <option value="Frenos"
                                        {{ old('tipo') == 'Frenos' ? 'selected' : '' }}>
                                        Frenos
                                    </option>

                                    <option value="Batería"
                                        {{ old('tipo') == 'Batería' ? 'selected' : '' }}>
                                        Batería
                                    </option>

                                    <option value="Llantas"
                                        {{ old('tipo') == 'Llantas' ? 'selected' : '' }}>
                                        Llantas
                                    </option>

                                    <option value="Motor"
                                        {{ old('tipo') == 'Motor' ? 'selected' : '' }}>
                                        Motor
                                    </option>

                                    <option value="Suspensión"
                                        {{ old('tipo') == 'Suspensión' ? 'selected' : '' }}>
                                        Suspensión
                                    </option>

                                    <option value="Otro"
                                        {{ old('tipo') == 'Otro' ? 'selected' : '' }}>
                                        Otro
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- DATOS DEL MANTENIMIENTO --}}

                <div class="create-section">

                    <div class="section-title">

                        <i class="fa fa-screwdriver-wrench"></i>

                        Datos del mantenimiento

                    </div>


                    <div class="row g-3">


                        {{-- FECHA DE SOLICITUD --}}

                        <div class="col-md-4">

                            <label class="create-label">

                                Fecha de solicitud

                                <span class="required">*</span>

                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-calendar-plus"></i>

                                <input
                                    type="date"
                                    name="fecha_solicitud"
                                    class="create-input"
                                    value="{{ old('fecha_solicitud', date('Y-m-d')) }}"
                                    required>

                            </div>

                        </div>


                        {{-- FECHA --}}

                        <div class="col-md-4">

                            <label class="create-label">

                                Fecha

                                <span class="required">*</span>

                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-calendar"></i>

                                <input
                                    type="date"
                                    name="fecha"
                                    class="create-input"
                                    value="{{ old('fecha', date('Y-m-d')) }}"
                                    required>

                            </div>

                        </div>


                        {{-- KILOMETRAJE --}}

                        <div class="col-md-4">

                            <label class="create-label">

                                Kilometraje

                                <span class="required">*</span>

                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-road"></i>

                                <input
                                    type="number"
                                    name="kilometraje"
                                    class="create-input"
                                    value="{{ old('kilometraje') }}"
                                    min="0"
                                    placeholder="Ej. 135000"
                                    required>

                            </div>

                        </div>


                        {{-- VALOR --}}

                        <div class="col-md-4">

                            <label class="create-label">

                                Valor

                                <span class="required">*</span>

                            </label>

                            <div class="cost-wrapper">

                                <span class="cost-prefix">$</span>

                                <input
                                    type="number"
                                    name="costo"
                                    class="create-input"
                                    value="{{ old('costo') }}"
                                    min="0"
                                    placeholder="0"
                                    required>

                            </div>

                        </div>


                        {{-- TALLER --}}

                        <div class="col-md-6">

                            <label class="create-label">

                                Taller

                                <span class="required">*</span>

                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-building"></i>

                                <input
                                    type="text"
                                    name="taller"
                                    class="create-input"
                                    value="{{ old('taller') }}"
                                    maxlength="150"
                                    placeholder="Nombre del taller"
                                    required>

                            </div>

                        </div>


                        {{-- TÉCNICO --}}

                        <div class="col-md-6">

                            <label class="create-label">

                                Técnico Responsable

                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-user-cog"></i>

                                <input
                                    type="text"
                                    name="tecnico"
                                    class="create-input"
                                    value="{{ old('tecnico') }}"
                                    maxlength="100"
                                    placeholder="Nombre del técnico">

                            </div>

                        </div>


                        {{-- FACTURA --}}

                        <div class="col-md-6">

                            <label class="create-label">

                                Número de Factura

                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-file-invoice"></i>

                                <input
                                    type="text"
                                    name="factura"
                                    class="create-input"
                                    value="{{ old('factura') }}"
                                    maxlength="50"
                                    placeholder="Número de factura">

                            </div>

                        </div>


                        {{-- PRÓXIMO MANTENIMIENTO --}}

                        <div class="col-md-6">

                            <label class="create-label">

                                Próximo mantenimiento

                            </label>

                            <div class="input-icon-wrapper">

                                <i class="fa fa-calendar-check"></i>

                                <input
                                    type="date"
                                    name="proximo_mantenimiento"
                                    class="create-input"
                                    value="{{ old('proximo_mantenimiento') }}">

                            </div>

                            <div class="field-help">
                                Fecha recomendada para realizar el próximo mantenimiento.
                            </div>

                        </div>

                    </div>

                </div>



                {{-- DESCRIPCIÓN --}}

                <div class="create-section">

                    <div class="section-title">

                        <i class="fa fa-align-left"></i>

                        Descripción

                    </div>


                    <label class="create-label">

                        Descripción del trabajo realizado

                    </label>

                    <textarea
                        name="descripcion"
                        rows="4"
                        class="create-textarea"
                        placeholder="Describe los trabajos realizados, repuestos utilizados, observaciones, etc.">{{ old('descripcion') }}</textarea>

                </div>



                {{-- ESTADO --}}

                <div class="create-section">

                    <div class="section-title">

                        <i class="fa fa-circle-check"></i>

                        Estado del mantenimiento

                    </div>


                    <div class="row g-3">

                        {{-- APROBACIÓN --}}

                        <div class="col-md-4">

                            <label class="create-label">

                                Aprobación

                                <span class="required">*</span>

                            </label>

                            <div class="status-wrapper">

                                <i class="fa fa-clipboard-check"></i>

                                <select
                                    name="aprobacion"
                                    class="create-select"
                                    required>

                                    <option value="Pendiente"
                                        {{ old('aprobacion', 'Pendiente') == 'Pendiente' ? 'selected' : '' }}>
                                        Pendiente
                                    </option>

                                    <option value="Aprobada"
                                        {{ old('aprobacion') == 'Aprobada' ? 'selected' : '' }}>
                                        Aprobada
                                    </option>

                                    <option value="No aprobada"
                                        {{ old('aprobacion') == 'No aprobada' ? 'selected' : '' }}>
                                        No aprobada
                                    </option>

                                </select>

                            </div>

                        </div>


                        <div class="col-md-4">

                            <label class="create-label">

                                Estado

                            </label>

                            <div class="status-wrapper">

                                <i class="fa fa-circle"></i>

                                <select
                                    name="estado"
                                    class="create-select">

                                    <option value="Pendiente"
                                        {{ old('estado', 'Pendiente') == 'Pendiente' ? 'selected' : '' }}>
                                        Pendiente
                                    </option>

                                    <option value="En proceso"
                                        {{ old('estado') == 'En proceso' ? 'selected' : '' }}>
                                        En proceso
                                    </option>

                                    <option value="Finalizado"
                                        {{ old('estado') == 'Finalizado' ? 'selected' : '' }}>
                                        Finalizado
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>


            </div>


            {{-- FOOTER --}}

            <div class="create-footer">

                <a href="{{ route('mantenimientos.index') }}"
                   class="btn-cancel-create">

                    <i class="fa fa-arrow-left"></i>

                    Cancelar

                </a>


                <button type="submit"
                        class="btn-save-create">

                    <i class="fa fa-save"></i>

                    Guardar Mantenimiento

                </button>

            </div>


        </form>

    </div>

</div>

@endsection