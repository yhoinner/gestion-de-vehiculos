@extends('layouts.admin')

@section('titulo', 'Trasladar Vehículo')

@section('contenido')

<style>

    .traslado-container {
        max-width: 900px;
        margin: 0 auto;
    }

    .traslado-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 22px;
        gap: 15px;
    }

    .titulo-box {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .titulo-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        font-size: 20px;
    }

    .titulo-box h1 {
        margin: 0;
        color: #172033;
        font-size: 24px;
        font-weight: 800;
    }

    .titulo-box p {
        margin: 4px 0 0;
        color: #64748b;
        font-size: 12px;
    }

    .btn-volver {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 15px;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        background: white;
        color: #475569;
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
    }

    .btn-volver:hover {
        background: #eff6ff;
        color: #2563eb;
    }

    .traslado-card {
        background: white;
        border: 1px solid #e5eaf2;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(15,23,42,.06);
        overflow: hidden;
    }

    .vehiculo-resumen {
        padding: 24px;
        background: linear-gradient(135deg, #eff6ff, #f8fafc);
        border-bottom: 1px solid #e5eaf2;
    }

    .vehiculo-resumen h2 {
        margin: 0;
        color: #172033;
        font-size: 20px;
        font-weight: 800;
    }

    .vehiculo-resumen p {
        margin: 7px 0 0;
        color: #64748b;
        font-size: 12px;
    }

    .regional-actual {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 14px;
        padding: 8px 12px;
        border-radius: 9px;
        background: white;
        border: 1px solid #dbeafe;
        color: #1d4ed8;
        font-size: 11px;
        font-weight: 700;
    }

    .formulario {
        padding: 26px;
    }

    .campo {
        margin-bottom: 20px;
    }

    .campo label {
        display: block;
        margin-bottom: 7px;
        color: #334155;
        font-size: 11px;
        font-weight: 700;
    }

    .campo input,
    .campo select,
    .campo textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #dbe2ea;
        border-radius: 10px;
        background: #f8fafc;
        color: #334155;
        outline: none;
        font-size: 12px;
    }

    .campo input,
    .campo select {
        height: 44px;
        padding: 0 13px;
    }

    .campo textarea {
        min-height: 110px;
        padding: 12px 13px;
        resize: vertical;
    }

    .campo input:focus,
    .campo select:focus,
    .campo textarea:focus {
        border-color: #60a5fa;
        background: white;
        box-shadow: 0 0 0 3px rgba(59,130,246,.10);
    }

    .ruta-traslado {
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        align-items: center;
        gap: 15px;
        margin-bottom: 25px;
    }

    .regional-box {
        padding: 17px;
        text-align: center;
        border-radius: 13px;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
    }

    .regional-box small {
        display: block;
        margin-bottom: 6px;
        color: #94a3b8;
        font-size: 9px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .regional-box strong {
        color: #172033;
        font-size: 18px;
    }

    .flecha {
        color: #2563eb;
        font-size: 22px;
    }

    .errores {
        margin: 20px 26px 0;
        padding: 14px 16px;
        border-radius: 10px;
        border: 1px solid #fecaca;
        background: #fef2f2;
        color: #991b1b;
        font-size: 12px;
    }

    .errores ul {
        margin: 6px 0 0;
        padding-left: 18px;
    }

    .footer-form {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 20px 26px;
        background: #f8fafc;
        border-top: 1px solid #edf0f5;
    }

    .btn-cancelar,
    .btn-trasladar {
        height: 43px;
        padding: 0 18px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-cancelar {
        color: #64748b;
        background: white;
        border: 1px solid #dbe2ea;
    }

    .btn-trasladar {
        color: white;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        border: none;
        box-shadow: 0 7px 16px rgba(37,99,235,.20);
    }

    .btn-trasladar:hover {
        transform: translateY(-1px);
    }

    @media(max-width:700px) {

        .traslado-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .btn-volver {
            width: 100%;
            justify-content: center;
        }

        .ruta-traslado {
            grid-template-columns: 1fr;
        }

        .flecha {
            transform: rotate(90deg);
            text-align: center;
        }

        .footer-form {
            flex-direction: column-reverse;
        }

        .btn-cancelar,
        .btn-trasladar {
            width: 100%;
        }
    }

</style>


<div class="traslado-container">

    {{-- HEADER --}}

    <div class="traslado-header">

        <div class="titulo-box">

            <div class="titulo-icon">

                <i class="fas fa-truck-moving"></i>

            </div>

            <div>

                <h1>
                    Trasladar vehículo
                </h1>

                <p>
                    Cambiar la regional asignada al vehículo
                </p>

            </div>

        </div>


        <a
            href="{{ route('vehiculos.show', $vehiculo) }}"
            class="btn-volver"
        >

            <i class="fas fa-arrow-left"></i>

            Volver

        </a>

    </div>


    <div class="traslado-card">


        {{-- VEHÍCULO --}}

        <div class="vehiculo-resumen">

            <h2>
                {{ strtoupper($vehiculo->placa) }}
            </h2>

            <p>
                {{ $vehiculo->marca }}
                {{ $vehiculo->linea }}
                · Modelo {{ $vehiculo->modelo }}
            </p>

            <div class="regional-actual">

                <i class="fas fa-location-dot"></i>

                Regional actual:

                <strong>
                    {{ $vehiculo->regional }}
                </strong>

            </div>

        </div>


        {{-- ERRORES --}}

        @if($errors->any())

            <div class="errores">

                <strong>
                    No se pudo realizar el traslado:
                </strong>

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            id="formTraslado"
            action="{{ route('vehiculos.trasladar.store', $vehiculo) }}"
            method="POST"
            class="formulario"
        >

            @csrf


            {{-- RUTA --}}

            <div class="ruta-traslado">

                <div class="regional-box">

                    <small>
                        Regional actual
                    </small>

                    <strong>
                        {{ $vehiculo->regional }}
                    </strong>

                </div>


                <div class="flecha">

                    <i class="fas fa-arrow-right"></i>

                </div>


                <div class="regional-box">

                    <small>
                        Nueva regional
                    </small>

                    <strong id="regionalDestinoTexto">
                        Seleccionar
                    </strong>

                </div>

            </div>


            {{-- DESTINO --}}

            <div class="campo">

                <label>
                    Nueva regional <span style="color:#ef4444;">*</span>
                </label>

                <select
                    name="regional_destino"
                    id="regionalDestino"
                    required
                >

                    <option value="">
                        Seleccione la regional...
                    </option>

                    @if($vehiculo->regional !== 'Neiva')

                        <option value="Neiva"
                            {{ old('regional_destino') == 'Neiva' ? 'selected' : '' }}>
                            Neiva
                        </option>

                    @endif


                    @if($vehiculo->regional !== 'Ibagué')

                        <option value="Ibagué"
                            {{ old('regional_destino') == 'Ibagué' ? 'selected' : '' }}>
                            Ibagué
                        </option>

                    @endif

                </select>

            </div>


            {{-- FECHA --}}

            <div class="campo">

                <label>
                    Fecha del traslado
                    <span style="color:#ef4444;">*</span>
                </label>

                <input
                    type="date"
                    name="fecha_traslado"
                    value="{{ old('fecha_traslado', date('Y-m-d')) }}"
                    required
                >

            </div>


            {{-- MOTIVO --}}

            <div class="campo">

                <label>
                    Motivo del traslado
                </label>

                <textarea
                    name="motivo"
                    maxlength="500"
                    placeholder="Ej: Apoyo operativo, cambio de regional, comisión, necesidades del servicio..."
                >{{ old('motivo') }}</textarea>

            </div>


        </form>


        {{-- FOOTER --}}

        <div class="footer-form">

            <a
                href="{{ route('vehiculos.show', $vehiculo) }}"
                class="btn-cancelar"
            >

                <i class="fas fa-times"></i>

                Cancelar

            </a>


            <button
                type="submit"
                form="formTraslado"
                class="btn-trasladar"
            >

                <i class="fas fa-truck-moving"></i>

                Trasladar vehículo

            </button>

        </div>

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const select = document.getElementById('regionalDestino');
    const texto = document.getElementById('regionalDestinoTexto');

    function actualizarRegional() {

        texto.textContent =
            select.value || 'Seleccionar';

    }

    select.addEventListener(
        'change',
        actualizarRegional
    );

    actualizarRegional();

});

</script>

@endsection