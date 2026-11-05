@extends('layouts.admin')

@section('titulo','Detalle del Préstamo')

@section('contenido')

<style>

    .detalle-prestamo-page {
        max-width: 1200px;
        margin: 0 auto;
        padding-bottom: 40px;
    }

    /* =========================
       ENCABEZADO
    ========================= */

    .detalle-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 22px;
    }

    .detalle-title {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .detalle-title-icon {
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

    .detalle-title h1 {
        margin: 0;

        color: #172033;

        font-size: 25px;
        font-weight: 800;
    }

    .detalle-title p {
        margin: 4px 0 0;

        color: #64748b;

        font-size: 12px;
    }

    /* =========================
       ESTADO SUPERIOR
    ========================= */

    .estado-card {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        padding: 10px 15px;

        border-radius: 25px;

        font-size: 10px;
        font-weight: 800;
    }

    .estado-card.activo {
        color: #166534;

        background: #f0fdf4;

        border: 1px solid #bbf7d0;
    }

    .estado-card.finalizado {
        color: #475569;

        background: #f1f5f9;

        border: 1px solid #cbd5e1;
    }

    .estado-punto {
        width: 8px;
        height: 8px;

        border-radius: 50%;
    }

    .activo .estado-punto {
        background: #22c55e;
    }

    .finalizado .estado-punto {
        background: #94a3b8;
    }

    /* =========================
       CARD PRINCIPAL
    ========================= */

    .detalle-card {
        background: white;

        border: 1px solid #e5eaf2;

        border-radius: 20px;

        box-shadow:
            0 10px 30px rgba(15,23,42,.06);

        overflow: hidden;
    }

    /* =========================
       HERO
    ========================= */

    .detalle-hero {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 25px;

        padding: 25px;

        background:
            linear-gradient(
                135deg,
                #eff6ff,
                #f8fafc
            );

        border-bottom: 1px solid #e5eaf2;
    }

    .hero-vehiculo {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .hero-icon {
        width: 65px;
        height: 65px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 17px;

        color: white;

        background:
            linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );

        font-size: 25px;

        box-shadow:
            0 8px 18px rgba(37,99,235,.20);
    }

    .hero-vehiculo h2 {
        margin: 0;

        color: #172033;

        font-size: 21px;
        font-weight: 800;
    }

    .hero-vehiculo p {
        margin: 5px 0 0;

        color: #64748b;

        font-size: 11px;
    }

    .hero-id {
        color: #64748b;

        font-size: 10px;

        font-weight: 700;
    }

    /* =========================
       CONTENIDO
    ========================= */

    .detalle-body {
        padding: 28px;
    }

    /* =========================
       SECCIONES
    ========================= */

    .detalle-section {
        margin-bottom: 30px;
    }

    .detalle-section:last-child {
        margin-bottom: 0;
    }

    .section-header-detalle {
        display: flex;
        align-items: center;
        gap: 10px;

        margin-bottom: 17px;

        padding-bottom: 11px;

        border-bottom: 1px solid #edf0f5;
    }

    .section-header-icon {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 10px;

        background: #eff6ff;

        color: #2563eb;

        font-size: 12px;
    }

    .section-header-detalle h3 {
        margin: 0;

        color: #334155;

        font-size: 13px;

        font-weight: 800;
    }

    .section-header-detalle p {
        margin: 2px 0 0;

        color: #94a3b8;

        font-size: 9px;
    }

    /* =========================
       GRID
    ========================= */

    .detalle-grid {
        display: grid;

        grid-template-columns: repeat(2, 1fr);

        gap: 14px;
    }

    .detalle-grid.four {
        grid-template-columns: repeat(4, 1fr);
    }

    /* =========================
       ITEM
    ========================= */

    .detalle-item {
        min-height: 76px;

        padding: 14px 15px;

        border-radius: 12px;

        background: #f8fafc;

        border: 1px solid #edf0f5;

        transition: .2s;
    }

    .detalle-item:hover {
        border-color: #dbeafe;

        background: #f8fbff;
    }

    .detalle-label {
        display: flex;
        align-items: center;

        gap: 6px;

        margin-bottom: 7px;

        color: #94a3b8;

        font-size: 9px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .4px;
    }

    .detalle-label i {
        color: #2563eb;

        font-size: 9px;
    }

    .detalle-value {
        color: #334155;

        font-size: 12px;

        font-weight: 700;

        word-break: break-word;
    }

    .detalle-value.vacio {
        color: #94a3b8;

        font-weight: 500;

        font-style: italic;
    }

    /* =========================
       SALIDA / REGRESO
    ========================= */

    .viaje-grid {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 18px;
    }

    .viaje-card {
        padding: 18px;

        border-radius: 15px;

        border: 1px solid #e5eaf2;

        background: white;
    }

    .viaje-card.salida {
        border-top: 3px solid #2563eb;
    }

    .viaje-card.regreso {
        border-top: 3px solid #16a34a;
    }

    .viaje-title {
        display: flex;

        align-items: center;

        gap: 9px;

        margin-bottom: 15px;
    }

    .viaje-title-icon {
        width: 32px;
        height: 32px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 9px;

        font-size: 11px;
    }

    .salida .viaje-title-icon {
        color: #2563eb;
        background: #eff6ff;
    }

    .regreso .viaje-title-icon {
        color: #16a34a;
        background: #f0fdf4;
    }

    .viaje-title strong {
        color: #334155;

        font-size: 12px;
    }

    .viaje-data {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 10px;
    }

    .viaje-data-item {
        padding: 11px;

        border-radius: 10px;

        background: #f8fafc;
    }

    .viaje-data-item span {
        display: block;

        margin-bottom: 4px;

        color: #94a3b8;

        font-size: 8px;

        font-weight: 800;

        text-transform: uppercase;
    }

    .viaje-data-item strong {
        color: #334155;

        font-size: 11px;
    }

    /* =========================
       MOTIVO Y OBSERVACIONES
    ========================= */

    .texto-detalle {
        padding: 17px;

        border-radius: 12px;

        background: #f8fafc;

        border: 1px solid #edf0f5;
    }

    .texto-detalle p {
        margin: 0;

        color: #475569;

        font-size: 11px;

        line-height: 1.7;

        white-space: pre-line;
    }

    .texto-vacio {
        color: #94a3b8 !important;

        font-style: italic;
    }

    /* =========================
       FOOTER
    ========================= */

    .detalle-footer {
        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 15px;

        padding: 18px 25px;

        border-top: 1px solid #edf0f5;

        background: #fafbfd;
    }

    .footer-info {
        display: flex;

        align-items: center;

        gap: 7px;

        color: #94a3b8;

        font-size: 9px;
    }

    .footer-info i {
        color: #2563eb;
    }

    .btn-volver-detalle {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        height: 40px;

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

    .btn-volver-detalle:hover {
        color: #2563eb;

        background: #eff6ff;

        border-color: #bfdbfe;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media(max-width: 900px) {

        .detalle-grid.four {
            grid-template-columns: repeat(2, 1fr);
        }

        .viaje-grid {
            grid-template-columns: 1fr;
        }

        .detalle-hero {
            align-items: flex-start;

            flex-direction: column;
        }

    }

    @media(max-width: 650px) {

        .detalle-header {
            align-items: flex-start;

            flex-direction: column;
        }

        .detalle-grid,
        .detalle-grid.four {
            grid-template-columns: 1fr;
        }

        .detalle-body {
            padding: 20px;
        }

        .viaje-data {
            grid-template-columns: 1fr;
        }

        .detalle-footer {
            align-items: stretch;

            flex-direction: column;
        }

        .btn-volver-detalle {
            width: 100%;
        }

    }

</style>


<div class="detalle-prestamo-page">


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="detalle-header">

        <div class="detalle-title">

            <div class="detalle-title-icon">

                <i class="fas fa-key"></i>

            </div>

            <div>

                <h1>Detalle del préstamo</h1>

                <p>
                    Información completa del préstamo vehicular.
                </p>

            </div>

        </div>


        @if($prestamo->estado == 'Activo')

            <div class="estado-card activo">

                <span class="estado-punto"></span>

                Préstamo activo

            </div>

        @else

            <div class="estado-card finalizado">

                <span class="estado-punto"></span>

                Préstamo finalizado

            </div>

        @endif

    </div>


    {{-- =====================================================
         CARD PRINCIPAL
    ====================================================== --}}

    <div class="detalle-card">


        {{-- HERO --}}

        <div class="detalle-hero">

            <div class="hero-vehiculo">

                <div class="hero-icon">

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

                    </p>

                </div>

            </div>


            <div class="hero-id">

                Préstamo #{{ $prestamo->id }}

            </div>

        </div>


        <div class="detalle-body">


            {{-- =================================================
                 INFORMACIÓN GENERAL
            ================================================== --}}

            <div class="detalle-section">

                <div class="section-header-detalle">

                    <div class="section-header-icon">

                        <i class="fas fa-info-circle"></i>

                    </div>

                    <div>

                        <h3>
                            Información general
                        </h3>

                        <p>
                            Datos principales del servicio
                        </p>

                    </div>

                </div>


                <div class="detalle-grid">


                    {{-- CONDUCTOR --}}

                    <div class="detalle-item">

                        <div class="detalle-label">

                            <i class="fas fa-user"></i>

                            Conductor

                        </div>

                        <div class="detalle-value">

                            {{ $prestamo->conductor->nombre }}

                            {{ $prestamo->conductor->apellido }}

                        </div>

                    </div>


                    {{-- DEPENDENCIA --}}

                    <div class="detalle-item">

                        <div class="detalle-label">

                            <i class="fas fa-building"></i>

                            Dependencia

                        </div>

                        <div class="detalle-value">

                            {{ $prestamo->dependencia }}

                        </div>

                    </div>


                    {{-- DESTINO --}}

                    <div class="detalle-item">

                        <div class="detalle-label">

                            <i class="fas fa-map-marker-alt"></i>

                            Destino

                        </div>

                        <div class="detalle-value">

                            {{ $prestamo->destino }}

                        </div>

                    </div>


                    {{-- ESTADO --}}

                    <div class="detalle-item">

                        <div class="detalle-label">

                            <i class="fas fa-circle-check"></i>

                            Estado

                        </div>

                        <div class="detalle-value">

                            {{ $prestamo->estado }}

                        </div>

                    </div>


                </div>

            </div>


            {{-- =================================================
                 SALIDA Y REGRESO
            ================================================== --}}

            <div class="detalle-section">

                <div class="section-header-detalle">

                    <div class="section-header-icon">

                        <i class="fas fa-route"></i>

                    </div>

                    <div>

                        <h3>
                            Control del recorrido
                        </h3>

                        <p>
                            Información de salida y regreso del vehículo
                        </p>

                    </div>

                </div>


                <div class="viaje-grid">


                    {{-- SALIDA --}}

                    <div class="viaje-card salida">

                        <div class="viaje-title">

                            <div class="viaje-title-icon">

                                <i class="fas fa-sign-out-alt"></i>

                            </div>

                            <strong>
                                Salida
                            </strong>

                        </div>


                        <div class="viaje-data">


                            <div class="viaje-data-item">

                                <span>
                                    Fecha
                                </span>

                                <strong>

                                    {{ $prestamo->fecha_salida }}

                                </strong>

                            </div>


                            <div class="viaje-data-item">

                                <span>
                                    Hora
                                </span>

                                <strong>

                                    {{ $prestamo->hora_salida }}

                                </strong>

                            </div>


                            <div class="viaje-data-item">

                                <span>
                                    Kilometraje
                                </span>

                                <strong>

                                    {{ number_format($prestamo->km_salida, 0, ',', '.') }}

                                    km

                                </strong>

                            </div>


                            <div class="viaje-data-item">

                                <span>
                                    Combustible
                                </span>

                                <strong>

                                    {{ $prestamo->combustible_salida }}

                                </strong>

                            </div>


                        </div>

                    </div>


                    {{-- REGRESO --}}

                    <div class="viaje-card regreso">

                        <div class="viaje-title">

                            <div class="viaje-title-icon">

                                <i class="fas fa-sign-in-alt"></i>

                            </div>

                            <strong>
                                Regreso
                            </strong>

                        </div>


                        <div class="viaje-data">


                            <div class="viaje-data-item">

                                <span>
                                    Fecha
                                </span>

                                <strong>

                                    @if($prestamo->fecha_regreso)

                                        {{ $prestamo->fecha_regreso }}

                                    @else

                                        Pendiente

                                    @endif

                                </strong>

                            </div>


                            <div class="viaje-data-item">

                                <span>
                                    Hora
                                </span>

                                <strong>

                                    @if($prestamo->hora_regreso)

                                        {{ $prestamo->hora_regreso }}

                                    @else

                                        Pendiente

                                    @endif

                                </strong>

                            </div>


                            <div class="viaje-data-item">

                                <span>
                                    Kilometraje
                                </span>

                                <strong>

                                    @if($prestamo->km_llegada !== null)

                                        {{ number_format($prestamo->km_llegada, 0, ',', '.') }}

                                        km

                                    @else

                                        Pendiente

                                    @endif

                                </strong>

                            </div>


                            <div class="viaje-data-item">

                                <span>
                                    Combustible
                                </span>

                                <strong>

                                    @if($prestamo->combustible_llegada)

                                        {{ $prestamo->combustible_llegada }}

                                    @else

                                        Pendiente

                                    @endif

                                </strong>

                            </div>


                        </div>

                    </div>


                </div>

            </div>


            {{-- =================================================
                 MOTIVO
            ================================================== --}}

            <div class="detalle-section">

                <div class="section-header-detalle">

                    <div class="section-header-icon">

                        <i class="fas fa-comment-alt"></i>

                    </div>

                    <div>

                        <h3>
                            Motivo del préstamo
                        </h3>

                        <p>
                            Justificación del desplazamiento
                        </p>

                    </div>

                </div>


                <div class="texto-detalle">

                    @if($prestamo->motivo)

                        <p>
                            {{ $prestamo->motivo }}
                        </p>

                    @else

                        <p class="texto-vacio">
                            No se registró un motivo.
                        </p>

                    @endif

                </div>

            </div>


            {{-- =================================================
                 OBSERVACIONES
            ================================================== --}}

            <div class="detalle-section">

                <div class="section-header-detalle">

                    <div class="section-header-icon">

                        <i class="fas fa-sticky-note"></i>

                    </div>

                    <div>

                        <h3>
                            Observaciones
                        </h3>

                        <p>
                            Información adicional del préstamo
                        </p>

                    </div>

                </div>


                <div class="texto-detalle">

                    @if($prestamo->observaciones)

                        <p>
                            {{ $prestamo->observaciones }}
                        </p>

                    @else

                        <p class="texto-vacio">
                            No hay observaciones registradas.
                        </p>

                    @endif

                </div>

            </div>


        </div>


        {{-- =====================================================
             FOOTER
        ====================================================== --}}

        <div class="detalle-footer">


            <div class="footer-info">

                <i class="fas fa-shield-alt"></i>

                Información registrada en el sistema de gestión vehicular.

            </div>


            <a
                href="{{ route('prestamos.index') }}"
                class="btn-volver-detalle"
            >

                <i class="fas fa-arrow-left"></i>

                Volver a préstamos

            </a>


        </div>


    </div>


</div>

@endsection