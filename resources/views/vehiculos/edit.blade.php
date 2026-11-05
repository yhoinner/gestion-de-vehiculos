@extends('layouts.admin')

@section('titulo', 'Editar Vehículo')

@section('contenido')

<style>

    .editar-vehiculo {
        max-width: 1250px;
        margin: 0 auto;
        padding-bottom: 30px;
    }

    .editar-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 22px;
    }

    .editar-titulo {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .editar-icono {
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        font-size: 21px;
        box-shadow: 0 8px 20px rgba(37,99,235,.20);
    }

    .editar-titulo h1 {
        margin: 0;
        color: #172033;
        font-size: 25px;
        font-weight: 800;
    }

    .editar-titulo p {
        margin: 4px 0 0;
        color: #64748b;
        font-size: 12px;
    }

    .btn-volver {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 15px;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        background: white;
        color: #475569;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: .2s;
    }

    .btn-volver:hover {
        color: #2563eb;
        background: #eff6ff;
        border-color: #bfdbfe;
    }

    .editar-card {
        background: white;
        border: 1px solid #e5eaf2;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(15,23,42,.06);
        overflow: hidden;
    }

    .editar-section {
        padding: 25px 28px;
        border-bottom: 1px solid #edf0f5;
    }

    .section-header {
        display: flex;
        align-items: center;
        gap: 11px;
        margin-bottom: 22px;
    }

    .section-icon {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        background: #eff6ff;
        color: #2563eb;
        font-size: 15px;
    }

    .section-header h3 {
        margin: 0;
        color: #172033;
        font-size: 15px;
        font-weight: 800;
    }

    .section-header p {
        margin: 3px 0 0;
        color: #94a3b8;
        font-size: 10px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
    }

    .form-grid-2 {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .campo {
        display: flex;
        flex-direction: column;
    }

    .campo label {
        margin-bottom: 7px;
        color: #334155;
        font-size: 11px;
        font-weight: 700;
    }

    .required {
        color: #ef4444;
    }

    .campo input,
    .campo select {
        width: 100%;
        height: 43px;
        box-sizing: border-box;
        padding: 0 13px;
        border: 1px solid #dbe2ea;
        border-radius: 10px;
        outline: none;
        background: #f8fafc;
        color: #334155;
        font-size: 12px;
        transition: .2s;
    }

    .campo input:focus,
    .campo select:focus {
        border-color: #60a5fa;
        background: white;
        box-shadow: 0 0 0 3px rgba(59,130,246,.10);
    }

    .campo small {
        margin-top: 5px;
        color: #94a3b8;
        font-size: 9px;
    }

    .placa-input,
    .vin-input {
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: .7px;
    }

    .campo-condicional {
        display: none;
    }

    .campo-condicional.mostrar {
        display: flex;
    }

    .info-box {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-top: 18px;
        padding: 12px 14px;
        border-radius: 10px;
        background: #eff6ff;
        border: 1px solid #dbeafe;
        color: #1e40af;
        font-size: 11px;
    }

    .extintor-info {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 7px;
        color: #64748b;
        font-size: 9px;
    }

    .errores {
        margin: 22px 28px 0;
        padding: 14px 17px;
        border: 1px solid #fecaca;
        border-radius: 12px;
        background: #fef2f2;
        color: #991b1b;
        font-size: 12px;
    }

    .errores strong {
        display: block;
        margin-bottom: 7px;
    }

    .errores ul {
        margin: 0;
        padding-left: 18px;
    }

    .editar-footer {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;
        padding: 20px 28px;
        background: #f8fafc;
        border-top: 1px solid #edf0f5;
    }

    .btn-cancelar,
    .btn-actualizar {
        min-width: 155px;
        height: 43px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 0 18px;
        border-radius: 10px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s;
    }

    .btn-cancelar {
        border: 1px solid #dbe2ea;
        background: white;
        color: #64748b;
        text-decoration: none;
    }

    .btn-cancelar:hover {
        background: #f1f5f9;
        color: #475569;
    }

    .btn-actualizar {
        border: none;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        box-shadow: 0 7px 16px rgba(37,99,235,.20);
    }

    .btn-actualizar:hover {
        transform: translateY(-1px);
        box-shadow: 0 10px 20px rgba(37,99,235,.28);
    }

    @media(max-width:1000px) {

        .form-grid {
            grid-template-columns: repeat(2, 1fr);
        }

    }

    @media(max-width:700px) {

        .editar-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .btn-volver {
            width: 100%;
            justify-content: center;
        }

        .editar-section {
            padding: 20px 16px;
        }

        .form-grid,
        .form-grid-2 {
            grid-template-columns: 1fr;
        }

        .editar-footer {
            flex-direction: column-reverse;
            padding: 18px 16px;
        }

        .btn-cancelar,
        .btn-actualizar {
            width: 100%;
        }

    }

</style>


<div class="editar-vehiculo">

    {{-- HEADER --}}

    <div class="editar-header">

        <div class="editar-titulo">

            <div class="editar-icono">
                <i class="fas fa-car"></i>
            </div>

            <div>

                <h1>Editar vehículo</h1>

                <p>
                    Actualice la información del vehículo registrado.
                </p>

            </div>

        </div>


        <a
            href="{{ route('vehiculos.index') }}"
            class="btn-volver"
        >

            <i class="fas fa-arrow-left"></i>

            Volver a vehículos

        </a>

    </div>


    {{-- CARD --}}

    <div class="editar-card">


        {{-- ERRORES --}}

        @if($errors->any())

            <div class="errores">

                <strong>
                    <i class="fas fa-exclamation-circle"></i>
                    Revise los siguientes campos:
                </strong>

                <ul>

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('vehiculos.update', $vehiculo) }}"
            method="POST"
             enctype="multipart/form-data"
        >

            @csrf

            @method('PUT')


            {{-- =====================================================
                 INFORMACIÓN BÁSICA
            ====================================================== --}}

            <div class="editar-section">

                <div class="section-header">

                    <div class="section-icon">
                        <i class="fas fa-id-card"></i>
                    </div>

                    <div>

                        <h3>Información básica</h3>

                        <p>
                            Identificación general del vehículo
                        </p>

                    </div>

                </div>


                <div class="form-grid">


                    {{-- PLACA --}}

                    <div class="campo">

                        <label>
                            Placa <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="placa"
                            class="placa-input"
                            maxlength="10"
                            value="{{ old('placa', $vehiculo->placa) }}"
                            placeholder="Ej: ABC123"
                            required
                        >

                    </div>


                    {{-- TIPO --}}

                    <div class="campo">

                        <label>
                            Tipo de vehículo
                            <span class="required">*</span>
                        </label>

                        <select
                            name="tipo_vehiculo"
                            required
                        >

                            <option value="">
                                Seleccione...
                            </option>

                            <option value="Automóvil"
                                {{ old('tipo_vehiculo', $vehiculo->tipo_vehiculo) == 'Automóvil' ? 'selected' : '' }}>
                                Automóvil
                            </option>

                            <option value="Camioneta"
                                {{ old('tipo_vehiculo', $vehiculo->tipo_vehiculo) == 'Camioneta' ? 'selected' : '' }}>
                                Camioneta
                            </option>

                            <option value="Motocicleta"
                                {{ old('tipo_vehiculo', $vehiculo->tipo_vehiculo) == 'Motocicleta' ? 'selected' : '' }}>
                                Motocicleta
                            </option>

                            <option value="Camión"
                                {{ old('tipo_vehiculo', $vehiculo->tipo_vehiculo) == 'Camión' ? 'selected' : '' }}>
                                Camión
                            </option>

                        </select>

                    </div>


                    {{-- MARCA --}}

                    <div class="campo">

                        <label>
                            Marca <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="marca"
                            value="{{ old('marca', $vehiculo->marca) }}"
                            placeholder="Ej: Toyota"
                            required
                        >

                    </div>


                    {{-- LÍNEA --}}

                    <div class="campo">

                        <label>
                            Línea <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="linea"
                            value="{{ old('linea', $vehiculo->linea) }}"
                            placeholder="Ej: Hilux"
                            required
                        >

                    </div>


                    {{-- MODELO --}}

                    <div class="campo">

                        <label>
                            Modelo <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="modelo"
                            value="{{ old('modelo', $vehiculo->modelo) }}"
                            placeholder="Ej: 2024"
                            required
                        >

                        <small>
                            El modelo corresponde al año/modelo del vehículo.
                        </small>

                    </div>


                    {{-- COLOR --}}

                    <div class="campo">

                        <label>
                            Color <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="color"
                            value="{{ old('color', $vehiculo->color) }}"
                            placeholder="Ej: Blanco"
                            required
                        >

                    </div>

                </div>

            </div>


            {{-- =====================================================
                 PROTECCIÓN Y SERVICIO
            ====================================================== --}}

            <div class="editar-section">

                <div class="section-header">

                    <div class="section-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>

                    <div>

                        <h3>Protección y servicio</h3>

                        <p>
                            Clasificación operativa y características de protección
                        </p>

                    </div>

                </div>


                <div class="form-grid">


                    {{-- TIPO PROTECCIÓN --}}

                    <div class="campo">

                        <label>
                            Tipo de protección
                            <span class="required">*</span>
                        </label>

                        <select
                            name="tipo_proteccion"
                            id="tipoProteccion"
                            required
                        >

                            <option value="Convencional"
                                {{ old('tipo_proteccion', $vehiculo->tipo_proteccion ?? 'Convencional') == 'Convencional' ? 'selected' : '' }}>
                                Convencional
                            </option>

                            <option value="Blindado"
                                {{ old('tipo_proteccion', $vehiculo->tipo_proteccion) == 'Blindado' ? 'selected' : '' }}>
                                Blindado
                            </option>

                        </select>

                    </div>


                    {{-- NIVEL BLINDAJE --}}

                    <div
                        class="campo campo-condicional"
                        id="nivelBlindajeBox"
                    >

                        <label>
                            Nivel de blindaje
                            <span class="required">*</span>
                        </label>

                        <select
                            name="nivel_blindaje"
                            id="nivelBlindaje"
                        >

                            <option value="">
                                Seleccione...
                            </option>

                            <option value="II"
                                {{ old('nivel_blindaje', $vehiculo->nivel_blindaje) == 'II' ? 'selected' : '' }}>
                                II
                            </option>

                            <option value="IIIA"
                                {{ old('nivel_blindaje', $vehiculo->nivel_blindaje) == 'IIIA' ? 'selected' : '' }}>
                                IIIA
                            </option>

                            <option value="III"
                                {{ old('nivel_blindaje', $vehiculo->nivel_blindaje) == 'III' ? 'selected' : '' }}>
                                III
                            </option>

                            <option value="IV"
                                {{ old('nivel_blindaje', $vehiculo->nivel_blindaje) == 'IV' ? 'selected' : '' }}>
                                IV
                            </option>

                            <option value="V"
                                {{ old('nivel_blindaje', $vehiculo->nivel_blindaje) == 'V' ? 'selected' : '' }}>
                                V
                            </option>

                        </select>

                    </div>


                    {{-- CLASE SERVICIO --}}

                    <div class="campo">

                        <label>
                            Clase de servicio
                            <span class="required">*</span>
                        </label>

                        <select
                            name="clase_servicio"
                            required
                        >

                            <option value="">
                                Seleccione...
                            </option>

                            <option value="Misional"
                                {{ old('clase_servicio', $vehiculo->clase_servicio) == 'Misional' ? 'selected' : '' }}>
                                Misional
                            </option>

                            <option value="Administrativo"
                                {{ old('clase_servicio', $vehiculo->clase_servicio) == 'Administrativo' ? 'selected' : '' }}>
                                Administrativo
                            </option>

                        </select>

                    </div>

                </div>


                <div class="info-box">

                    <i class="fas fa-info-circle"></i>

                    <div>

                        <strong>Tipo de protección:</strong>

                        Un vehículo blindado debe tener registrado
                        su nivel de blindaje. Los vehículos convencionales
                        no requieren este dato.

                    </div>

                </div>

            </div>


            {{-- =====================================================
                 DATOS TÉCNICOS
            ====================================================== --}}

            <div class="editar-section">

                <div class="section-header">

                    <div class="section-icon">
                        <i class="fas fa-cogs"></i>
                    </div>

                    <div>

                        <h3>Datos técnicos</h3>

                        <p>
                            Información mecánica e identificación técnica
                        </p>

                    </div>

                </div>


                <div class="form-grid">


                    {{-- VIN --}}

                    <div class="campo">

                        <label>
                            VIN <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="vin"
                            class="vin-input"
                            maxlength="17"
                            minlength="17"
                            value="{{ old('vin', $vehiculo->vin) }}"
                            placeholder="17 caracteres"
                            required
                        >

                        <small>
                            Código de identificación de 17 caracteres.
                        </small>

                    </div>


                    {{-- MOTOR --}}

                    <div class="campo">

                        <label>
                            Número de motor
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="motor"
                            value="{{ old('motor', $vehiculo->motor) }}"
                            placeholder="Número de motor"
                            required
                        >

                    </div>


                    {{-- CILINDRAJE --}}

                    <div class="campo">

                        <label>
                            Cilindraje
                            <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            name="cilindraje"
                            min="50"
                            max="10000"
                            value="{{ old('cilindraje', $vehiculo->cilindraje) }}"
                            placeholder="Ej: 2800"
                            required
                        >

                    </div>


                    {{-- COMBUSTIBLE --}}

                    <div class="campo">

                        <label>
                            Combustible
                            <span class="required">*</span>
                        </label>

                        <select
                            name="combustible"
                            required
                        >

                            <option value="Gasolina"
                                {{ old('combustible', $vehiculo->combustible) == 'Gasolina' ? 'selected' : '' }}>
                                Gasolina
                            </option>

                            <option value="Diésel"
                                {{ old('combustible', $vehiculo->combustible) == 'Diésel' ? 'selected' : '' }}>
                                Diésel
                            </option>

                            <option value="Gas"
                                {{ old('combustible', $vehiculo->combustible) == 'Gas' ? 'selected' : '' }}>
                                Gas
                            </option>

                            <option value="Híbrido"
                                {{ old('combustible', $vehiculo->combustible) == 'Híbrido' ? 'selected' : '' }}>
                                Híbrido
                            </option>

                            <option value="Eléctrico"
                                {{ old('combustible', $vehiculo->combustible) == 'Eléctrico' ? 'selected' : '' }}>
                                Eléctrico
                            </option>

                        </select>

                    </div>


                    {{-- TRANSMISIÓN --}}

                    <div class="campo">

                        <label>
                            Transmisión
                            <span class="required">*</span>
                        </label>

                        <select
                            name="transmision"
                            required
                        >

                            <option value="Manual"
                                {{ old('transmision', $vehiculo->transmision) == 'Manual' ? 'selected' : '' }}>
                                Manual
                            </option>

                            <option value="Automática"
                                {{ old('transmision', $vehiculo->transmision) == 'Automática' ? 'selected' : '' }}>
                                Automática
                            </option>

                            <option value="CVT"
                                {{ old('transmision', $vehiculo->transmision) == 'CVT' ? 'selected' : '' }}>
                                CVT
                            </option>

                        </select>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                 EQUIPAMIENTO
            ====================================================== --}}

            <div class="editar-section">

                <div class="section-header">

                    <div class="section-icon">
                        <i class="fas fa-tools"></i>
                    </div>

                    <div>

                        <h3>Equipamiento del vehículo</h3>

                        <p>
                            Elementos y características adicionales
                        </p>

                    </div>

                </div>


                <div class="form-grid">


                    {{-- ADBLUE --}}

                    <div class="campo">

                        <label>
                            ¿Tiene AdBlue?
                            <span class="required">*</span>
                        </label>

                        <select
                            name="tiene_adblue"
                            id="tieneAdblue"
                            required
                        >

                            <option value="0"
                                {{ old('tiene_adblue', $vehiculo->tiene_adblue) == 0 ? 'selected' : '' }}>
                                No
                            </option>

                            <option value="1"
                                {{ old('tiene_adblue', $vehiculo->tiene_adblue) == 1 ? 'selected' : '' }}>
                                Sí
                            </option>

                        </select>

                    </div>


                    {{-- NIVEL ADBLUE --}}

                    <div
                        class="campo campo-condicional"
                        id="nivelAdblueBox"
                    >

                        <label>
                            Nivel de AdBlue (%)
                            <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            name="nivel_adblue"
                            id="nivelAdblue"
                            min="0"
                            max="100"
                            step="0.01"
                            value="{{ old('nivel_adblue', $vehiculo->nivel_adblue) }}"
                            placeholder="Ej: 80"
                        >

                    </div>


                    {{-- KIT --}}

                    <div class="campo">

                        <label>
                            ¿Tiene kit de carretera?
                            <span class="required">*</span>
                        </label>

                        <select
                            name="kit_carretera"
                            required
                        >

                            <option value="0"
                                {{ old('kit_carretera', $vehiculo->kit_carretera) == 0 ? 'selected' : '' }}>
                                No
                            </option>

                            <option value="1"
                                {{ old('kit_carretera', $vehiculo->kit_carretera) == 1 ? 'selected' : '' }}>
                                Sí
                            </option>

                        </select>

                    </div>


                    {{-- EXTINTOR --}}

                    <div class="campo">

                        <label>
                            Vencimiento del extintor
                        </label>

                        <input
                            type="date"
                            name="fecha_vencimiento_extintor"
                            value="{{ old('fecha_vencimiento_extintor', $vehiculo->fecha_vencimiento_extintor) }}"
                        >

                        <div class="extintor-info">

                            <i class="fas fa-fire-extinguisher"></i>

                            Fecha utilizada para generar alertas.

                        </div>

                    </div>

                </div>

            </div>


            @php
                $soatDoc = $vehiculo->documentos->where('tipo', 'SOAT')->first();
                $tecnoDoc = $vehiculo->documentos->where('tipo', 'Tecnomecanica')->first();
                $tarjetaDoc = $vehiculo->documentos->where('tipo', 'Tarjeta Propiedad')->first();
                $fotoDoc = $vehiculo->documentos->where('tipo', 'Foto Vehiculo')->first();
            @endphp

            {{-- =====================================================
                 SOAT Y TECNOMECÁNICA
            ====================================================== --}}

            <div class="editar-section">

                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-file-shield"></i>
                    </div>
                    <div>
                        <h3>SOAT y Tecnomecánica</h3>
                        <p>Actualice vigencias, información y archivos del vehículo.</p>
                    </div>
                </div>

                <div class="form-grid">

                    {{-- SOAT --}}
                    <div class="campo">
                        <label>¿Tiene SOAT? <span class="required">*</span></label>
                        <select name="tiene_soat" id="tieneSoat" required>
                            <option value="0" {{ old('tiene_soat', $soatDoc?->tiene_documento ?? 0) == 0 ? 'selected' : '' }}>No</option>
                            <option value="1" {{ old('tiene_soat', $soatDoc?->tiene_documento ?? 0) == 1 ? 'selected' : '' }}>Sí</option>
                        </select>
                    </div>

                    <div class="campo campo-condicional" id="soatDatosBox">
                        <label>Aseguradora</label>
                        <input type="text" name="soat_aseguradora" maxlength="150"
                               value="{{ old('soat_aseguradora', $soatDoc?->aseguradora) }}">
                    </div>

                    <div class="campo campo-condicional" id="soatDatosBox2">
                        <label>Número de póliza</label>
                        <input type="text" name="soat_numero_poliza" maxlength="100"
                               value="{{ old('soat_numero_poliza', $soatDoc?->numero_poliza) }}">
                    </div>

                    <div class="campo campo-condicional" id="soatDatosBox3">
                        <label>Fecha de vencimiento</label>
                        <input type="date" name="soat_fecha_vencimiento"
                               value="{{ old('soat_fecha_vencimiento', $soatDoc?->fecha_vencimiento) }}">
                    </div>

                    <div class="campo campo-condicional" id="soatDatosBox4">
                        <label>Nuevo archivo SOAT</label>
                        <input type="file" name="soat_archivo" accept=".pdf,.jpg,.jpeg,.png">
                        <small>
                            @if($soatDoc && $soatDoc->ruta)
                                Archivo actual disponible. Déjelo vacío para conservarlo.
                            @else
                                PDF o imagen. Máximo 5 MB.
                            @endif
                        </small>
                    </div>

                    {{-- TECNOMECÁNICA --}}
                    <div class="campo">
                        <label>¿Tiene tecnomecánica? <span class="required">*</span></label>
                        <select name="tiene_tecnomecanica" id="tieneTecno" required>
                            <option value="0" {{ old('tiene_tecnomecanica', $tecnoDoc?->tiene_documento ?? 0) == 0 ? 'selected' : '' }}>No</option>
                            <option value="1" {{ old('tiene_tecnomecanica', $tecnoDoc?->tiene_documento ?? 0) == 1 ? 'selected' : '' }}>Sí</option>
                        </select>
                    </div>

                    <div class="campo campo-condicional" id="tecnoDatosBox">
                        <label>Fecha de expedición</label>
                        <input type="date" name="tecno_fecha_expedicion"
                               value="{{ old('tecno_fecha_expedicion', $tecnoDoc?->fecha_expedicion) }}">
                    </div>

                    <div class="campo campo-condicional" id="tecnoDatosBox2">
                        <label>Fecha de vencimiento</label>
                        <input type="date" name="tecno_fecha_vencimiento"
                               value="{{ old('tecno_fecha_vencimiento', $tecnoDoc?->fecha_vencimiento) }}">
                    </div>

                    <div class="campo campo-condicional" id="tecnoDatosBox3">
                        <label>Centro de diagnóstico</label>
                        <input type="text" name="tecno_centro_diagnostico" maxlength="150"
                               value="{{ old('tecno_centro_diagnostico', $tecnoDoc?->centro_diagnostico) }}">
                    </div>

                    <div class="campo campo-condicional" id="tecnoDatosBox4">
                        <label>Número de certificado</label>
                        <input type="text" name="tecno_numero_certificado" maxlength="100"
                               value="{{ old('tecno_numero_certificado', $tecnoDoc?->numero_certificado) }}">
                    </div>

                    <div class="campo campo-condicional" id="tecnoDatosBox5">
                        <label>Nuevo archivo tecnomecánica</label>
                        <input type="file" name="tecno_archivo" accept=".pdf,.jpg,.jpeg,.png">
                        <small>
                            @if($tecnoDoc && $tecnoDoc->ruta)
                                Archivo actual disponible. Déjelo vacío para conservarlo.
                            @else
                                PDF o imagen. Máximo 5 MB.
                            @endif
                        </small>
                    </div>

                    {{-- TARJETA --}}
                    <div class="campo">
                        <label>Nuevo archivo tarjeta de propiedad</label>
                        <input type="file" name="tarjeta_archivo" accept=".pdf,.jpg,.jpeg,.png">
                        <small>
                            @if($tarjetaDoc && $tarjetaDoc->ruta)
                                Archivo actual disponible. Déjelo vacío para conservarlo.
                            @else
                                PDF o imagen. Máximo 5 MB.
                            @endif
                        </small>
                    </div>

                    {{-- FOTO --}}
                    <div class="campo">
                        <label>Nueva foto del vehículo</label>
                        <input type="file" name="foto_archivo" accept="image/jpeg,image/png,image/webp">
                        <small>
                            @if($fotoDoc && $fotoDoc->ruta)
                                Foto actual disponible. Déjela vacía para conservarla.
                            @else
                                JPG, PNG o WEBP. Máximo 5 MB.
                            @endif
                        </small>
                    </div>

                </div>

                <div class="info-box">
                    <i class="fas fa-bell"></i>
                    <div>
                        Las fechas de SOAT y tecnomecánica se utilizan para las alertas de vencimiento del sistema.
                    </div>
                </div>

            </div>

            {{-- =====================================================
                 ESTADO Y REGIONAL
            ====================================================== --}}

            <div class="editar-section">

                <div class="section-header">

                    <div class="section-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>

                    <div>

                        <h3>Estado y ubicación</h3>

                        <p>
                            Información operativa y regional
                        </p>

                    </div>

                </div>


                <div class="form-grid">


                    {{-- ESTADO --}}

                    <div class="campo">

                        <label>
                            Estado
                            <span class="required">*</span>
                        </label>

                        <select
                            name="estado"
                            required
                        >

                            <option value="Disponible"
                                {{ old('estado', $vehiculo->estado) == 'Disponible' ? 'selected' : '' }}>
                                Disponible
                            </option>

                            <option value="Prestado"
                                {{ old('estado', $vehiculo->estado) == 'Prestado' ? 'selected' : '' }}>
                                Prestado
                            </option>

                            <option value="Mantenimiento"
                                {{ old('estado', $vehiculo->estado) == 'Mantenimiento' ? 'selected' : '' }}>
                                Mantenimiento
                            </option>

                        </select>

                    </div>


                    {{-- REGIONAL --}}

                    <div class="campo">

                        <label>
                            Regional
                            <span class="required">*</span>
                        </label>

                        <select
                            name="regional"
                            required
                        >

                            <option value="Neiva"
                                {{ old('regional', $vehiculo->regional) == 'Neiva' ? 'selected' : '' }}>
                                Neiva
                            </option>

                            <option value="Ibagué"
                                {{ old('regional', $vehiculo->regional) == 'Ibagué' ? 'selected' : '' }}>
                                Ibagué
                            </option>

                        </select>

                    </div>


                    {{-- FECHA REGIONAL --}}

                    <div class="campo">

                        <label>
                            Fecha de llegada a la regional
                            <span class="required">*</span>
                        </label>

                        <input
                            type="date"
                            name="fecha_llegada_regional"
                            value="{{ old('fecha_llegada_regional', $vehiculo->fecha_llegada_regional) }}"
                            max="{{ date('Y-m-d') }}"
                            required
                        >

                    </div>

                </div>

            </div>


            {{-- =====================================================
                 INFORMACIÓN ADMINISTRATIVA
            ====================================================== --}}

            <div class="editar-section">

                <div class="section-header">

                    <div class="section-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>

                    <div>

                        <h3>Información administrativa</h3>

                        <p>
                            Datos de propiedad y registro
                        </p>

                    </div>

                </div>


                <div class="form-grid-2">


                    {{-- TARJETA --}}

                    <div class="campo">

                        <label>
                            Número de tarjeta de propiedad
                            <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="tarjeta_propiedad"
                            maxlength="30"
                            value="{{ old('tarjeta_propiedad', $vehiculo->tarjeta_propiedad) }}"
                            placeholder="Número de tarjeta"
                            required
                        >

                    </div>


                    {{-- FECHA COMPRA --}}

                    <div class="campo">

                        <label>
                            Fecha de compra
                            <span class="required">*</span>
                        </label>

                        <input
                            type="date"
                            name="fecha_compra"
                            value="{{ old('fecha_compra', $vehiculo->fecha_compra) }}"
                            max="{{ date('Y-m-d') }}"
                            required
                        >

                    </div>

                </div>

            </div>


            {{-- =====================================================
                 FOTOGRAFÍA
            ====================================================== --}}

            <div class="editar-section">

                <div class="section-header">

                    <div class="section-icon">
                        <i class="fas fa-camera"></i>
                    </div>

                    <div>

                        <h3>Fotografía del vehículo</h3>

                        <p>
                            Información relacionada con la fotografía.
                        </p>

                    </div>

                </div>


                <div class="campo">

                    <label>
                        Ruta de la fotografía
                    </label>

                    <input
                        type="text"
                        name="foto"
                        maxlength="255"
                        value="{{ old('foto', $vehiculo->foto) }}"
                        placeholder="Ruta de la fotografía"
                    >

                    <small>
                        Campo opcional.
                    </small>

                </div>

            </div>


            {{-- FOOTER --}}

            <div class="editar-footer">

                <a
                    href="{{ route('vehiculos.index') }}"
                    class="btn-cancelar"
                >

                    <i class="fas fa-times"></i>

                    Cancelar

                </a>


                <button
                    type="submit"
                    class="btn-actualizar"
                >

                    <i class="fas fa-save"></i>

                    Actualizar vehículo

                </button>

            </div>


        </form>

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {


    /* ==========================================================
       PROTECCIÓN
    ========================================================== */

    const tipoProteccion =
        document.getElementById('tipoProteccion');

    const nivelBlindajeBox =
        document.getElementById('nivelBlindajeBox');

    const nivelBlindaje =
        document.getElementById('nivelBlindaje');


    function actualizarBlindaje() {

        if (tipoProteccion.value === 'Blindado') {

            nivelBlindajeBox.classList.add('mostrar');

            nivelBlindaje.required = true;

        } else {

            nivelBlindajeBox.classList.remove('mostrar');

            nivelBlindaje.required = false;

            nivelBlindaje.value = '';

        }

    }


    tipoProteccion.addEventListener(
        'change',
        actualizarBlindaje
    );


    actualizarBlindaje();


    /* ==========================================================
       ADBLUE
    ========================================================== */

    const tieneAdblue =
        document.getElementById('tieneAdblue');

    const nivelAdblueBox =
        document.getElementById('nivelAdblueBox');

    const nivelAdblue =
        document.getElementById('nivelAdblue');


    function actualizarAdblue() {

        if (tieneAdblue.value === '1') {

            nivelAdblueBox.classList.add('mostrar');

            nivelAdblue.required = true;

        } else {

            nivelAdblueBox.classList.remove('mostrar');

            nivelAdblue.required = false;

            nivelAdblue.value = '';

        }

    }


    tieneAdblue.addEventListener(
        'change',
        actualizarAdblue
    );


    actualizarAdblue();

    const tieneSoat = document.getElementById('tieneSoat');
    const soatBoxes = ['soatDatosBox','soatDatosBox2','soatDatosBox3','soatDatosBox4']
        .map(id => document.getElementById(id));

    function actualizarSoat() {
        const mostrar = tieneSoat.value === '1';
        soatBoxes.forEach(box => box?.classList.toggle('mostrar', mostrar));
    }

    tieneSoat?.addEventListener('change', actualizarSoat);
    actualizarSoat();

    const tieneTecno = document.getElementById('tieneTecno');
    const tecnoBoxes = ['tecnoDatosBox','tecnoDatosBox2','tecnoDatosBox3','tecnoDatosBox4','tecnoDatosBox5']
        .map(id => document.getElementById(id));

    function actualizarTecno() {
        const mostrar = tieneTecno.value === '1';
        tecnoBoxes.forEach(box => box?.classList.toggle('mostrar', mostrar));
    }

    tieneTecno?.addEventListener('change', actualizarTecno);
    actualizarTecno();

});

</script>

@endsection