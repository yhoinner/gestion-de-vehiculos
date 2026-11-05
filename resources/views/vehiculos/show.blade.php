@extends('layouts.admin')

@section('titulo', 'Detalle del Vehículo')

@section('contenido')

<style>

    /* =====================================================
       DETALLE VEHÍCULO
    ===================================================== */

    .detalle-vehiculo {
        max-width: 1300px;
        margin: 0 auto;
        padding-bottom: 35px;
    }


    /* =====================================================
       HEADER
    ===================================================== */

    .detalle-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 22px;
    }

    .detalle-titulo {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .detalle-icono {
        width: 54px;
        height: 54px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;

        background:
            linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );

        color: white;
        font-size: 22px;

        box-shadow:
            0 8px 20px rgba(37,99,235,.20);
    }

    .detalle-titulo h1 {
        margin: 0;
        color: #172033;
        font-size: 25px;
        font-weight: 800;
    }

    .detalle-titulo p {
        margin: 4px 0 0;
        color: #64748b;
        font-size: 12px;
    }


    /* =====================================================
       BOTONES HEADER
    ===================================================== */

    .detalle-acciones {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-detalle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        height: 40px;
        padding: 0 14px;

        border-radius: 10px;

        font-size: 11px;
        font-weight: 700;

        text-decoration: none;

        transition: .2s;
    }

    .btn-volver {
        color: #475569;
        background: white;
        border: 1px solid #dbe2ea;
    }

    .btn-volver:hover {
        color: #2563eb;
        background: #eff6ff;
        border-color: #bfdbfe;
    }

    .btn-pdf {
        color: #dc2626;
        background: #fef2f2;
        border: 1px solid #fecaca;
    }

    .btn-pdf:hover {
        color: white;
        background: #dc2626;
        border-color: #dc2626;
    }

    .btn-editar {
        color: white;
        background:
            linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );

        border: none;

        box-shadow:
            0 6px 14px rgba(37,99,235,.18);
    }

    .btn-editar:hover {
        color: white;
        transform: translateY(-1px);
        box-shadow:
            0 9px 18px rgba(37,99,235,.25);
    }

    .btn-trasladar {
        color: #1d4ed8;
        background: #eff6ff;
        border: 1px solid #bfdbfe;
    }

    .btn-trasladar:hover {
        color: white;
        background: #2563eb;
        border-color: #2563eb;
        transform: translateY(-1px);
    }


    /* =====================================================
       HERO DEL VEHÍCULO
    ===================================================== */

    .vehiculo-hero {
        display: grid;
        grid-template-columns: 300px 1fr;
        gap: 25px;

        background: white;

        border: 1px solid #e5eaf2;
        border-radius: 20px;

        padding: 25px;

        margin-bottom: 20px;

        box-shadow:
            0 10px 30px rgba(15,23,42,.06);
    }


    /* FOTO */

    .vehiculo-foto {
        min-height: 245px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 17px;

        background:
            linear-gradient(
                145deg,
                #eff6ff,
                #dbeafe
            );

        overflow: hidden;
    }

    .vehiculo-foto img {
        width: 100%;
        height: 245px;
        object-fit: cover;
        object-position: center;
        display: block;
        box-sizing: border-box;
    }


    /* INFO HERO */

    .vehiculo-info {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .vehiculo-info-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 15px;

        margin-bottom: 18px;
    }

    .vehiculo-nombre h2 {
        margin: 0;
        color: #172033;
        font-size: 28px;
        font-weight: 800;
    }

    .vehiculo-nombre p {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 13px;
    }


    /* PLACA */

    .placa-grande {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-width: 115px;

        padding: 10px 15px;

        border-radius: 10px;

        background: #172033;
        color: white;

        font-size: 15px;
        font-weight: 800;

        letter-spacing: 1.5px;

        box-shadow:
            0 5px 12px rgba(15,23,42,.15);
    }


    /* ESTADO */

    .estado-detalle {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        width: fit-content;

        padding: 7px 12px;

        border-radius: 20px;

        font-size: 11px;
        font-weight: 700;

        margin-bottom: 20px;
    }

    .estado-detalle::before {
        content: '';
        width: 7px;
        height: 7px;
        border-radius: 50%;
    }

    .estado-disponible {
        color: #166534;
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
    }

    .estado-disponible::before {
        background: #22c55e;
    }

    .estado-prestado {
        color: #991b1b;
        background: #fef2f2;
        border: 1px solid #fecaca;
    }

    .estado-prestado::before {
        background: #ef4444;
    }

    .estado-mantenimiento {
        color: #92400e;
        background: #fffbeb;
        border: 1px solid #fde68a;
    }

    .estado-mantenimiento::before {
        background: #f59e0b;
    }


    /* DATOS RÁPIDOS */

    .datos-rapidos {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
    }

    .dato-rapido {
        padding: 13px;

        border-radius: 12px;

        background: #f8fafc;

        border: 1px solid #edf0f5;
    }

    .dato-rapido small {
        display: block;

        color: #94a3b8;
        font-size: 9px;

        margin-bottom: 5px;
    }

    .dato-rapido strong {
        color: #334155;
        font-size: 12px;
    }


    /* =====================================================
       TARJETAS RESUMEN
    ===================================================== */

    .resumen-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;

        margin-bottom: 20px;
    }

    .resumen-card {
        position: relative;

        padding: 19px;

        min-height: 105px;

        border-radius: 16px;

        color: white;

        overflow: hidden;

        box-shadow:
            0 8px 18px rgba(15,23,42,.08);
    }

    .resumen-card::after {
        content: '';

        position: absolute;

        width: 90px;
        height: 90px;

        right: -25px;
        bottom: -40px;

        border-radius: 50%;

        background: rgba(255,255,255,.10);
    }

    .resumen-card h3 {
        position: relative;
        z-index: 2;

        margin: 0;

        font-size: 27px;
        font-weight: 800;
    }

    .resumen-card p {
        position: relative;
        z-index: 2;

        margin: 5px 0 0;

        font-size: 11px;
        font-weight: 600;
    }

    .resumen-card i {
        position: absolute;

        right: 18px;
        top: 18px;

        font-size: 23px;

        opacity: .8;
    }

    .resumen-azul {
        background:
            linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );
    }

    .resumen-naranja {
        background:
            linear-gradient(
                135deg,
                #f59e0b,
                #d97706
            );
    }

    .resumen-verde {
        background:
            linear-gradient(
                135deg,
                #16a34a,
                #15803d
            );
    }

    .resumen-celeste {
        background:
            linear-gradient(
                135deg,
                #0891b2,
                #0e7490
            );
    }


    /* =====================================================
       INFORMACIÓN DETALLADA
    ===================================================== */

    .informacion-card {
        background: white;

        border: 1px solid #e5eaf2;
        border-radius: 18px;

        box-shadow:
            0 8px 25px rgba(15,23,42,.05);

        margin-bottom: 20px;

        overflow: hidden;
    }

    .informacion-header {
        display: flex;
        align-items: center;
        gap: 11px;

        padding: 19px 22px;

        border-bottom: 1px solid #edf0f5;
    }

    .informacion-icono {
        width: 37px;
        height: 37px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #eff6ff;
        color: #2563eb;
    }

    .informacion-header h3 {
        margin: 0;

        color: #172033;

        font-size: 15px;
        font-weight: 800;
    }

    .informacion-header p {
        margin: 3px 0 0;

        color: #94a3b8;

        font-size: 10px;
    }


    /* GRID INFORMACIÓN */

    .informacion-grid {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 1px;

        background: #edf0f5;
    }

    .info-item {
        padding: 16px 18px;

        background: white;
    }

    .info-item small {
        display: block;

        margin-bottom: 6px;

        color: #94a3b8;

        font-size: 9px;

        text-transform: uppercase;

        letter-spacing: .5px;

        font-weight: 700;
    }

    .info-item strong {
        color: #334155;

        font-size: 13px;

        font-weight: 700;

        word-break: break-word;
    }


    /* =====================================================
       TABS
    ===================================================== */

    .historial-card {
        background: white;

        border: 1px solid #e5eaf2;

        border-radius: 18px;

        box-shadow:
            0 8px 25px rgba(15,23,42,.05);

        overflow: hidden;
    }

    .tabs-header {
        display: flex;

        align-items: center;

        gap: 5px;

        padding: 8px;

        border-bottom: 1px solid #edf0f5;

        background: #f8fafc;
    }

    .tab-button {
        border: none;

        padding: 11px 16px;

        border-radius: 9px;

        background: transparent;

        color: #64748b;

        font-size: 11px;

        font-weight: 700;

        cursor: pointer;

        transition: .2s;
    }

    .tab-button:hover {
        color: #2563eb;
        background: #eff6ff;
    }

    .tab-button.active {
        color: #2563eb;
        background: white;

        box-shadow:
            0 2px 8px rgba(15,23,42,.06);
    }

    .tab-button i {
        margin-right: 6px;
    }

    .tab-content {
        display: none;
        padding: 20px;
    }

    .tab-content.active {
        display: block;
    }


    /* =====================================================
       TABLAS
    ===================================================== */

    .historial-table-wrapper {
        overflow-x: auto;
    }

    .historial-table {
        width: 100%;

        border-collapse: collapse;
    }

    .historial-table th {
        padding: 12px 14px;

        background: #f8fafc;

        color: #64748b;

        border-bottom: 1px solid #e5eaf2;

        font-size: 9px;

        text-align: left;

        text-transform: uppercase;

        letter-spacing: .5px;
    }

    .historial-table td {
        padding: 13px 14px;

        color: #475569;

        border-bottom: 1px solid #f0f2f6;

        font-size: 11px;
    }

    .historial-table tbody tr:hover {
        background: #f8fbff;
    }


    /* =====================================================
       BADGES
    ===================================================== */

    .badge-detalle {
        display: inline-flex;

        align-items: center;

        padding: 6px 10px;

        border-radius: 20px;

        font-size: 9px;

        font-weight: 700;
    }

    .badge-activo {
        color: #166534;
        background: #f0fdf4;
    }

    .badge-finalizado {
        color: #475569;
        background: #f1f5f9;
    }

    .badge-pendiente {
        color: #92400e;
        background: #fffbeb;
    }

    .badge-proceso {
        color: #1d4ed8;
        background: #eff6ff;
    }

    .badge-vencido {
        color: #991b1b;
        background: #fef2f2;
    }

    .badge-proximo {
        color: #92400e;
        background: #fffbeb;
    }


    /* =====================================================
       VACÍO
    ===================================================== */

    .sin-registros {
        padding: 45px 20px;

        text-align: center;

        color: #94a3b8;
    }

    .sin-registros i {
        display: block;

        margin-bottom: 10px;

        font-size: 28px;

        color: #cbd5e1;
    }

    .sin-registros strong {
        display: block;

        color: #64748b;

        font-size: 12px;
    }

    .sin-registros span {
        display: block;

        margin-top: 4px;

        font-size: 10px;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media(max-width:1100px) {

        .vehiculo-hero {
            grid-template-columns: 240px 1fr;
        }

        .datos-rapidos {
            grid-template-columns: repeat(2,1fr);
        }

        .resumen-grid {
            grid-template-columns: repeat(2,1fr);
        }

        .informacion-grid {
            grid-template-columns: repeat(2,1fr);
        }

    }


    @media(max-width:750px) {

        .detalle-header {
            align-items: flex-start;

            flex-direction: column;
        }

        .detalle-acciones {
            width: 100%;

            display: grid;

            grid-template-columns: repeat(3,1fr);
        }

        .btn-detalle {
            padding: 0 8px;
        }

        .vehiculo-hero {
            grid-template-columns: 1fr;

            padding: 16px;
        }

        .vehiculo-foto {
            min-height: 210px;
        }

        .vehiculo-foto img {
            height: 210px;
        }

        .vehiculo-info-top {
            flex-direction: column;
        }

        .datos-rapidos {
            grid-template-columns: repeat(2,1fr);
        }

        .resumen-grid {
            grid-template-columns: 1fr 1fr;
        }

        .informacion-grid {
            grid-template-columns: 1fr;
        }

        .tabs-header {
            overflow-x: auto;
        }

        .tab-button {
            white-space: nowrap;
        }

    }


    @media(max-width:480px) {

        .detalle-titulo h1 {
            font-size: 21px;
        }

        .detalle-acciones {
            grid-template-columns: 1fr;
        }

        .resumen-grid {
            grid-template-columns: 1fr;
        }

        .vehiculo-nombre h2 {
            font-size: 23px;
        }

    }

    /* =====================================================
   HISTORIAL DE TRASLADOS
===================================================== */

.historial-card {
    margin-top: 20px;
    background: #ffffff;
    border: 1px solid #e5eaf2;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(15,23,42,.05);
}

.historial-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 20px;
    border-bottom: 1px solid #edf0f5;
}

.historial-title {
    display: flex;
    align-items: center;
    gap: 12px;
}

.historial-icon {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    font-size: 17px;
}

.traslado-icon {
    color: #2563eb;
    background: #eff6ff;
}

.historial-title h3 {
    margin: 0;
    color: #172033;
    font-size: 14px;
    font-weight: 800;
}

.historial-title p {
    margin: 4px 0 0;
    color: #94a3b8;
    font-size: 10px;
}

.historial-count {
    min-width: 30px;
    height: 28px;
    padding: 0 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 9px;
    background: #eff6ff;
    color: #2563eb;
    font-size: 11px;
    font-weight: 800;
}

.traslados-list {
    padding: 8px 20px 20px;
}

.traslado-item {
    display: flex;
    gap: 15px;
    padding: 17px 0;
    border-bottom: 1px solid #f0f2f6;
}

.traslado-item:last-child {
    border-bottom: none;
}

.traslado-fecha {
    width: 52px;
    height: 58px;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: #eff6ff;
    border: 1px solid #dbeafe;
}

.fecha-dia {
    color: #1d4ed8;
    font-size: 18px;
    line-height: 18px;
    font-weight: 800;
}

.fecha-mes {
    margin-top: 3px;
    color: #60a5fa;
    font-size: 8px;
    font-weight: 800;
}

.traslado-contenido {
    flex: 1;
    min-width: 0;
}

.traslado-ruta {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 9px;
}

.regional-origen,
.regional-destino {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 10px;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 700;
}

.regional-origen {
    color: #64748b;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
}

.regional-destino {
    color: #166534;
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
}

.traslado-flecha {
    color: #94a3b8;
    font-size: 11px;
}

.traslado-motivo {
    display: flex;
    align-items: flex-start;
    gap: 7px;
    margin-top: 10px;
    color: #475569;
    font-size: 11px;
    line-height: 17px;
}

.traslado-motivo i {
    margin-top: 2px;
    color: #94a3b8;
}

.traslado-info {
    margin-top: 8px;
    color: #94a3b8;
    font-size: 9px;
}

.sin-traslados {
    padding: 40px 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.sin-traslados-icon {
    width: 52px;
    height: 52px;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;
    background: #f8fafc;
    color: #94a3b8;
    font-size: 20px;
}

.sin-traslados strong {
    color: #475569;
    font-size: 12px;
}

.sin-traslados span {
    margin-top: 5px;
    color: #94a3b8;
    font-size: 10px;
}

@media(max-width:600px) {

    .historial-header {
        padding: 15px;
    }

    .traslados-list {
        padding: 5px 15px 15px;
    }

    .traslado-ruta {
        gap: 5px;
    }

    .regional-origen,
    .regional-destino {
        font-size: 10px;
    }

}

</style>


<div class="detalle-vehiculo">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="detalle-header">

        <div class="detalle-titulo">

            <div class="detalle-icono">

                <i class="fas fa-car"></i>

            </div>

            <div>

                <h1>Detalle del vehículo</h1>

                <p>
                    Información completa y estado del vehículo.
                </p>

            </div>

        </div>


        <div class="detalle-acciones">


            <a
                href="{{ route('vehiculos.index') }}"
                class="btn-detalle btn-volver"
            >

                <i class="fas fa-arrow-left"></i>

                Volver

            </a>


            <a
                href="{{ route('reportes.vehiculos') }}"
                class="btn-detalle btn-pdf"
                title="Descargar reporte PDF"
            >

                <i class="fas fa-file-pdf"></i>

                PDF

            </a>


            <a
                href="{{ route('vehiculos.edit', $vehiculo->id) }}"
                class="btn-detalle btn-editar"
            >

                <i class="fas fa-pen"></i>

                Editar

            </a>


            <a
                href="{{ route('vehiculos.trasladar', $vehiculo) }}"
                class="btn-detalle btn-trasladar"
            >
                <i class="fas fa-truck-moving"></i>
                Trasladar
            </a>

        </div>


    </div>
    <!-- =====================================================
         HERO
    ====================================================== -->

    <div class="vehiculo-hero">


        <!-- FOTO -->

        @php
            $fotoPerfil = $vehiculo->documentos
                ->where('tipo', 'Foto Vehiculo')
                ->whereNotNull('ruta')
                ->where('ruta', '!=', '')
                ->first();

            $fotoPerfilUrl = $fotoPerfil
                ? asset('storage/' . $fotoPerfil->ruta)
                : (!empty($vehiculo->foto) ? $vehiculo->foto : asset('img/sin-foto.png'));
        @endphp

        <div class="vehiculo-foto foto-perfil-vehiculo">
            <img
                src="{{ $fotoPerfilUrl }}"
                alt="Foto de perfil del vehículo {{ $vehiculo->placa }}"
                onerror="this.onerror=null;this.src='{{ asset('img/sin-foto.png') }}';"
            >
        </div>


        <!-- INFORMACIÓN -->

        <div class="vehiculo-info">


            <div class="vehiculo-info-top">


                <div class="vehiculo-nombre">

                    <h2>

                        {{ $vehiculo->marca }}
                        {{ $vehiculo->linea }}

                    </h2>

                    <p>

                        Vehículo registrado en el sistema

                    </p>

                </div>


                <div class="placa-grande">

                    {{ strtoupper($vehiculo->placa) }}

                </div>


            </div>


            <!-- ESTADO -->

            @if($vehiculo->estado == 'Disponible')

                <span class="estado-detalle estado-disponible">

                    Disponible

                </span>

            @elseif($vehiculo->estado == 'Prestado')

                <span class="estado-detalle estado-prestado">

                    Prestado

                </span>

            @else

                <span class="estado-detalle estado-mantenimiento">

                    Mantenimiento

                </span>

            @endif


            <!-- DATOS RÁPIDOS -->

            <div class="datos-rapidos">


                <div class="dato-rapido">

                    <small>
                        Tipo
                    </small>

                    <strong>
                        {{ $vehiculo->tipo_vehiculo ?? 'No registrado' }}
                    </strong>

                </div>


                <div class="dato-rapido">

                    <small>
                        Modelo
                    </small>

                    <strong>
                        {{ $vehiculo->modelo }}
                    </strong>

                </div>


                


                <div class="dato-rapido">

                    <small>
                        Color
                    </small>

                    <strong>
                        {{ $vehiculo->color }}
                    </strong>

                </div>


            </div>


        </div>

    </div>


    <!-- =====================================================
         RESUMEN
    ====================================================== -->

    <div class="resumen-grid">


        <!-- PRÉSTAMOS -->

        <div class="resumen-card resumen-azul">

            <i class="fas fa-key"></i>

            <h3>
                {{ $totalPrestamos }}
            </h3>

            <p>
                Préstamos registrados
            </p>

        </div>





        <!-- MANTENIMIENTOS -->

        <div class="resumen-card resumen-naranja">

            <i class="fas fa-tools"></i>

            <h3>
                {{ $totalMantenimientos }}
            </h3>

            <p>
                Mantenimientos
            </p>

        </div>


        <!-- DOCUMENTOS -->

        <div class="resumen-card resumen-verde">

            <i class="fas fa-folder-open"></i>

            <h3>
                {{ $totalDocumentos }}
            </h3>

            <p>
                Documentos
            </p>

        </div>


        <!-- CONDUCTOR -->

        <div class="resumen-card resumen-celeste">

            <i class="fas fa-user"></i>

            <h3 style="font-size:18px;">

                {{ $ultimoPrestamo?->conductor?->nombre ?? 'Sin registros' }}

            </h3>

            <p>
                Último conductor
            </p>

        </div>


    </div>


    <!-- =====================================================
     INFORMACIÓN GENERAL
====================================================== -->

<div class="informacion-card">

    <div class="informacion-header">

        <div class="informacion-icono">
            <i class="fas fa-info-circle"></i>
        </div>

        <div>

            <h3>
                Información general
            </h3>

            <p>
                Identificación y clasificación del vehículo
            </p>

        </div>

    </div>


    <div class="informacion-grid">


        {{-- PLACA --}}

        <div class="info-item">

            <small>
                Placa
            </small>

            <strong>
                {{ strtoupper($vehiculo->placa) }}
            </strong>

        </div>


        {{-- TIPO --}}

        <div class="info-item">

            <small>
                Tipo de vehículo
            </small>

            <strong>
                {{ $vehiculo->tipo_vehiculo ?? 'No registrado' }}
            </strong>

        </div>


        {{-- MARCA --}}

        <div class="info-item">

            <small>
                Marca
            </small>

            <strong>
                {{ $vehiculo->marca ?? 'No registrada' }}
            </strong>

        </div>


        {{-- LÍNEA --}}

        <div class="info-item">

            <small>
                Línea
            </small>

            <strong>
                {{ $vehiculo->linea ?? 'No registrada' }}
            </strong>

        </div>


        {{-- MODELO --}}

        <div class="info-item">

            <small>
                Modelo
            </small>

            <strong>
                {{ $vehiculo->modelo ?? 'No registrado' }}
            </strong>

        </div>


        {{-- COLOR --}}

        <div class="info-item">

            <small>
                Color
            </small>

            <strong>
                {{ $vehiculo->color ?? 'No registrado' }}
            </strong>

        </div>


        {{-- TIPO DE PROTECCIÓN --}}

        <div class="info-item">

            <small>
                Tipo de protección
            </small>

            <strong>

                @if(($vehiculo->tipo_proteccion ?? 'Convencional') === 'Blindado')

                    <span class="badge-detalle badge-proceso">
                        <i class="fas fa-shield-alt"></i>
                        Blindado
                    </span>

                @else

                    <span class="badge-detalle badge-finalizado">
                        <i class="fas fa-car"></i>
                        Convencional
                    </span>

                @endif

            </strong>

        </div>


        {{-- NIVEL BLINDAJE --}}

        @if(($vehiculo->tipo_proteccion ?? 'Convencional') === 'Blindado')

            <div class="info-item">

                <small>
                    Nivel de blindaje
                </small>

                <strong>
                    {{ $vehiculo->nivel_blindaje ?? 'No registrado' }}
                </strong>

            </div>

        @endif


        {{-- CLASE DE SERVICIO --}}

        <div class="info-item">

            <small>
                Clase de servicio
            </small>

            <strong>

                {{ $vehiculo->clase_servicio ?? 'No registrada' }}

            </strong>

        </div>


        {{-- ESTADO --}}

        <div class="info-item">

            <small>
                Estado
            </small>

            <strong>
                {{ $vehiculo->estado ?? 'No registrado' }}
            </strong>

        </div>


        {{-- REGIONAL --}}

        <div class="info-item">

            <small>
                Regional
            </small>

            <strong>

                <i class="fas fa-map-marker-alt"
                   style="color:#2563eb;"></i>

                {{ $vehiculo->regional ?? 'No registrada' }}

            </strong>

        </div>


        {{-- FECHA LLEGADA --}}

        <div class="info-item">

            <small>
                Llegada a la regional
            </small>

            <strong>

                @if($vehiculo->fecha_llegada_regional)

                    {{ \Carbon\Carbon::parse($vehiculo->fecha_llegada_regional)->format('d/m/Y') }}

                @else

                    No registrada

                @endif

            </strong>

        </div>


    </div>

</div>

 <!-- =====================================================
     INFORMACIÓN TÉCNICA
====================================================== -->

<div class="informacion-card">

    <div class="informacion-header">

        <div class="informacion-icono">

            <i class="fas fa-cogs"></i>

        </div>

        <div>

            <h3>
                Información técnica
            </h3>

            <p>
                Características mecánicas, equipamiento y documentación técnica
            </p>

        </div>

    </div>


    <div class="informacion-grid">


        {{-- VIN --}}

        <div class="info-item">

            <small>
                VIN
            </small>

            <strong>
                {{ $vehiculo->vin ?? 'No registrado' }}
            </strong>

        </div>


        {{-- MOTOR --}}

        <div class="info-item">

            <small>
                Número de motor
            </small>

            <strong>
                {{ $vehiculo->motor ?? 'No registrado' }}
            </strong>

        </div>


        {{-- CILINDRAJE --}}

        <div class="info-item">

            <small>
                Cilindraje
            </small>

            <strong>

                @if($vehiculo->cilindraje)

                    {{ number_format($vehiculo->cilindraje, 0, ',', '.') }} cc

                @else

                    No registrado

                @endif

            </strong>

        </div>


        {{-- COMBUSTIBLE --}}

        <div class="info-item">

            <small>
                Combustible
            </small>

            <strong>
                {{ $vehiculo->combustible ?? 'No registrado' }}
            </strong>

        </div>


        {{-- TRANSMISIÓN --}}

        <div class="info-item">

            <small>
                Transmisión
            </small>

            <strong>
                {{ $vehiculo->transmision ?? 'No registrada' }}
            </strong>

        </div>


        {{-- ADBLUE --}}

        <div class="info-item">

            <small>
                AdBlue
            </small>

            <strong>

                @if($vehiculo->tiene_adblue)

                    <span class="badge-detalle badge-activo">

                        <i class="fas fa-check"></i>

                        Sí

                    </span>

                @else

                    <span class="badge-detalle badge-finalizado">

                        <i class="fas fa-times"></i>

                        No

                    </span>

                @endif

            </strong>

        </div>


        {{-- NIVEL ADBLUE --}}

        @if($vehiculo->tiene_adblue)

            <div class="info-item">

                <small>
                    Nivel de AdBlue
                </small>

                <strong>

                    {{ $vehiculo->nivel_adblue ?? 0 }} %

                </strong>

            </div>

        @endif


        {{-- KIT DE CARRETERA --}}

        <div class="info-item">

            <small>
                Kit de carretera
            </small>

            <strong>

                @if($vehiculo->kit_carretera)

                    <span class="badge-detalle badge-activo">

                        <i class="fas fa-check"></i>

                        Disponible

                    </span>

                @else

                    <span class="badge-detalle badge-vencido">

                        <i class="fas fa-times"></i>

                        No disponible

                    </span>

                @endif

            </strong>

        </div>


        {{-- EXTINTOR --}}

        <div class="info-item">

            <small>
                Vencimiento del extintor
            </small>

            <strong>

                @if($vehiculo->fecha_vencimiento_extintor)

                    @php

                        $fechaExtintor = \Carbon\Carbon::parse(
                            $vehiculo->fecha_vencimiento_extintor
                        );

                        $diasExtintor = now()->startOfDay()->diffInDays(
                            $fechaExtintor->startOfDay(),
                            false
                        );

                    @endphp


                    {{ $fechaExtintor->format('d/m/Y') }}


                    @if($diasExtintor < 0)

                        <br>

                        <span class="badge-detalle badge-vencido"
                              style="margin-top:6px;">

                            <i class="fas fa-exclamation-triangle"></i>

                            Vencido

                        </span>

                    @elseif($diasExtintor <= 30)

                        <br>

                        <span class="badge-detalle badge-proximo"
                              style="margin-top:6px;">

                            <i class="fas fa-clock"></i>

                            Vence en {{ $diasExtintor }} días

                        </span>

                    @else

                        <br>

                        <span class="badge-detalle badge-activo"
                              style="margin-top:6px;">

                            <i class="fas fa-check"></i>

                            Vigente

                        </span>

                    @endif

                @else

                    No registrada

                @endif

            </strong>

        </div>


        {{-- TARJETA DE PROPIEDAD --}}

        <div class="info-item">

            <small>
                Tarjeta de propiedad
            </small>

            <strong>
                {{ $vehiculo->tarjeta_propiedad ?? 'No registrada' }}
            </strong>

        </div>


        {{-- FECHA DE COMPRA --}}

        <div class="info-item">

            <small>
                Fecha de compra
            </small>

            <strong>

                @if($vehiculo->fecha_compra)

                    {{ \Carbon\Carbon::parse($vehiculo->fecha_compra)->format('d/m/Y') }}

                @else

                    No registrada

                @endif

            </strong>

        </div>


    </div>

</div>


    


    <!-- =====================================================
         HISTORIAL DE TRASLADOS
    ====================================================== -->

    <div class="historial-card">

        <div class="historial-header">

            <div class="historial-title">

                <div class="historial-icon traslado-icon">
                    <i class="fas fa-truck-moving"></i>
                </div>

                <div>
                    <h3>Historial de traslados</h3>
                    <p>Movimientos del vehículo entre regionales</p>
                </div>

            </div>

            <span class="historial-count">
                {{ $vehiculo->traslados->count() }}
            </span>

        </div>

        @if($vehiculo->traslados->count() > 0)

            <div class="traslados-list">

                @foreach($vehiculo->traslados->sortByDesc('fecha_traslado') as $traslado)

                    @php
                        $fechaTraslado = \Carbon\Carbon::parse($traslado->fecha_traslado);
                    @endphp

                    <div class="traslado-item">

                        <div class="traslado-fecha">
                            <div class="fecha-dia">
                                {{ $fechaTraslado->format('d') }}
                            </div>

                            <div class="fecha-mes">
                                {{ strtoupper($fechaTraslado->locale('es')->format('M')) }}
                            </div>
                        </div>

                        <div class="traslado-contenido">

                            <div class="traslado-ruta">

                                <span class="regional-origen">
                                    <i class="fas fa-location-dot"></i>
                                    {{ $traslado->regional_origen }}
                                </span>

                                <i class="fas fa-arrow-right traslado-flecha"></i>

                                <span class="regional-destino">
                                    <i class="fas fa-location-dot"></i>
                                    {{ $traslado->regional_destino }}
                                </span>

                            </div>

                            <div class="traslado-motivo">
                                <i class="fas fa-comment-alt"></i>
                                <span>
                                    <strong>Motivo:</strong>
                                    {{ $traslado->motivo ?? 'Sin motivo registrado' }}
                                </span>
                            </div>

                            <div class="traslado-info">
                                <i class="fas fa-calendar"></i>
                                Traslado realizado el
                                {{ $fechaTraslado->format('d/m/Y') }}
                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="sin-traslados">
                <div class="sin-traslados-icon">
                    <i class="fas fa-route"></i>
                </div>
                <strong>No hay traslados registrados</strong>
                <span>Este vehículo aún no ha sido trasladado entre regionales.</span>
            </div>

        @endif

    </div>

    <!-- =====================================================
         HISTORIAL
    ====================================================== -->

    <div class="historial-card">


        <!-- TABS -->

        <div class="tabs-header">


            <button
                type="button"
                class="tab-button active"
                onclick="mostrarTab('prestamos', this)"
            >

                <i class="fas fa-key"></i>

                Préstamos

            </button>


            <button
                type="button"
                class="tab-button"
                onclick="mostrarTab('mantenimientos', this)"
            >

                <i class="fas fa-tools"></i>

                Mantenimientos

            </button>


            <button
                type="button"
                class="tab-button"
                onclick="mostrarTab('documentos', this)"
            >

                <i class="fas fa-folder-open"></i>

                Documentos

            </button>


        </div>


        <!-- =================================================
             PRÉSTAMOS
        ================================================== -->

        <div
            id="prestamos"
            class="tab-content active"
        >


            <div class="historial-table-wrapper">

                <table class="historial-table">

                    <thead>

                        <tr>

                            <th>
                                Fecha
                            </th>

                            <th>
                                Conductor
                            </th>

                            <th>
                                Destino
                            </th>

                            <th>
                                Estado
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @forelse($vehiculo->prestamos as $prestamo)

                            <tr>

                                <td>
                                    {{ $prestamo->fecha_salida }}
                                </td>


                                <td>

                                    {{ $prestamo->conductor->nombre }}
                                    {{ $prestamo->conductor->apellido }}

                                </td>


                                <td>
                                    {{ $prestamo->destino }}
                                </td>


                                <td>

                                    @if($prestamo->estado == 'Activo')

                                        <span class="badge-detalle badge-activo">
                                            Activo
                                        </span>

                                    @else

                                        <span class="badge-detalle badge-finalizado">
                                            Finalizado
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4">

                                    <div class="sin-registros">

                                        <i class="fas fa-key"></i>

                                        <strong>
                                            No existen préstamos registrados
                                        </strong>

                                        <span>
                                            Este vehículo todavía no tiene historial de préstamos.
                                        </span>

                                    </div>

                                </td>

                            </tr>

                        @endforelse


                    </tbody>

                </table>

            </div>

        </div>


        <!-- =================================================
             MANTENIMIENTOS
        ================================================== -->

        <div
            id="mantenimientos"
            class="tab-content"
        >


            <div class="historial-table-wrapper">

                <table class="historial-table">

                    <thead>

                        <tr>

                            <th>
                                Fecha
                            </th>

                            <th>
                                Tipo
                            </th>

                            <th>
                                Taller
                            </th>

                            <th>
                                Estado
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        @forelse($vehiculo->mantenimientos as $mantenimiento)

                            <tr>

                                <td>
                                    {{ $mantenimiento->fecha }}
                                </td>


                                <td>
                                    {{ $mantenimiento->tipo }}
                                </td>


                                <td>
                                    {{ $mantenimiento->taller }}
                                </td>


                                <td>


                                    @if($mantenimiento->estado == 'Pendiente')

                                        <span class="badge-detalle badge-pendiente">
                                            Pendiente
                                        </span>

                                    @elseif($mantenimiento->estado == 'En proceso')

                                        <span class="badge-detalle badge-proceso">
                                            En proceso
                                        </span>

                                    @else

                                        <span class="badge-detalle badge-activo">
                                            Finalizado
                                        </span>

                                    @endif


                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4">

                                    <div class="sin-registros">

                                        <i class="fas fa-tools"></i>

                                        <strong>
                                            No existen mantenimientos registrados
                                        </strong>

                                        <span>
                                            Este vehículo no tiene mantenimientos asociados.
                                        </span>

                                    </div>

                                </td>

                            </tr>

                        @endforelse


                    </tbody>

                </table>

            </div>

        </div>


        <!-- =================================================
             DOCUMENTOS
        ================================================== -->

        <div
            id="documentos"
            class="tab-content"
        >

            @php
                $soatDoc = $vehiculo->documentos->where('tipo', 'SOAT')->first();
                $tecnoDoc = $vehiculo->documentos->where('tipo', 'Tecnomecanica')->first();
                $tarjetaDoc = $vehiculo->documentos->where('tipo', 'Tarjeta Propiedad')->first();
                $fotoDoc = $vehiculo->documentos->where('tipo', 'Foto Vehiculo')->first();
            @endphp

            <div class="informacion-grid">

                <div class="info-item">
                    <small>SOAT</small>
                    <strong>
                        @if($soatDoc)
                            <span class="badge-detalle badge-activo">Sí</span>
                            @if($soatDoc->aseguradora)
                                <br><span style="font-size:11px;color:#64748b;">{{ $soatDoc->aseguradora }}</span>
                            @endif
                            @if($soatDoc->fecha_vencimiento)
                                <br><span style="font-size:11px;">Vence: {{ \Carbon\Carbon::parse($soatDoc->fecha_vencimiento)->format('d/m/Y') }}</span>
                            @endif
                        @else
                            <span class="badge-detalle badge-vencido">No registrado</span>
                        @endif
                    </strong>
                </div>

                <div class="info-item">
                    <small>Tecnomecánica</small>
                    <strong>
                        @if($tecnoDoc)
                            <span class="badge-detalle badge-activo">Sí</span>
                            @if($tecnoDoc->fecha_vencimiento)
                                <br><span style="font-size:11px;">Vence: {{ \Carbon\Carbon::parse($tecnoDoc->fecha_vencimiento)->format('d/m/Y') }}</span>
                            @endif
                        @else
                            <span class="badge-detalle badge-vencido">No registrada</span>
                        @endif
                    </strong>
                </div>

                <div class="info-item">
                    <small>Tarjeta de propiedad</small>
                    <strong>
                        {{ $vehiculo->tarjeta_propiedad ?: 'No registrada' }}
                        @if($tarjetaDoc?->ruta)
                            <br>
                            <a href="{{ asset('storage/'.$tarjetaDoc->ruta) }}" target="_blank" style="font-size:11px;color:#2563eb;">
                                <i class="fas fa-eye"></i> Ver archivo
                            </a>
                        @endif
                    </strong>
                </div>

                <div class="info-item">
                    <small>Foto del vehículo</small>
                    <strong>
                        @if($fotoDoc?->ruta)
                            <a href="{{ asset('storage/'.$fotoDoc->ruta) }}" target="_blank" style="color:#2563eb;">
                                <i class="fas fa-image"></i> Ver fotografía
                            </a>
                        @elseif($vehiculo->foto)
                            <a href="{{ $vehiculo->foto }}" target="_blank" style="color:#2563eb;">
                                <i class="fas fa-image"></i> Ver fotografía
                            </a>
                        @else
                            <span class="badge-detalle badge-finalizado">No registrada</span>
                        @endif
                    </strong>
                </div>

            </div>

            <div class="historial-table-wrapper" style="margin-top:20px;">
                <table class="historial-table">
                    <thead>
                        <tr>
                            <th>Documento</th>
                            <th>Expedición</th>
                            <th>Vencimiento</th>
                            <th>Estado</th>
                            <th>Archivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($vehiculo->documentos as $documento)
                            @php
                                $estadoDoc = 'Sin vencimiento';
                                if ($documento->fecha_vencimiento) {
                                    $dias = now()->startOfDay()->diffInDays(\Carbon\Carbon::parse($documento->fecha_vencimiento)->startOfDay(), false);
                                    if ($dias < 0) $estadoDoc = 'Vencido';
                                    elseif ($dias <= 30) $estadoDoc = 'Próximo a vencer';
                                    else $estadoDoc = 'Vigente';
                                }
                            @endphp
                            <tr>
                                <td>{{ $documento->tipo }}</td>
                                <td>{{ $documento->fecha_expedicion ? \Carbon\Carbon::parse($documento->fecha_expedicion)->format('d/m/Y') : '—' }}</td>
                                <td>{{ $documento->fecha_vencimiento ? \Carbon\Carbon::parse($documento->fecha_vencimiento)->format('d/m/Y') : '—' }}</td>
                                <td>
                                    @if($estadoDoc === 'Vencido')
                                        <span class="badge-detalle badge-vencido">Vencido</span>
                                    @elseif($estadoDoc === 'Próximo a vencer')
                                        <span class="badge-detalle badge-proximo">Próximo a vencer</span>
                                    @elseif($estadoDoc === 'Vigente')
                                        <span class="badge-detalle badge-activo">Vigente</span>
                                    @else
                                        <span class="badge-detalle badge-finalizado">Sin vencimiento</span>
                                    @endif
                                </td>
                                <td>
                                    @if($documento->ruta)
                                        <a href="{{ asset('storage/'.$documento->ruta) }}" target="_blank" class="btn-detalle btn-volver" style="height:32px;padding:0 9px;">
                                            <i class="fas fa-eye"></i> Ver
                                        </a>
                                    @else
                                        —
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="sin-registros">
                                        <i class="fas fa-folder-open"></i>
                                        <strong>No existen documentos registrados</strong>
                                        <span>No hay documentos asociados a este vehículo.</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>


    </div>


</div>


<script>

function mostrarTab(tabId, boton) {


    const tabs =
        document.querySelectorAll('.tab-content');


    const botones =
        document.querySelectorAll('.tab-button');


    tabs.forEach(function(tab) {

        tab.classList.remove('active');

    });


    botones.forEach(function(btn) {

        btn.classList.remove('active');

    });


    document
        .getElementById(tabId)
        .classList.add('active');


    boton.classList.add('active');

}

</script>

@endsection