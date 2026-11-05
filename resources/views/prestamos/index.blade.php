@extends('layouts.admin')

@section('titulo', 'Préstamos')

@section('contenido')

<style>

    /* =====================================================
       PÁGINA
    ===================================================== */

    .prestamos-page {
        max-width: 1300px;
        margin: 0 auto;
        padding-bottom: 35px;
    }


    /* =====================================================
       HEADER
    ===================================================== */

    .prestamos-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 22px;
    }

    .prestamos-title {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .prestamos-title-icon {
        width: 52px;
        height: 52px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 15px;

        background: linear-gradient(
            135deg,
            #2563eb,
            #1d4ed8
        );

        color: white;
        font-size: 21px;

        box-shadow:
            0 8px 18px rgba(37,99,235,.20);
    }

    .prestamos-title h1 {
        margin: 0;

        color: #172033;

        font-size: 25px;
        font-weight: 800;
    }

    .prestamos-title p {
        margin: 4px 0 0;

        color: #64748b;

        font-size: 12px;
    }


    /* =====================================================
       BOTÓN NUEVO
    ===================================================== */

    .btn-nuevo-prestamo {
        height: 42px;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        padding: 0 17px;

        border-radius: 10px;

        color: white;

        background: linear-gradient(
            135deg,
            #2563eb,
            #1d4ed8
        );

        border: none;

        text-decoration: none;

        font-size: 11px;
        font-weight: 800;

        box-shadow:
            0 7px 16px rgba(37,99,235,.20);

        transition: .2s;
    }

    .btn-nuevo-prestamo:hover {
        color: white;

        transform: translateY(-1px);

        box-shadow:
            0 10px 20px rgba(37,99,235,.25);
    }


    /* =====================================================
       RESUMEN
    ===================================================== */

    .prestamos-resumen {
        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 15px;

        margin-bottom: 20px;
    }

    .resumen-prestamo {
        position: relative;

        min-height: 105px;

        padding: 19px;

        border-radius: 16px;

        color: white;

        overflow: hidden;

        box-shadow:
            0 8px 18px rgba(15,23,42,.08);
    }

    .resumen-prestamo::after {
        content: '';

        position: absolute;

        width: 90px;
        height: 90px;

        right: -25px;
        bottom: -40px;

        border-radius: 50%;

        background: rgba(255,255,255,.10);
    }

    .resumen-prestamo h3 {
        position: relative;

        z-index: 2;

        margin: 0;

        font-size: 27px;
        font-weight: 800;
    }

    .resumen-prestamo p {
        position: relative;

        z-index: 2;

        margin: 5px 0 0;

        font-size: 11px;
        font-weight: 600;
    }

    .resumen-prestamo i {
        position: absolute;

        right: 19px;
        top: 19px;

        font-size: 23px;

        opacity: .8;
    }

    .resumen-total {
        background:
            linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );
    }

    .resumen-activos {
        background:
            linear-gradient(
                135deg,
                #16a34a,
                #15803d
            );
    }

    .resumen-finalizados {
        background:
            linear-gradient(
                135deg,
                #64748b,
                #475569
            );
    }


    /* =====================================================
       CARD
    ===================================================== */

    .prestamos-card {
        background: white;

        border: 1px solid #e5eaf2;

        border-radius: 18px;

        box-shadow:
            0 8px 25px rgba(15,23,42,.05);

        overflow: hidden;
    }


    /* =====================================================
       TOOLBAR
    ===================================================== */

    .prestamos-toolbar {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        padding: 18px 20px;

        border-bottom: 1px solid #edf0f5;
    }

    .toolbar-title {
        display: flex;

        align-items: center;

        gap: 10px;
    }

    .toolbar-icon {
        width: 36px;
        height: 36px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #eff6ff;

        color: #2563eb;

        font-size: 13px;
    }

    .toolbar-title h3 {
        margin: 0;

        color: #172033;

        font-size: 14px;

        font-weight: 800;
    }

    .toolbar-title p {
        margin: 3px 0 0;

        color: #94a3b8;

        font-size: 9px;
    }


    /* =====================================================
       BUSCADOR
    ===================================================== */

    .search-prestamo {
        position: relative;

        width: 300px;
    }

    .search-prestamo i {
        position: absolute;

        left: 13px;
        top: 50%;

        transform: translateY(-50%);

        color: #94a3b8;

        font-size: 11px;
    }

    .search-prestamo input {
        width: 100%;

        height: 39px;

        box-sizing: border-box;

        padding: 0 13px 0 36px;

        border-radius: 10px;

        border: 1px solid #dbe2ea;

        background: #f8fafc;

        color: #334155;

        font-size: 11px;

        outline: none;

        transition: .2s;
    }

    .search-prestamo input:focus {
        background: white;

        border-color: #60a5fa;

        box-shadow:
            0 0 0 3px rgba(37,99,235,.10);
    }


    /* =====================================================
       TABLA
    ===================================================== */

    .table-prestamos-wrapper {
        width: 100%;

        overflow-x: auto;
    }

    .prestamos-table {
        width: 100%;

        min-width: 950px;

        border-collapse: collapse;
    }

    .prestamos-table thead th {
        padding: 13px 15px;

        color: #64748b;

        background: #f8fafc;

        border-bottom: 1px solid #e5eaf2;

        font-size: 9px;

        font-weight: 800;

        text-align: left;

        text-transform: uppercase;

        letter-spacing: .5px;
    }

    .prestamos-table tbody td {
        padding: 14px 15px;

        color: #475569;

        border-bottom: 1px solid #f0f2f6;

        font-size: 11px;

        vertical-align: middle;
    }

    .prestamos-table tbody tr {
        transition: .2s;
    }

    .prestamos-table tbody tr:hover {
        background: #f8fbff;
    }

    .prestamos-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =====================================================
       ID
    ===================================================== */

    .prestamo-id {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        min-width: 32px;

        height: 28px;

        padding: 0 8px;

        border-radius: 8px;

        background: #f1f5f9;

        color: #64748b;

        font-size: 10px;

        font-weight: 800;
    }


    /* =====================================================
       VEHÍCULO
    ===================================================== */

    .vehiculo-prestamo {
        display: flex;

        align-items: center;

        gap: 9px;
    }

    .vehiculo-icon {
        width: 36px;
        height: 36px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 10px;

        color: #2563eb;

        background: #eff6ff;

        font-size: 13px;
    }

    .vehiculo-prestamo strong {
        display: block;

        color: #334155;

        font-size: 11px;

        font-weight: 800;
    }

    .vehiculo-prestamo span {
        display: block;

        margin-top: 2px;

        color: #94a3b8;

        font-size: 9px;
    }


    /* =====================================================
       CONDUCTOR
    ===================================================== */

    .conductor-prestamo {
        display: flex;

        align-items: center;

        gap: 9px;
    }

    .conductor-avatar {
        width: 36px;
        height: 36px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 50%;

        color: #2563eb;

        background: #eff6ff;

        font-size: 10px;

        font-weight: 800;
    }

    .conductor-prestamo strong {
        display: block;

        color: #334155;

        font-size: 11px;

        font-weight: 800;
    }


    /* =====================================================
       DATOS
    ===================================================== */

    .dato-principal {
        color: #334155;

        font-size: 11px;

        font-weight: 700;
    }

    .dato-secundario {
        margin-top: 3px;

        color: #94a3b8;

        font-size: 9px;
    }


    /* =====================================================
       FECHA
    ===================================================== */

    .fecha-prestamo {
        display: flex;

        align-items: center;

        gap: 7px;
    }

    .fecha-icon {
        color: #64748b;

        font-size: 11px;
    }


    /* =====================================================
       ESTADO
    ===================================================== */

    .estado-prestamo {
        display: inline-flex;

        align-items: center;

        gap: 6px;

        padding: 6px 10px;

        border-radius: 20px;

        font-size: 9px;

        font-weight: 800;
    }

    .estado-prestamo::before {
        content: '';

        width: 6px;
        height: 6px;

        border-radius: 50%;
    }

    .estado-activo {
        color: #166534;

        background: #f0fdf4;
    }

    .estado-activo::before {
        background: #22c55e;
    }

    .estado-finalizado {
        color: #475569;

        background: #f1f5f9;
    }

    .estado-finalizado::before {
        background: #94a3b8;
    }


    /* =====================================================
       ACCIONES
    ===================================================== */

    .acciones-prestamo {
        display: flex;

        align-items: center;

        gap: 6px;
    }

    .btn-action-prestamo {
        width: 33px;
        height: 33px;

        display: inline-flex;

        align-items: center;
        justify-content: center;

        border-radius: 8px;

        text-decoration: none;

        cursor: pointer;

        font-size: 10px;

        transition: .2s;
    }

    .btn-finalizar {
        color: #16a34a;

        background: #f0fdf4;

        border: 1px solid #bbf7d0;
    }

    .btn-finalizar:hover {
        color: white;

        background: #16a34a;

        border-color: #16a34a;
    }

    .btn-ver {
        color: #2563eb;

        background: #eff6ff;

        border: 1px solid #bfdbfe;
    }

    .btn-ver:hover {
        color: white;

        background: #2563eb;

        border-color: #2563eb;
    }


    /* =====================================================
       VACÍO
    ===================================================== */

    .empty-prestamos {
        padding: 55px 20px;

        text-align: center;

        color: #94a3b8;
    }

    .empty-prestamos i {
        display: block;

        margin-bottom: 12px;

        color: #cbd5e1;

        font-size: 32px;
    }

    .empty-prestamos strong {
        display: block;

        color: #64748b;

        font-size: 12px;
    }

    .empty-prestamos span {
        display: block;

        margin-top: 5px;

        font-size: 10px;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media(max-width: 900px) {

        .prestamos-resumen {
            grid-template-columns: repeat(2, 1fr);
        }

        .prestamos-toolbar {
            align-items: flex-start;

            flex-direction: column;
        }

        .search-prestamo {
            width: 100%;
        }

    }

    @media(max-width: 650px) {

        .prestamos-header {
            align-items: flex-start;

            flex-direction: column;
        }

        .btn-nuevo-prestamo {
            width: 100%;
        }

        .prestamos-resumen {
            grid-template-columns: 1fr;
        }

        .prestamos-title h1 {
            font-size: 21px;
        }

    }

</style>


<div class="prestamos-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="prestamos-header">

        <div class="prestamos-title">

            <div class="prestamos-title-icon">

                <i class="fas fa-key"></i>

            </div>

            <div>

                <h1>Préstamos</h1>

                <p>
                    Gestiona la salida y devolución de vehículos.
                </p>

            </div>

        </div>


        <a
            href="{{ route('prestamos.create') }}"
            class="btn-nuevo-prestamo"
        >

            <i class="fas fa-plus"></i>

            Nuevo préstamo

        </a>

    </div>


    {{-- =====================================================
         RESUMEN
    ====================================================== --}}

    @php

        $totalPrestamos =
            $prestamos->count();

        $prestamosActivos =
            $prestamos
                ->where('estado', 'Activo')
                ->count();

        $prestamosFinalizados =
            $prestamos
                ->where('estado', 'Finalizado')
                ->count();

    @endphp


    <div class="prestamos-resumen">


        {{-- TOTAL --}}

        <div class="resumen-prestamo resumen-total">

            <i class="fas fa-list"></i>

            <h3>
                {{ $totalPrestamos }}
            </h3>

            <p>
                Préstamos registrados
            </p>

        </div>


        {{-- ACTIVOS --}}

        <div class="resumen-prestamo resumen-activos">

            <i class="fas fa-car-side"></i>

            <h3>
                {{ $prestamosActivos }}
            </h3>

            <p>
                Vehículos actualmente prestados
            </p>

        </div>


        {{-- FINALIZADOS --}}

        <div class="resumen-prestamo resumen-finalizados">

            <i class="fas fa-check-circle"></i>

            <h3>
                {{ $prestamosFinalizados }}
            </h3>

            <p>
                Préstamos finalizados
            </p>

        </div>


    </div>


    {{-- =====================================================
         CARD PRINCIPAL
    ====================================================== --}}

    <div class="prestamos-card">


        {{-- TOOLBAR --}}

        <div class="prestamos-toolbar">


            <div class="toolbar-title">

                <div class="toolbar-icon">

                    <i class="fas fa-clipboard-list"></i>

                </div>

                <div>

                    <h3>
                        Historial de préstamos
                    </h3>

                    <p>
                        Consulta y administra las salidas de vehículos.
                    </p>

                </div>

            </div>


            {{-- BUSCADOR --}}

            <div class="search-prestamo">

                <i class="fas fa-search"></i>

                <input
                    type="text"
                    id="buscarPrestamo"
                    placeholder="Buscar vehículo, conductor o destino..."
                    autocomplete="off"
                >

            </div>


        </div>


        {{-- =================================================
             TABLA
        ================================================== --}}

        <div class="table-prestamos-wrapper">

            <table
                class="prestamos-table"
                id="tablaPrestamos"
            >

                <thead>

                    <tr>

                        <th>
                            #
                        </th>

                        <th>
                            Vehículo
                        </th>

                        <th>
                            Conductor
                        </th>

                        <th>
                            Dependencia
                        </th>

                        <th>
                            Destino
                        </th>

                        <th>
                            Fecha salida
                        </th>

                        <th>
                            Estado
                        </th>

                        <th>
                            Acciones
                        </th>

                    </tr>

                </thead>


                <tbody>


                    @forelse($prestamos as $prestamo)


                        @php

                            $nombreConductor =
                                $prestamo->conductor->nombre
                                . ' '
                                . $prestamo->conductor->apellido;

                            $inicialNombre =
                                strtoupper(
                                    substr(
                                        $prestamo->conductor->nombre,
                                        0,
                                        1
                                    )
                                );

                            $inicialApellido =
                                strtoupper(
                                    substr(
                                        $prestamo->conductor->apellido,
                                        0,
                                        1
                                    )
                                );

                        @endphp


                        <tr>


                            {{-- ID --}}

                            <td>

                                <span class="prestamo-id">

                                    #{{ $prestamo->id }}

                                </span>

                            </td>


                            {{-- VEHÍCULO --}}

                            <td>

                                <div class="vehiculo-prestamo">

                                    <div class="vehiculo-icon">

                                        <i class="fas fa-car"></i>

                                    </div>

                                    <div>

                                        <strong>

                                            {{ $prestamo->vehiculo->placa }}

                                        </strong>

                                        <span>

                                            {{ $prestamo->vehiculo->marca ?? 'Vehículo' }}

                                            @if($prestamo->vehiculo->linea)

                                                · {{ $prestamo->vehiculo->linea }}

                                            @endif

                                        </span>

                                    </div>

                                </div>

                            </td>


                            {{-- CONDUCTOR --}}

                            <td>

                                <div class="conductor-prestamo">

                                    <div class="conductor-avatar">

                                        {{ $inicialNombre }}{{ $inicialApellido }}

                                    </div>

                                    <div>

                                        <strong>

                                            {{ $nombreConductor }}

                                        </strong>

                                    </div>

                                </div>

                            </td>


                            {{-- DEPENDENCIA --}}

                            <td>

                                <div class="dato-principal">

                                    {{ $prestamo->dependencia }}

                                </div>

                            </td>


                            {{-- DESTINO --}}

                            <td>

                                <div class="dato-principal">

                                    {{ $prestamo->destino }}

                                </div>

                            </td>


                            {{-- FECHA --}}

                            <td>

                                <div class="fecha-prestamo">

                                    <i class="fas fa-calendar-alt fecha-icon"></i>

                                    <span>

                                        {{ \Carbon\Carbon::parse($prestamo->fecha_salida)->format('d/m/Y') }}

                                    </span>

                                </div>

                            </td>


                            {{-- ESTADO --}}

                            <td>


                                @if($prestamo->estado == 'Activo')

                                    <span class="estado-prestamo estado-activo">

                                        Activo

                                    </span>

                                @else

                                    <span class="estado-prestamo estado-finalizado">

                                        Finalizado

                                    </span>

                                @endif


                            </td>


                            {{-- ACCIONES --}}

                            <td>

                                <div class="acciones-prestamo">


                                    {{-- FINALIZAR --}}

                                    @if($prestamo->estado == 'Activo')

                                        <a
                                            href="{{ route('prestamos.edit', $prestamo->id) }}"
                                            class="btn-action-prestamo btn-finalizar"
                                            title="Finalizar préstamo"
                                        >

                                            <i class="fas fa-check"></i>

                                        </a>

                                    @endif


                                    {{-- VER --}}

                                    <a
                                        href="{{ route('prestamos.show', $prestamo->id) }}"
                                        class="btn-action-prestamo btn-ver"
                                        title="Ver préstamo"
                                    >

                                        <i class="fas fa-eye"></i>

                                    </a>


                                </div>

                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td colspan="8">

                                <div class="empty-prestamos">

                                    <i class="fas fa-key"></i>

                                    <strong>
                                        No existen préstamos registrados
                                    </strong>

                                    <span>
                                        Registra un préstamo para comenzar a controlar las salidas de vehículos.
                                    </span>

                                </div>

                            </td>

                        </tr>


                    @endforelse


                </tbody>

            </table>

        </div>


    </div>


</div>


{{-- =====================================================
     BUSCADOR
===================================================== --}}

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        const buscador =
            document.getElementById(
                'buscarPrestamo'
            );


        const tabla =
            document.getElementById(
                'tablaPrestamos'
            );


        if (!buscador || !tabla) {
            return;
        }


        buscador.addEventListener(
            'input',
            function () {


                const texto =
                    this.value
                        .toLowerCase()
                        .trim();


                const filas =
                    tabla.querySelectorAll(
                        'tbody tr'
                    );


                filas.forEach(
                    function (fila) {


                        const contenido =
                            fila.innerText
                                .toLowerCase();


                        if (
                            contenido.includes(texto)
                        ) {

                            fila.style.display = '';

                        } else {

                            fila.style.display = 'none';

                        }


                    }
                );


            }
        );


    }
);

</script>

@endsection