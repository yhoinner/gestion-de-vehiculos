@extends('layouts.admin')

@section('titulo', 'Registrar Conductor')

@section('contenido')

<style>
    .conductor-form-page {
        max-width: 1100px;
        margin: 0 auto;
        padding-bottom: 35px;
    }

    /* Encabezado */
    .form-page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 22px;
        gap: 20px;
    }

    .form-title {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .form-title-icon {
        width: 52px;
        height: 52px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 21px;

        background: linear-gradient(
            135deg,
            #2563eb,
            #1d4ed8
        );

        box-shadow:
            0 8px 18px rgba(37, 99, 235, .20);
    }

    .form-title h1 {
        margin: 0;
        color: #172033;
        font-size: 25px;
        font-weight: 800;
    }

    .form-title p {
        margin: 4px 0 0;
        color: #64748b;
        font-size: 12px;
    }

    /* Botón volver */
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        padding: 10px 15px;

        border-radius: 10px;

        color: #475569;
        background: white;
        border: 1px solid #dbe2ea;

        text-decoration: none;

        font-size: 11px;
        font-weight: 700;

        transition: .2s;
    }

    .btn-back:hover {
        color: #2563eb;
        background: #eff6ff;
        border-color: #bfdbfe;
    }

    /* Tarjeta */
    .conductor-form-card {
        background: white;
        border: 1px solid #e5eaf2;
        border-radius: 20px;

        box-shadow:
            0 10px 30px rgba(15, 23, 42, .06);

        overflow: hidden;
    }

    /* Cabecera tarjeta */
    .form-card-header {
        padding: 22px 25px;

        display: flex;
        align-items: center;
        gap: 12px;

        border-bottom: 1px solid #edf0f5;

        background: linear-gradient(
            180deg,
            #ffffff,
            #f8fafc
        );
    }

    .header-mini-icon {
        width: 40px;
        height: 40px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 11px;

        background: #eff6ff;
        color: #2563eb;
    }

    .form-card-header h2 {
        margin: 0;

        color: #172033;

        font-size: 16px;
        font-weight: 800;
    }

    .form-card-header p {
        margin: 3px 0 0;

        color: #94a3b8;

        font-size: 10px;
    }

    /* Cuerpo */
    .form-card-body {
        padding: 28px;
    }

    /* Alertas */
    .error-box {
        display: flex;
        gap: 10px;

        padding: 14px 16px;

        margin-bottom: 25px;

        border-radius: 12px;

        color: #991b1b;
        background: #fef2f2;

        border: 1px solid #fecaca;

        font-size: 11px;
    }

    .error-box i {
        margin-top: 2px;
    }

    .error-box ul {
        margin: 0;
        padding-left: 18px;
    }

    .error-box li {
        margin-bottom: 3px;
    }

    /* Secciones */
    .form-section {
        margin-bottom: 28px;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 9px;

        margin-bottom: 18px;
        padding-bottom: 10px;

        border-bottom: 1px solid #edf0f5;
    }

    .section-title-icon {
        width: 31px;
        height: 31px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 9px;

        background: #eff6ff;
        color: #2563eb;

        font-size: 12px;
    }

    .section-title strong {
        color: #334155;
        font-size: 12px;
        font-weight: 800;
    }

    .section-title span {
        color: #94a3b8;
        font-size: 9px;
        margin-left: 2px;
    }

    /* Grid */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 19px 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    /* Labels */
    .form-label {
        display: flex;
        align-items: center;
        gap: 6px;

        margin-bottom: 7px;

        color: #334155;

        font-size: 10px;
        font-weight: 800;
    }

    .form-label i {
        color: #2563eb;
        font-size: 10px;
    }

    .required {
        color: #ef4444;
    }

    /* Inputs */
    .input-wrapper {
        position: relative;
    }

    .input-icon {
        position: absolute;

        left: 14px;
        top: 50%;

        transform: translateY(-50%);

        color: #94a3b8;

        font-size: 12px;

        pointer-events: none;
    }

    .form-control-custom {
        width: 100%;
        height: 45px;

        box-sizing: border-box;

        padding: 0 14px 0 39px;

        border-radius: 10px;

        border: 1px solid #dbe2ea;

        background: #f8fafc;

        color: #334155;

        font-size: 12px;

        outline: none;

        transition: .2s;
    }

    .form-control-custom:focus {
        border-color: #60a5fa;

        background: white;

        box-shadow:
            0 0 0 3px rgba(37, 99, 235, .10);
    }

    .form-control-custom::placeholder {
        color: #b0bac8;
    }

    /* Select */
    select.form-control-custom {
        cursor: pointer;
        appearance: auto;
    }

    /* Fecha */
    input[type="date"].form-control-custom {
        color: #64748b;
    }

    /* Ayuda */
    .field-help {
        margin-top: 5px;

        color: #94a3b8;

        font-size: 9px;
    }

    /* Estado */
    .estado-wrapper {
        position: relative;
    }

    .estado-indicator {
        position: absolute;

        right: 14px;
        top: 50%;

        transform: translateY(-50%);

        width: 8px;
        height: 8px;

        border-radius: 50%;

        background: #22c55e;

        pointer-events: none;
    }

    /* Footer */
    .form-footer {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;

        margin-top: 30px;
        padding-top: 22px;

        border-top: 1px solid #edf0f5;
    }

    .btn-form {
        height: 43px;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        padding: 0 18px;

        border-radius: 10px;

        font-size: 11px;
        font-weight: 800;

        text-decoration: none;

        cursor: pointer;

        transition: .2s;
    }

    .btn-cancel {
        color: #475569;

        background: white;

        border: 1px solid #dbe2ea;
    }

    .btn-cancel:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
    }

    .btn-save {
        color: white;

        border: none;

        background:
            linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );

        box-shadow:
            0 7px 16px rgba(37, 99, 235, .20);
    }

    .btn-save:hover {
        transform: translateY(-1px);

        box-shadow:
            0 10px 20px rgba(37, 99, 235, .25);
    }

    /* Responsive */
    @media(max-width: 800px) {

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .form-page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .form-card-body {
            padding: 20px;
        }
    }

    @media(max-width: 500px) {

        .form-footer {
            flex-direction: column-reverse;
        }

        .btn-form {
            width: 100%;
        }

        .form-title h1 {
            font-size: 21px;
        }
    }
</style>


<div class="conductor-form-page">

    {{-- =====================================================
         ENCABEZADO
    ====================================================== --}}

    <div class="form-page-header">

        <div class="form-title">

            <div class="form-title-icon">
                <i class="fas fa-user-plus"></i>
            </div>

            <div>

                <h1>Registrar conductor</h1>

                <p>
                    Registra la información del conductor en el sistema.
                </p>

            </div>

        </div>


        <a
            href="{{ route('conductores.index') }}"
            class="btn-back"
        >
            <i class="fas fa-arrow-left"></i>
            Volver a conductores
        </a>

    </div>


    {{-- =====================================================
         TARJETA PRINCIPAL
    ====================================================== --}}

    <div class="conductor-form-card">


        {{-- CABECERA --}}

        <div class="form-card-header">

            <div class="header-mini-icon">
                <i class="fas fa-id-card"></i>
            </div>

            <div>

                <h2>Información del conductor</h2>

                <p>
                    Complete todos los datos requeridos.
                </p>

            </div>

        </div>


        {{-- CUERPO --}}

        <div class="form-card-body">


            {{-- ERRORES --}}

            @if ($errors->any())

                <div class="error-box">

                    <i class="fas fa-exclamation-circle"></i>

                    <div>

                        <strong>
                            No se pudo guardar el conductor.
                        </strong>

                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            @endif


            <form
                action="{{ route('conductores.store') }}"
                method="POST"
            >

                @csrf


                {{-- =================================================
                     DATOS PERSONALES
                ================================================== --}}

                <div class="form-section">

                    <div class="section-title">

                        <div class="section-title-icon">
                            <i class="fas fa-user"></i>
                        </div>

                        <strong>Datos personales</strong>

                        <span>
                            Información básica
                        </span>

                    </div>


                    <div class="form-grid">


                        {{-- CÉDULA --}}

                        <div class="form-group">

                            <label class="form-label">
                                <i class="fas fa-id-card"></i>
                                Cédula
                                <span class="required">*</span>
                            </label>

                            <div class="input-wrapper">

                                <i class="fas fa-id-card input-icon"></i>

                                <input
                                    type="text"
                                    name="cedula"
                                    class="form-control-custom"
                                    value="{{ old('cedula') }}"
                                    placeholder="Ingrese la cédula"
                                    required
                                >

                            </div>

                        </div>


                        {{-- NOMBRE --}}

                        <div class="form-group">

                            <label class="form-label">
                                <i class="fas fa-user"></i>
                                Nombre
                                <span class="required">*</span>
                            </label>

                            <div class="input-wrapper">

                                <i class="fas fa-user input-icon"></i>

                                <input
                                    type="text"
                                    name="nombre"
                                    class="form-control-custom"
                                    value="{{ old('nombre') }}"
                                    placeholder="Ingrese el nombre"
                                    required
                                >

                            </div>

                        </div>


                        {{-- APELLIDO --}}

                        <div class="form-group">

                            <label class="form-label">
                                <i class="fas fa-user"></i>
                                Apellido
                                <span class="required">*</span>
                            </label>

                            <div class="input-wrapper">

                                <i class="fas fa-user input-icon"></i>

                                <input
                                    type="text"
                                    name="apellido"
                                    class="form-control-custom"
                                    value="{{ old('apellido') }}"
                                    placeholder="Ingrese el apellido"
                                    required
                                >

                            </div>

                        </div>


                        {{-- TELÉFONO --}}

                        <div class="form-group">

                            <label class="form-label">
                                <i class="fas fa-phone"></i>
                                Teléfono
                            </label>

                            <div class="input-wrapper">

                                <i class="fas fa-phone input-icon"></i>

                                <input
                                    type="text"
                                    name="telefono"
                                    class="form-control-custom"
                                    value="{{ old('telefono') }}"
                                    placeholder="Ingrese el teléfono"
                                >

                            </div>

                        </div>


                        {{-- CORREO --}}

                        <div class="form-group">

                            <label class="form-label">
                                <i class="fas fa-envelope"></i>
                                Correo electrónico
                            </label>

                            <div class="input-wrapper">

                                <i class="fas fa-envelope input-icon"></i>

                                <input
                                    type="email"
                                    name="correo"
                                    class="form-control-custom"
                                    value="{{ old('correo') }}"
                                    placeholder="correo@ejemplo.com"
                                >

                            </div>

                        </div>


                        {{-- CARGO --}}

                        <div class="form-group">

                            <label class="form-label">
                                <i class="fas fa-briefcase"></i>
                                Cargo
                            </label>

                            <div class="input-wrapper">

                                <i class="fas fa-briefcase input-icon"></i>

                                <input
                                    type="text"
                                    name="cargo"
                                    class="form-control-custom"
                                    value="{{ old('cargo') }}"
                                    placeholder="Cargo del conductor"
                                >

                            </div>

                        </div>


                    </div>

                </div>



                {{-- =================================================
                     INFORMACIÓN LABORAL
                ================================================== --}}

                <div class="form-section">

                    <div class="section-title">
                        <div class="section-title-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <strong>Información laboral</strong>
                        <span>Datos administrativos del conductor</span>
                    </div>

                    <div class="form-grid">

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-file-contract"></i>
                                Tipo de contrato <span class="required">*</span>
                            </label>
                            <div class="input-wrapper">
                                <i class="fas fa-file-contract input-icon"></i>
                                <select name="tipo_contrato" class="form-control-custom" required>
                                    <option value="">Seleccione...</option>
                                    <option value="Planta" {{ old('tipo_contrato') == 'Planta' ? 'selected' : '' }}>Planta</option>
                                    <option value="Provisional" {{ old('tipo_contrato') == 'Provisional' ? 'selected' : '' }}>Provisional</option>
                                    <option value="Prestación de servicios" {{ old('tipo_contrato') == 'Prestación de servicios' ? 'selected' : '' }}>Prestación de servicios</option>
                                    <option value="Otro" {{ old('tipo_contrato') == 'Otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-venus-mars"></i>
                                Sexo <span class="required">*</span>
                            </label>
                            <div class="input-wrapper">
                                <i class="fas fa-venus-mars input-icon"></i>
                                <select name="sexo" class="form-control-custom" required>
                                    <option value="">Seleccione...</option>
                                    <option value="Masculino" {{ old('sexo') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="Femenino" {{ old('sexo') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                    <option value="Otro" {{ old('sexo') == 'Otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-map-marker-alt"></i>
                                Regional <span class="required">*</span>
                            </label>
                            <div class="input-wrapper">
                                <i class="fas fa-map-marker-alt input-icon"></i>
                                <select name="regional" class="form-control-custom" required>
                                    <option value="">Seleccione...</option>
                                    <option value="Neiva" {{ old('regional') == 'Neiva' ? 'selected' : '' }}>Neiva</option>
                                    <option value="Ibagué" {{ old('regional') == 'Ibagué' ? 'selected' : '' }}>Ibagué</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-building"></i>
                                Sede <span class="required">*</span>
                            </label>
                            <div class="input-wrapper">
                                <i class="fas fa-building input-icon"></i>
                                <input type="text" name="sede" class="form-control-custom"
                                       value="{{ old('sede') }}" placeholder="Ej. Sede Neiva" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-sitemap"></i>
                                Dependencia <span class="required">*</span>
                            </label>
                            <div class="input-wrapper">
                                <i class="fas fa-sitemap input-icon"></i>
                                <input type="text" name="dependencia" class="form-control-custom"
                                       value="{{ old('dependencia') }}" placeholder="Dependencia" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-users-cog"></i>
                                Grupo interno de trabajo <span class="required">*</span>
                            </label>
                            <div class="input-wrapper">
                                <i class="fas fa-users-cog input-icon"></i>
                                <input type="text" name="grupo_interno_trabajo" class="form-control-custom"
                                       value="{{ old('grupo_interno_trabajo') }}"
                                       placeholder="Grupo interno de trabajo" required>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- =================================================
                     INFORMACIÓN DE LICENCIA
                ================================================== --}}

                <div class="form-section">

                    <div class="section-title">

                        <div class="section-title-icon">
                            <i class="fas fa-id-badge"></i>
                        </div>

                        <strong>Información de licencia</strong>

                        <span>
                            Datos de conducción
                        </span>

                    </div>


                    <div class="form-grid">


                        {{-- LICENCIA --}}

                        <div class="form-group">

                            <label class="form-label">
                                <i class="fas fa-id-badge"></i>
                                Licencia
                                <span class="required">*</span>
                            </label>

                            <div class="input-wrapper">

                                <i class="fas fa-id-badge input-icon"></i>

                                <input
                                    type="text"
                                    name="licencia"
                                    class="form-control-custom"
                                    value="{{ old('licencia') }}"
                                    placeholder="Número de licencia"
                                    required
                                >

                            </div>

                        </div>


                        {{-- VENCE LICENCIA --}}

                        <div class="form-group">

                            <label class="form-label">
                                <i class="fas fa-calendar-alt"></i>
                                Vence licencia
                                <span class="required">*</span>
                            </label>

                            <div class="input-wrapper">

                                <i class="fas fa-calendar-alt input-icon"></i>

                                <input
                                    type="date"
                                    name="vence_licencia"
                                    class="form-control-custom"
                                    value="{{ old('vence_licencia') }}"
                                    required
                                >

                            </div>

                            <span class="field-help">
                                Fecha de vencimiento de la licencia.
                            </span>

                        </div>


                    </div>

                </div>


                {{-- =================================================
                     ESTADO
                ================================================== --}}

                <div class="form-section">

                    <div class="section-title">

                        <div class="section-title-icon">
                            <i class="fas fa-toggle-on"></i>
                        </div>

                        <strong>Estado del conductor</strong>

                        <span>
                            Estado actual
                        </span>

                    </div>


                    <div class="form-grid">


                        <div class="form-group">

                            <label class="form-label">
                                <i class="fas fa-circle-check"></i>
                                Estado
                            </label>

                            <div class="estado-wrapper">

                                <select
                                    name="estado"
                                    class="form-control-custom"
                                    id="estado"
                                >

                                    <option
                                        value="Activo"
                                        {{ old('estado', 'Activo') == 'Activo' ? 'selected' : '' }}
                                    >
                                        Activo
                                    </option>

                                    <option
                                        value="Inactivo"
                                        {{ old('estado') == 'Inactivo' ? 'selected' : '' }}
                                    >
                                        Inactivo
                                    </option>

                                    <option
                                        value="Suspendido"
                                        {{ old('estado') == 'Suspendido' ? 'selected' : '' }}
                                    >
                                        Suspendido
                                    </option>

                                </select>

                                <span
                                    class="estado-indicator"
                                    id="estadoIndicator"
                                ></span>

                            </div>

                        </div>


                    </div>

                </div>


                {{-- =================================================
                     BOTONES
                ================================================== --}}

                <div class="form-footer">


                    <a
                        href="{{ route('conductores.index') }}"
                        class="btn-form btn-cancel"
                    >

                        <i class="fas fa-times"></i>

                        Cancelar

                    </a>


                    <button
                        type="submit"
                        class="btn-form btn-save"
                    >

                        <i class="fas fa-save"></i>

                        Guardar conductor

                    </button>


                </div>


            </form>

        </div>

    </div>

</div>


<script>

    const estado =
        document.getElementById('estado');

    const indicator =
        document.getElementById('estadoIndicator');


    function actualizarEstado() {

        if (!estado || !indicator) {
            return;
        }

        if (estado.value === 'Activo') {

            indicator.style.background = '#22c55e';

        } else if (estado.value === 'Suspendido') {

            indicator.style.background = '#f59e0b';

        } else {

            indicator.style.background = '#94a3b8';

        }

    }


    if (estado) {

        estado.addEventListener(
            'change',
            actualizarEstado
        );

        actualizarEstado();

    }

</script>

@endsection