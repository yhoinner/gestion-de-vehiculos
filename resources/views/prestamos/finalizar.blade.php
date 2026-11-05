@extends('layouts.admin')

@section('titulo','Finalizar Préstamo')

@section('contenido')

<style>

    .finalizar-page {
        max-width: 1050px;
        margin: 0 auto;
        padding-bottom: 40px;
    }

    /* HEADER */

    .finalizar-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 22px;
        gap: 20px;
    }

    .finalizar-title {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .finalizar-icon {
        width: 52px;
        height: 52px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 15px;

        background: linear-gradient(
            135deg,
            #16a34a,
            #15803d
        );

        color: white;
        font-size: 21px;

        box-shadow:
            0 8px 18px rgba(22,163,74,.20);
    }

    .finalizar-title h1 {
        margin: 0;

        color: #172033;

        font-size: 25px;
        font-weight: 800;
    }

    .finalizar-title p {
        margin: 4px 0 0;

        color: #64748b;

        font-size: 12px;
    }

    /* CARD */

    .finalizar-card {
        background: white;

        border: 1px solid #e5eaf2;

        border-radius: 20px;

        box-shadow:
            0 10px 30px rgba(15,23,42,.06);

        overflow: hidden;
    }

    /* AVISO */

    .finalizar-aviso {
        display: flex;
        align-items: flex-start;
        gap: 12px;

        margin: 25px 28px 0;

        padding: 15px 17px;

        border-radius: 12px;

        background: #fffbeb;

        border: 1px solid #fde68a;

        color: #92400e;

        font-size: 10px;

        line-height: 1.6;
    }

    .finalizar-aviso i {
        margin-top: 2px;

        color: #f59e0b;

        font-size: 14px;
    }

    .finalizar-aviso strong {
        display: block;

        margin-bottom: 2px;

        font-size: 11px;
    }

    /* VEHICULO */

    .vehiculo-resumen {
        display: flex;
        align-items: center;

        gap: 15px;

        margin: 25px 28px;

        padding: 18px;

        border-radius: 15px;

        background:
            linear-gradient(
                135deg,
                #eff6ff,
                #f8fafc
            );

        border: 1px solid #dbeafe;
    }

    .vehiculo-resumen-icon {
        width: 55px;
        height: 55px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 14px;

        color: white;

        background:
            linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );

        font-size: 21px;
    }

    .vehiculo-resumen h2 {
        margin: 0;

        color: #172033;

        font-size: 17px;

        font-weight: 800;
    }

    .vehiculo-resumen p {
        margin: 4px 0 0;

        color: #64748b;

        font-size: 10px;
    }

    /* BODY */

    .finalizar-body {
        padding: 0 28px 28px;
    }

    /* SECTION */

    .form-section {
        margin-top: 25px;
    }

    .form-section-header {
        display: flex;
        align-items: center;

        gap: 10px;

        margin-bottom: 16px;

        padding-bottom: 11px;

        border-bottom: 1px solid #edf0f5;
    }

    .form-section-icon {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #f0fdf4;

        color: #16a34a;

        font-size: 12px;
    }

    .form-section-header h3 {
        margin: 0;

        color: #334155;

        font-size: 13px;

        font-weight: 800;
    }

    .form-section-header p {
        margin: 2px 0 0;

        color: #94a3b8;

        font-size: 9px;
    }

    /* DATOS DEL PRESTAMO */

    .datos-grid {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 14px;
    }

    .dato-card {
        padding: 14px 15px;

        border-radius: 12px;

        background: #f8fafc;

        border: 1px solid #edf0f5;
    }

    .dato-card label {
        display: block;

        margin-bottom: 6px;

        color: #94a3b8;

        font-size: 9px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .4px;
    }

    .dato-card label i {
        margin-right: 5px;

        color: #2563eb;
    }

    .dato-card div {
        color: #334155;

        font-size: 11px;

        font-weight: 700;
    }

    /* FORMULARIO */

    .form-grid {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 15px;
    }

    .form-group-custom {
        display: flex;

        flex-direction: column;
    }

    .form-group-custom.full {
        grid-column: 1 / -1;
    }

    .form-label-custom {
        display: flex;

        align-items: center;

        gap: 6px;

        margin-bottom: 7px;

        color: #475569;

        font-size: 10px;

        font-weight: 800;
    }

    .form-label-custom i {
        color: #16a34a;

        font-size: 10px;
    }

    .form-control-custom {
        width: 100%;

        min-height: 43px;

        padding: 9px 12px;

        border-radius: 9px;

        border: 1px solid #dbe2ea;

        background: #fff;

        color: #334155;

        font-size: 11px;

        outline: none;

        transition: .2s;

        box-sizing: border-box;
    }

    .form-control-custom:focus {
        border-color: #22c55e;

        box-shadow:
            0 0 0 3px rgba(34,197,94,.10);
    }

    textarea.form-control-custom {
        min-height: 105px;

        resize: vertical;

        line-height: 1.6;
    }

    /* CAMPOS SOLO LECTURA */

    .readonly-field {
        background: #f8fafc;

        color: #475569;

        cursor: not-allowed;
    }

    /* ERROR */

    .errores-finalizar {
        margin: 25px 28px 0;

        padding: 14px 16px;

        border-radius: 12px;

        background: #fef2f2;

        border: 1px solid #fecaca;

        color: #991b1b;

        font-size: 10px;
    }

    .errores-finalizar strong {
        display: block;

        margin-bottom: 7px;

        font-size: 11px;
    }

    .errores-finalizar ul {
        margin: 0;

        padding-left: 18px;
    }

    .errores-finalizar li {
        margin-bottom: 3px;
    }

    /* FOOTER */

    .finalizar-footer {
        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 15px;

        padding: 18px 28px;

        background: #fafbfd;

        border-top: 1px solid #edf0f5;
    }

    .footer-info {
        display: flex;

        align-items: center;

        gap: 7px;

        color: #94a3b8;

        font-size: 9px;
    }

    .footer-info i {
        color: #16a34a;
    }

    .footer-buttons {
        display: flex;

        gap: 9px;
    }

    .btn-finalizar {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        min-height: 40px;

        padding: 0 18px;

        border: none;

        border-radius: 9px;

        background:
            linear-gradient(
                135deg,
                #16a34a,
                #15803d
            );

        color: white;

        font-size: 10px;

        font-weight: 800;

        cursor: pointer;

        box-shadow:
            0 6px 15px rgba(22,163,74,.18);

        transition: .2s;
    }

    .btn-finalizar:hover {
        transform: translateY(-1px);

        box-shadow:
            0 9px 18px rgba(22,163,74,.25);
    }

    .btn-cancelar {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        min-height: 40px;

        padding: 0 17px;

        border-radius: 9px;

        color: #475569;

        background: white;

        border: 1px solid #dbe2ea;

        text-decoration: none;

        font-size: 10px;

        font-weight: 800;

        transition: .2s;
    }

    .btn-cancelar:hover {
        color: #dc2626;

        background: #fef2f2;

        border-color: #fecaca;
    }

    /* RESPONSIVE */

    @media(max-width: 850px) {

        .form-grid {
            grid-template-columns: 1fr 1fr;
        }

    }

    @media(max-width: 600px) {

        .finalizar-header {
            align-items: flex-start;

            flex-direction: column;
        }

        .datos-grid,
        .form-grid {
            grid-template-columns: 1fr;
        }

        .finalizar-body {
            padding: 0 20px 20px;
        }

        .vehiculo-resumen,
        .finalizar-aviso {
            margin-left: 20px;
            margin-right: 20px;
        }

        .finalizar-footer {
            align-items: stretch;

            flex-direction: column;
        }

        .footer-buttons {
            flex-direction: column;
        }

        .btn-finalizar,
        .btn-cancelar {
            width: 100%;
        }

    }

</style>


<div class="finalizar-page">


    {{-- HEADER --}}

    <div class="finalizar-header">

        <div class="finalizar-title">

            <div class="finalizar-icon">

                <i class="fas fa-check"></i>

            </div>

            <div>

                <h1>Finalizar préstamo</h1>

                <p>
                    Registra el regreso del vehículo y completa el préstamo.
                </p>

            </div>

        </div>

    </div>


    <div class="finalizar-card">


        {{-- ERRORES --}}

        @if ($errors->any())

            <div class="errores-finalizar">

                <strong>
                    <i class="fas fa-exclamation-triangle"></i>
                    No fue posible finalizar el préstamo
                </strong>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- AVISO --}}

        <div class="finalizar-aviso">

            <i class="fas fa-info-circle"></i>

            <div>

                <strong>
                    Confirma los datos de regreso
                </strong>

                Verifica el kilometraje y el nivel de combustible antes
                de finalizar el préstamo. Una vez finalizado, el registro
                quedará actualizado en el sistema.

            </div>

        </div>


        {{-- VEHICULO --}}

        <div class="vehiculo-resumen">

            <div class="vehiculo-resumen-icon">

                <i class="fas fa-car"></i>

            </div>

            <div>

                <h2>

                    {{ $prestamo->vehiculo->placa }}

                </h2>

                <p>

                    {{ $prestamo->vehiculo->marca }}

                    @if($prestamo->vehiculo->linea)

                        · {{ $prestamo->vehiculo->linea }}

                    @endif

                    &nbsp; | &nbsp;

                    Conductor:

                    {{ $prestamo->conductor->nombre }}

                    {{ $prestamo->conductor->apellido }}

                </p>

            </div>

        </div>


        <form
            action="{{ route('prestamos.finalizar', $prestamo->id) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="finalizar-body">


                {{-- DATOS DEL PRESTAMO --}}

                <div class="form-section">

                    <div class="form-section-header">

                        <div class="form-section-icon">

                            <i class="fas fa-file-alt"></i>

                        </div>

                        <div>

                            <h3>
                                Información del préstamo
                            </h3>

                            <p>
                                Datos registrados al momento de la salida
                            </p>

                        </div>

                    </div>


                    <div class="datos-grid">


                        <div class="dato-card">

                            <label>

                                <i class="fas fa-building"></i>

                                Dependencia

                            </label>

                            <div>

                                {{ $prestamo->dependencia }}

                            </div>

                        </div>


                        <div class="dato-card">

                            <label>

                                <i class="fas fa-map-marker-alt"></i>

                                Destino

                            </label>

                            <div>

                                {{ $prestamo->destino }}

                            </div>

                        </div>


                        <div class="dato-card">

                            <label>

                                <i class="fas fa-road"></i>

                                Km de salida

                            </label>

                            <div>

                                {{ number_format($prestamo->km_salida, 0, ',', '.') }} km

                            </div>

                        </div>


                        <div class="dato-card">

                            <label>

                                <i class="fas fa-gas-pump"></i>

                                Combustible de salida

                            </label>

                            <div>

                                {{ $prestamo->combustible_salida }}

                            </div>

                        </div>

                        @if($prestamo->vehiculo->tiene_adblue)

                            <div class="dato-card">

                                <label>
                                    <i class="fas fa-tint"></i>
                                    AdBlue de salida
                                </label>

                                <div>
                                    {{ $prestamo->adblue_salida ?? $prestamo->vehiculo->nivel_adblue ?? 0 }} %
                                </div>

                            </div>

                        @endif


                    </div>

                </div>


                {{-- DATOS DE REGRESO --}}

                <div class="form-section">

                    <div class="form-section-header">

                        <div class="form-section-icon">

                            <i class="fas fa-clipboard-check"></i>

                        </div>

                        <div>

                            <h3>
                                Datos de regreso
                            </h3>

                            <p>
                                Completa la información para cerrar el préstamo
                            </p>

                        </div>

                    </div>


                    <div class="form-grid">


                        {{-- FECHA --}}

                        <div class="form-group-custom">

                            <label class="form-label-custom">

                                <i class="fas fa-calendar-alt"></i>

                                Fecha de regreso

                            </label>

                            <input
                                type="date"
                                name="fecha_regreso"
                                class="form-control-custom"
                                value="{{ old('fecha_regreso', date('Y-m-d')) }}"
                                required
                            >

                        </div>


                        {{-- HORA --}}

                        <div class="form-group-custom">

                            <label class="form-label-custom">

                                <i class="fas fa-clock"></i>

                                Hora de regreso

                            </label>

                            <input
                                type="time"
                                name="hora_regreso"
                                class="form-control-custom"
                                value="{{ old('hora_regreso', date('H:i')) }}"
                                required
                            >

                        </div>


                        {{-- KM --}}

                        <div class="form-group-custom">

                            <label class="form-label-custom">

                                <i class="fas fa-tachometer-alt"></i>

                                Kilometraje de llegada

                            </label>

                            <input
                                type="number"
                                name="km_llegada"
                                class="form-control-custom"
                                min="{{ $prestamo->km_salida }}"
                                value="{{ old('km_llegada') }}"
                                placeholder="Ingrese kilometraje"
                                required
                            >

                        </div>



                        {{-- ADBLUE DE LLEGADA --}}
                        @if($prestamo->vehiculo->tiene_adblue)

                            <div class="form-group-custom">

                                <label class="form-label-custom">
                                    <i class="fas fa-tint"></i>
                                    AdBlue al llegar
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="number"
                                    name="adblue_llegada"
                                    class="form-control-custom"
                                    value="{{ old('adblue_llegada', $prestamo->vehiculo->nivel_adblue ?? '') }}"
                                    min="0"
                                    max="100"
                                    step="0.1"
                                    placeholder="Ej: 55"
                                    required
                                >

                                <span class="field-help">
                                    Salió con {{ $prestamo->adblue_salida ?? $prestamo->vehiculo->nivel_adblue ?? 0 }} %.
                                    Registra aquí el nivel real con el que regresó.
                                </span>

                            </div>

                        @endif

                        {{-- COMBUSTIBLE --}}

                        <div class="form-group-custom">

                            <label class="form-label-custom">

                                <i class="fas fa-gas-pump"></i>

                                Combustible de llegada

                            </label>

                            <select
                                name="combustible_llegada"
                                class="form-control-custom"
                                required
                            >

                                <option value="">
                                    Seleccione nivel
                                </option>

                                <option
                                    value="Vacío"
                                    {{ old('combustible_llegada') == 'Vacío' ? 'selected' : '' }}
                                >
                                    Vacío
                                </option>

                                <option
                                    value="1/4"
                                    {{ old('combustible_llegada') == '1/4' ? 'selected' : '' }}
                                >
                                    1/4
                                </option>

                                <option
                                    value="1/2"
                                    {{ old('combustible_llegada') == '1/2' ? 'selected' : '' }}
                                >
                                    1/2
                                </option>

                                <option
                                    value="3/4"
                                    {{ old('combustible_llegada') == '3/4' ? 'selected' : '' }}
                                >
                                    3/4
                                </option>

                                <option
                                    value="Tanque lleno"
                                    {{ old('combustible_llegada') == 'Tanque lleno' ? 'selected' : '' }}
                                >
                                    Tanque lleno
                                </option>

                            </select>

                        </div>


                        {{-- OBSERVACIONES --}}

                        <div class="form-group-custom full">

                            <label class="form-label-custom">

                                <i class="fas fa-comment-alt"></i>

                                Observaciones finales

                            </label>

                            <textarea
                                name="observaciones"
                                rows="4"
                                class="form-control-custom"
                                placeholder="Ingrese cualquier novedad, observación o información relevante del regreso..."
                            >{{ old('observaciones') }}</textarea>

                        </div>


                    </div>

                </div>


            </div>


            {{-- FOOTER --}}

            <div class="finalizar-footer">

                <div class="footer-info">

                    <i class="fas fa-shield-alt"></i>

                    La información quedará registrada en el sistema.

                </div>


                <div class="footer-buttons">


                    <a
                        href="{{ route('prestamos.index') }}"
                        class="btn-cancelar"
                    >

                        <i class="fas fa-arrow-left"></i>

                        Cancelar

                    </a>


                    <button
                        type="submit"
                        class="btn-finalizar"
                    >

                        <i class="fas fa-check-circle"></i>

                        Finalizar préstamo

                    </button>


                </div>

            </div>


        </form>


    </div>

</div>

@endsection