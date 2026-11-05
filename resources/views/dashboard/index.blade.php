@extends('layouts.admin')

@section('titulo', 'Dashboard')

@section('contenido')

<style>

    /* =========================================================
       DASHBOARD
    ========================================================= */

    .dashboard {

        width: 100%;

        animation: dashboardEntrada .45s ease;

    }

    @keyframes dashboardEntrada {

        from {

            opacity: 0;

            transform: translateY(10px);

        }

        to {

            opacity: 1;

            transform: translateY(0);

        }

    }


    /* =========================================================
       ENCABEZADO
    ========================================================= */

    .dashboard-header {

        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-bottom: 24px;

    }

    .dashboard-header h1 {

        margin: 0;

        font-size: 26px;

        font-weight: 800;

        color: #172033;

        letter-spacing: -.5px;

    }

    .dashboard-header p {

        margin: 5px 0 0;

        color: #64748b;

        font-size: 13px;

    }

    .dashboard-date {

        padding: 10px 15px;

        border-radius: 12px;

        background: white;

        border: 1px solid #e5eaf2;

        color: #64748b;

        font-size: 12px;

        box-shadow: 0 5px 18px rgba(15,23,42,.04);

    }


    /* =========================================================
       TARJETAS DE ESTADÍSTICAS
    ========================================================= */

    .stats-grid {

        display: grid;

        grid-template-columns:
            repeat(4, minmax(0, 1fr));

        gap: 18px;

        margin-bottom: 22px;

    }

    .stat-card {

        position: relative;

        min-height: 150px;

        padding: 22px;

        overflow: hidden;

        border-radius: 20px;

        color: white;

        box-shadow:
            0 12px 28px rgba(15,23,42,.10);

        transition:
            transform .25s ease,
            box-shadow .25s ease;

    }

    .stat-card:hover {

        transform: translateY(-5px);

        box-shadow:
            0 18px 35px rgba(15,23,42,.16);

    }

    .stat-card::before {

        content: '';

        position: absolute;

        width: 130px;

        height: 130px;

        border-radius: 50%;

        right: -45px;

        top: -45px;

        background: rgba(255,255,255,.10);

    }

    .stat-card::after {

        content: '';

        position: absolute;

        width: 80px;

        height: 80px;

        border-radius: 50%;

        right: 45px;

        bottom: -45px;

        background: rgba(255,255,255,.07);

    }

    .stat-blue {

        background:
            linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );

    }

    .stat-green {

        background:
            linear-gradient(
                135deg,
                #16a34a,
                #15803d
            );

    }

    .stat-red {

        background:
            linear-gradient(
                135deg,
                #ef4444,
                #dc2626
            );

    }

    .stat-orange {

        background:
            linear-gradient(
                135deg,
                #f59e0b,
                #d97706
            );

    }

    .stat-top {

        position: relative;

        z-index: 2;

        display: flex;

        align-items: center;

        justify-content: space-between;

    }

    .stat-icon {

        width: 48px;

        height: 48px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 15px;

        background: rgba(255,255,255,.16);

        border:
            1px solid rgba(255,255,255,.20);

        font-size: 20px;

        backdrop-filter: blur(5px);

    }

    .stat-label {

        position: relative;
        display: flex;

        flex-direction: column;

        gap: 4px;

    }

    .stat-number {

        font-size: 34px;

        line-height: 1;

        font-weight: 800;

    }

    .stat-name {

        font-size: 13px;

        font-weight: 500;

        opacity: .9;

    }

    .stat-description {

        margin-top: 12px;

        font-size: 11px;

        opacity: .75;

    }


    /* =========================================================
       GRID PRINCIPAL
    ========================================================= */

    .dashboard-grid {

        display: grid;

        grid-template-columns:
            1fr 1fr;

        gap: 20px;

        margin-bottom: 20px;

    }


    /* =========================================================
       TARJETAS DE CONTENIDO
    ========================================================= */

    .dashboard-card {

        background: white;

        border: 1px solid #e5eaf2;

        border-radius: 20px;

        box-shadow:
            0 10px 28px rgba(15,23,42,.06);

        overflow: hidden;

    }

    .dashboard-card-header {

        padding: 19px 22px;

        display: flex;

        align-items: center;

        justify-content: space-between;

        border-bottom: 1px solid #edf0f5;

    }

    .dashboard-card-title {

        display: flex;

        align-items: center;

        gap: 11px;

        color: #172033;

        font-size: 16px;

        font-weight: 700;

    }

    .card-title-icon {

        width: 38px;

        height: 38px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 11px;

        color: #2563eb;

        background: #eff6ff;

    }

    .dashboard-card-body {

        padding: 20px 22px;

    }


    /* =========================================================
       INFORMACIÓN GENERAL
    ========================================================= */

    .info-list {

        display: flex;

        flex-direction: column;

        gap: 11px;

    }

    .info-item {

        display: flex;

        align-items: center;

        justify-content: space-between;

        padding: 13px 14px;

        border-radius: 12px;

        background: #f8fafc;

        border: 1px solid #eef2f7;

        transition: .2s;

    }

    .info-item:hover {

        background: #f1f5f9;

        transform: translateX(3px);

    }

    .info-left {

        display: flex;

        align-items: center;

        gap: 11px;

    }

    .info-icon {

        width: 34px;

        height: 34px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 10px;

        background: #eff6ff;

        color: #2563eb;

        font-size: 14px;

    }

    .info-name {

        color: #475569;

        font-size: 13px;

        font-weight: 500;

    }

    .info-value {

        min-width: 32px;

        height: 30px;

        display: flex;

        align-items: center;

        justify-content: center;

        padding: 0 9px;

        border-radius: 9px;

        background: #eaf2ff;

        color: #1d4ed8;

        font-size: 13px;

        font-weight: 800;

    }


    /* =========================================================
       ESTADO DEL SISTEMA
    ========================================================= */

    .system-status {

        display: flex;

        flex-direction: column;

        gap: 12px;

    }

    .status-item {

        display: flex;

        align-items: center;

        gap: 13px;

        padding: 14px;

        border-radius: 13px;

        border: 1px solid;

    }

    .status-item.success {

        color: #166534;

        background: #f0fdf4;

        border-color: #bbf7d0;

    }

    .status-item.primary {

        color: #1e40af;

        background: #eff6ff;

        border-color: #bfdbfe;

    }

    .status-item.info {

        color: #155e75;

        background: #ecfeff;

        border-color: #a5f3fc;

    }

    .status-icon {

        width: 35px;

        height: 35px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 10px;

        background: rgba(255,255,255,.7);

        flex-shrink: 0;

    }

    .status-text {

        font-size: 13px;

        font-weight: 600;

    }


    /* =========================================================
       ALERTAS
    ========================================================= */

    .alerts-card {

        margin-bottom: 20px;

    }

    .alerts-list {

        display: flex;

        flex-direction: column;

        gap: 11px;

    }

    .system-alert {

        display: flex;

        align-items: center;

        gap: 13px;

        padding: 15px 17px;

        border-radius: 13px;

        border: 1px solid;

        font-size: 13px;

        line-height: 1.5;

    }

    .system-alert i {

        font-size: 17px;

        flex-shrink: 0;

    }

    .system-alert strong {

        font-weight: 800;

    }

    .alert-warning {

        color: #92400e;

        background: #fffbeb;

        border-color: #fde68a;

    }

    .alert-danger-custom {

        color: #991b1b;

        background: #fef2f2;

        border-color: #fecaca;

    }

    .alert-info-custom {

        color: #075985;

        background: #f0f9ff;

        border-color: #bae6fd;

    }

    .alert-secondary-custom {

        color: #475569;

        background: #f8fafc;

        border-color: #cbd5e1;

    }

    .no-alerts {

        display: flex;

        align-items: center;

        gap: 12px;

        padding: 16px;

        border-radius: 13px;

        color: #166534;

        background: #f0fdf4;

        border: 1px solid #bbf7d0;

        font-size: 13px;

        font-weight: 600;

    }


    /* =========================================================
       GRÁFICA
    ========================================================= */

    .bottom-grid {

        display: grid;

        grid-template-columns:
            1.25fr .75fr;

        gap: 20px;

    }

    .chart-container {

        height: 310px;

        position: relative;

        display: flex;

        align-items: center;

        justify-content: center;

    }


    /* =========================================================
       ACCIONES RÁPIDAS
    ========================================================= */

    .quick-actions {

        display: grid;

        grid-template-columns:
            repeat(2, 1fr);

        gap: 12px;

    }

    .quick-action {

        min-height: 105px;

        padding: 17px;

        display: flex;

        flex-direction: column;

        justify-content: center;

        gap: 9px;

        border-radius: 15px;

        background: #f8fafc;

        border: 1px solid #e5eaf2;

        color: #334155;

        transition: .25s;

    }

    .quick-action:hover {

        transform: translateY(-3px);

        border-color: #bfdbfe;

        background: #eff6ff;

        color: #1d4ed8;

        box-shadow:
            0 8px 20px rgba(37,99,235,.08);

    }

    .quick-action i {

        width: 38px;

        height: 38px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 11px;

        background: #dbeafe;

        color: #2563eb;

    }

    .quick-action strong {

        font-size: 12px;

    }

    .quick-action span {

        color: #94a3b8;

        font-size: 10px;

    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width: 1100px) {

        .stats-grid {

            grid-template-columns:
                repeat(2, 1fr);

        }

        .bottom-grid {

            grid-template-columns: 1fr;

        }

    }

    @media(max-width: 768px) {

        .dashboard-header {

            align-items: flex-start;

        }

        .dashboard-header h1 {

            font-size: 23px;

        }

        .dashboard-date {

            display: none;

        }

        .stats-grid {

            grid-template-columns:
                repeat(2, 1fr);

            gap: 12px;

        }

        .stat-card {

            min-height: 135px;

            padding: 17px;

        }

        .stat-number {

            font-size: 28px;

        }

        .dashboard-grid {

            grid-template-columns: 1fr;

            gap: 14px;

        }

    }

    @media(max-width: 480px) {

        .stats-grid {

            grid-template-columns: 1fr;

        }

        .stat-card {

            min-height: 125px;

        }

        .quick-actions {

            grid-template-columns: 1fr;

        }

        .dashboard-card-header {

            padding: 15px;

        }

        .dashboard-card-body {

            padding: 15px;

        }

    }
    /* =========================================================
   REGIONALES Y PROTECCIÓN
========================================================= */

.regionales-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
    margin-bottom: 22px;
}

.regional-card {
    position: relative;
    overflow: hidden;
    padding: 20px;
    border-radius: 18px;
    background: white;
    border: 1px solid #e5eaf2;
    box-shadow: 0 10px 25px rgba(15,23,42,.06);
    transition: .25s;
}

.regional-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 16px 30px rgba(15,23,42,.10);
}

.regional-card::after {
    content: '';
    position: absolute;
    width: 90px;
    height: 90px;
    border-radius: 50%;
    right: -30px;
    top: -30px;
    background: #eff6ff;
}

.regional-top {
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.regional-icon {
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 13px;
    background: #eff6ff;
    color: #2563eb;
    font-size: 18px;
}

.regional-name {
    margin-top: 14px;
    color: #64748b;
    font-size: 12px;
    font-weight: 600;
}

.regional-number {
    margin-top: 4px;
    color: #172033;
    font-size: 30px;
    font-weight: 800;
}

.regional-details {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 9px;
    margin-top: 15px;
}

.regional-detail {
    padding: 10px;
    border-radius: 10px;
    background: #f8fafc;
    border: 1px solid #eef2f7;
}

.regional-detail small {
    display: block;
    color: #94a3b8;
    font-size: 9px;
    margin-bottom: 4px;
}

.regional-detail strong {
    color: #334155;
    font-size: 15px;
}

.proteccion-resumen {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
    margin-bottom: 22px;
}

.proteccion-card {
    padding: 20px;
    border-radius: 18px;
    border: 1px solid #e5eaf2;
    background: white;
    box-shadow: 0 10px 25px rgba(15,23,42,.06);
}

.proteccion-card-inner {
    display: flex;
    align-items: center;
    gap: 15px;
}

.proteccion-icon {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 14px;
    font-size: 20px;
}

.proteccion-icon.blindado {
    color: #7c3aed;
    background: #f5f3ff;
}

.proteccion-icon.convencional {
    color: #0891b2;
    background: #ecfeff;
}

.proteccion-info small {
    display: block;
    color: #94a3b8;
    font-size: 10px;
    margin-bottom: 3px;
}

.proteccion-info strong {
    color: #172033;
    font-size: 25px;
    font-weight: 800;
}

.proteccion-info span {
    display: block;
    margin-top: 3px;
    color: #64748b;
    font-size: 10px;
}

@media(max-width:900px) {

    .regionales-grid {
        grid-template-columns: 1fr;
    }

    .proteccion-resumen {
        grid-template-columns: 1fr;
    }

}

</style>


<div class="dashboard">


    <!-- =====================================================
         ENCABEZADO
    ====================================================== -->

    <div class="dashboard-header">

        <div>

            <h1>Panel de control</h1>

            <p>
                Resumen general del sistema de gestión vehicular.
            </p>

        </div>

        <div class="dashboard-date">

            <i class="far fa-calendar"></i>

            {{ now()->format('d/m/Y') }}

        </div>

    </div>


    <!-- =====================================================
         ESTADÍSTICAS
    ====================================================== -->

    <div class="stats-grid">


        <!-- TOTAL -->

        <div class="stat-card stat-blue">

            <div class="stat-top">

                <div class="stat-label">

                    <span class="stat-number">
                        {{ $totalVehiculos }}
                    </span>

                    <span class="stat-name">
                        Total de vehículos
                    </span>

                </div>

                <div class="stat-icon">

                    <i class="fas fa-car"></i>

                </div>

            </div>

            <div class="stat-description">

                Vehículos registrados en el sistema

            </div>

        </div>


        <!-- DISPONIBLES -->

        <div class="stat-card stat-green">

            <div class="stat-top">

                <div class="stat-label">

                    <span class="stat-number">
                        {{ $vehiculosDisponibles }}
                    </span>

                    <span class="stat-name">
                        Disponibles
                    </span>

                </div>

                <div class="stat-icon">

                    <i class="fas fa-circle-check"></i>

                </div>

            </div>

            <div class="stat-description">

                Vehículos disponibles actualmente

            </div>

        </div>


        <!-- PRESTADOS -->

        <div class="stat-card stat-red">

            <div class="stat-top">

                <div class="stat-label">

                    <span class="stat-number">
                        {{ $vehiculosPrestados }}
                    </span>

                    <span class="stat-name">
                        Prestados
                    </span>

                </div>

                <div class="stat-icon">

                    <i class="fas fa-key"></i>

                </div>

            </div>

            <div class="stat-description">

                Vehículos actualmente en préstamo

            </div>

        </div>


        <!-- MANTENIMIENTO -->

        <div class="stat-card stat-orange">

            <div class="stat-top">

                <div class="stat-label">

                    <span class="stat-number">
                        {{ $vehiculosMantenimiento }}
                    </span>

                    <span class="stat-name">
                        En mantenimiento
                    </span>

                </div>

                <div class="stat-icon">

                    <i class="fas fa-screwdriver-wrench"></i>

                </div>

            </div>

            <div class="stat-description">

                Vehículos fuera de servicio

            </div>

        </div>

    </div>

    <!-- =====================================================
     RESUMEN POR REGIONALES
====================================================== -->

<div class="regionales-grid">


    {{-- NEIVA --}}

    <div class="regional-card">

        <div class="regional-top">

            <div>

                <div class="regional-name">
                    REGIONAL
                </div>

                <div class="regional-number">
                    Neiva
                </div>

            </div>

            <div class="regional-icon">

                <i class="fas fa-location-dot"></i>

            </div>

        </div>


        <div class="regional-details">

            <div class="regional-detail">

                <small>
                    Total vehículos
                </small>

                <strong>
                    {{ $vehiculosNeiva }}
                </strong>

            </div>


            <div class="regional-detail">

                <small>
                    Blindados
                </small>

                <strong>
                    {{ $blindadosNeiva }}
                </strong>

            </div>


            <div class="regional-detail">

                <small>
                    Convencionales
                </small>

                <strong>
                    {{ $convencionalesNeiva }}
                </strong>

            </div>

        </div>

    </div>


    {{-- IBAGUÉ --}}

    <div class="regional-card">

        <div class="regional-top">

            <div>

                <div class="regional-name">
                    REGIONAL
                </div>

                <div class="regional-number">
                    Ibagué
                </div>

            </div>

            <div class="regional-icon">

                <i class="fas fa-location-dot"></i>

            </div>

        </div>


        <div class="regional-details">

            <div class="regional-detail">

                <small>
                    Total vehículos
                </small>

                <strong>
                    {{ $vehiculosIbague }}
                </strong>

            </div>


            <div class="regional-detail">

                <small>
                    Blindados
                </small>

                <strong>
                    {{ $blindadosIbague }}
                </strong>

            </div>


            <div class="regional-detail">

                <small>
                    Convencionales
                </small>

                <strong>
                    {{ $convencionalesIbague }}
                </strong>

            </div>

        </div>

    </div>


    {{-- TOTAL GENERAL --}}

    <div class="regional-card">

        <div class="regional-top">

            <div>

                <div class="regional-name">
                    TOTAL GENERAL
                </div>

                <div class="regional-number">
                    {{ $totalVehiculos }}
                </div>

            </div>

            <div class="regional-icon">

                <i class="fas fa-car-side"></i>

            </div>

        </div>


        <div class="regional-details">

            <div class="regional-detail">

                <small>
                    Blindados
                </small>

                <strong>
                    {{ $vehiculosBlindados }}
                </strong>

            </div>


            <div class="regional-detail">

                <small>
                    Convencionales
                </small>

                <strong>
                    {{ $vehiculosConvencionales }}
                </strong>

            </div>

        </div>

    </div>

</div>


<!-- =====================================================
     RESUMEN DE PROTECCIÓN
====================================================== -->

<div class="proteccion-resumen">


    {{-- BLINDADOS --}}

    <div class="proteccion-card">

        <div class="proteccion-card-inner">

            <div class="proteccion-icon blindado">

                <i class="fas fa-shield-halved"></i>

            </div>

            <div class="proteccion-info">

                <small>
                    VEHÍCULOS BLINDADOS
                </small>

                <strong>
                    {{ $vehiculosBlindados }}
                </strong>

                <span>
                    Neiva: {{ $blindadosNeiva }}
                    &nbsp; | &nbsp;
                    Ibagué: {{ $blindadosIbague }}
                </span>

            </div>

        </div>

    </div>


    {{-- CONVENCIONALES --}}

    <div class="proteccion-card">

        <div class="proteccion-card-inner">

            <div class="proteccion-icon convencional">

                <i class="fas fa-car"></i>

            </div>

            <div class="proteccion-info">

                <small>
                    VEHÍCULOS CONVENCIONALES
                </small>

                <strong>
                    {{ $vehiculosConvencionales }}
                </strong>

                <span>
                    Neiva: {{ $convencionalesNeiva }}
                    &nbsp; | &nbsp;
                    Ibagué: {{ $convencionalesIbague }}
                </span>

            </div>

        </div>

    </div>

</div>


    <!-- =====================================================
         INFORMACIÓN + ESTADO
    ====================================================== -->

    <div class="dashboard-grid">


        <!-- INFORMACIÓN GENERAL -->

        <div class="dashboard-card">

            <div class="dashboard-card-header">

                <div class="dashboard-card-title">

                    <div class="card-title-icon">

                        <i class="fas fa-chart-simple"></i>

                    </div>

                    Información general

                </div>

            </div>

            <div class="dashboard-card-body">

                <div class="info-list">


                    <div class="info-item">

                        <div class="info-left">

                            <div class="info-icon">

                                <i class="fas fa-users"></i>

                            </div>

                            <span class="info-name">
                                Conductores registrados
                            </span>

                        </div>

                        <span class="info-value">
                            {{ $totalConductores }}
                        </span>

                    </div>


                    <div class="info-item">

                        <div class="info-left">

                            <div class="info-icon">

                                <i class="fas fa-key"></i>

                            </div>

                            <span class="info-name">
                                Préstamos activos
                            </span>

                        </div>

                        <span class="info-value">
                            {{ $prestamosActivos }}
                        </span>

                    </div>


                    <div class="info-item">

                        <div class="info-left">

                            <div class="info-icon">

                                <i class="fas fa-screwdriver-wrench"></i>

                            </div>

                            <span class="info-name">
                                Mantenimientos pendientes
                            </span>

                        </div>

                        <span class="info-value">
                            {{ $mantenimientosPendientes }}
                        </span>

                    </div>


                </div>

            </div>

        </div>


        <!-- ESTADO -->

        <div class="dashboard-card">

            <div class="dashboard-card-header">

                <div class="dashboard-card-title">

                    <div class="card-title-icon">

                        <i class="fas fa-server"></i>

                    </div>

                    Estado del sistema

                </div>

            </div>

            <div class="dashboard-card-body">

                <div class="system-status">


                    <div class="status-item success">

                        <div class="status-icon">

                            <i class="fas fa-check-circle"></i>

                        </div>

                        <span class="status-text">

                            Sistema funcionando correctamente.

                        </span>

                    </div>


                    <div class="status-item primary">

                        <div class="status-icon">

                            <i class="fas fa-building"></i>

                        </div>

                        <span class="status-text">

                            Gestión de Vehículos UNP

                        </span>

                    </div>


                    <div class="status-item info">

                        <div class="status-icon">

                            <i class="fas fa-chart-line"></i>

                        </div>

                        <span class="status-text">

                            Dashboard inteligente activo

                        </span>

                    </div>


                </div>

            </div>

        </div>

    </div>


    <!-- =====================================================
         ALERTAS
    ====================================================== -->

    <div class="dashboard-card alerts-card">

        <div class="dashboard-card-header">

            <div class="dashboard-card-title">

                <div class="card-title-icon"
                     style="background:#fff7ed;color:#f59e0b;">

                    <i class="fas fa-bell"></i>

                </div>

                Alertas del sistema

            </div>

        </div>


        <div class="dashboard-card-body">

            <div class="alerts-list">


                @if(
                    $alertasSoat->count() == 0 &&
                    $alertasTecno->count() == 0 &&
                    $alertasLicencias->count() == 0 &&
                    $alertasMantenimientos->count() == 0 &&
                    $alertasExtintores->count() == 0
                )

                    <div class="no-alerts">

                        <i class="fas fa-circle-check"></i>

                        No existen alertas pendientes.

                    </div>

                @endif


                <!-- SOAT -->

                @foreach($alertasSoat as $documento)

                    <div class="system-alert alert-warning">

                        <i class="fas fa-triangle-exclamation"></i>

                        <span>

                            El SOAT del vehículo

                            <strong>
                                {{ $documento->vehiculo->placa }}
                            </strong>

                            vence el

                            <strong>
                                {{ \Carbon\Carbon::parse($documento->fecha_vencimiento)->format('d/m/Y') }}
                            </strong>

                        </span>

                    </div>

                @endforeach


                <!-- TECNOMECÁNICA -->

                @foreach($alertasTecno as $documento)

                    <div class="system-alert alert-danger-custom">

                        <i class="fas fa-screwdriver-wrench"></i>

                        <span>

                            La Tecnomecánica del vehículo

                            <strong>
                                {{ $documento->vehiculo->placa }}
                            </strong>

                            vence el

                            <strong>
                                {{ \Carbon\Carbon::parse($documento->fecha_vencimiento)->format('d/m/Y') }}
                            </strong>

                        </span>

                    </div>

                @endforeach


                <!-- LICENCIAS -->

                @foreach($alertasLicencias as $conductor)

                    <div class="system-alert alert-info-custom">

                        <i class="fas fa-id-card"></i>

                        <span>

                            La licencia de

                            <strong>

                                {{ $conductor->nombre }}
                                {{ $conductor->apellido }}

                            </strong>

                            vence el

                            <strong>
                                {{ $conductor->vence_licencia }}
                            </strong>

                        </span>

                    </div>

                @endforeach


                <!-- MANTENIMIENTOS -->

                @foreach($alertasMantenimientos as $mantenimiento)

                    <div class="system-alert alert-secondary-custom">

                        <i class="fas fa-calendar-check"></i>

                        <span>

                            El vehículo

                            <strong>
                                {{ $mantenimiento->vehiculo->placa }}
                            </strong>

                            tiene mantenimiento programado para

                            <strong>
                                {{ $mantenimiento->proximo_mantenimiento }}
                            </strong>

                        </span>

                    </div>

                @endforeach

                <!-- EXTINTORES -->

@foreach($alertasExtintores as $vehiculo)

    @php

        $fechaExtintor = \Carbon\Carbon::parse(
            $vehiculo->fecha_vencimiento_extintor
        );

        $diasExtintor = now()->startOfDay()->diffInDays(
            $fechaExtintor->startOfDay(),
            false
        );

    @endphp


    <div class="system-alert
        {{ $diasExtintor < 0
            ? 'alert-danger-custom'
            : 'alert-warning' }}">

        <i class="fas fa-fire-extinguisher"></i>

        <span>

            El extintor del vehículo

            <strong>
                {{ $vehiculo->placa }}
            </strong>

            @if($diasExtintor < 0)

                está vencido desde el

                <strong>
                    {{ $fechaExtintor->format('d/m/Y') }}
                </strong>

            @else

                vence el

                <strong>
                    {{ $fechaExtintor->format('d/m/Y') }}
                </strong>

            @endif

        </span>

    </div>

@endforeach


            </div>

        </div>



    </div>


    <!-- =====================================================
         GRÁFICA + ACCIONES
    ====================================================== -->

    <div class="bottom-grid">


        <!-- GRÁFICA -->

        <div class="dashboard-card">

            <div class="dashboard-card-header">

                <div class="dashboard-card-title">

                    <div class="card-title-icon">

                        <i class="fas fa-chart-pie"></i>

                    </div>

                    Estado de vehículos

                </div>

            </div>

            <div class="dashboard-card-body">

                <div class="chart-container">

                    <canvas id="graficaVehiculos"></canvas>

                </div>

            </div>

        </div>


        <!-- ACCIONES RÁPIDAS -->

        <div class="dashboard-card">

            <div class="dashboard-card-header">

                <div class="dashboard-card-title">

                    <div class="card-title-icon">

                        <i class="fas fa-bolt"></i>

                    </div>

                    Acciones rápidas

                </div>

            </div>

            <div class="dashboard-card-body">

                <div class="quick-actions">


                    <a href="{{ route('vehiculos.index') }}"
                       class="quick-action">

                        <i class="fas fa-car"></i>

                        <strong>
                            Gestionar vehículos
                        </strong>

                        <span>
                            Consultar y administrar vehículos
                        </span>

                    </a>


                    <a href="{{ route('conductores.index') }}"
                       class="quick-action">

                        <i class="fas fa-users"></i>

                        <strong>
                            Conductores
                        </strong>

                        <span>
                            Consultar conductores registrados
                        </span>

                    </a>


                    <a href="{{ route('prestamos.index') }}"
                       class="quick-action">

                        <i class="fas fa-key"></i>

                        <strong>
                            Préstamos
                        </strong>

                        <span>
                            Administrar préstamos activos
                        </span>

                    </a>


                    <a href="{{ route('mantenimientos.index') }}"
                       class="quick-action">

                        <i class="fas fa-screwdriver-wrench"></i>

                        <strong>
                            Mantenimientos
                        </strong>

                        <span>
                            Revisar mantenimientos
                        </span>

                    </a>


                </div>

            </div>

        </div>

    </div>


</div>


@endsection


@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {


    const ctx =
        document.getElementById('graficaVehiculos');


    if (!ctx) {
        return;
    }


    new Chart(ctx, {

        type: 'doughnut',

        data: {

            labels: [

                'Disponibles',

                'Prestados',

                'Mantenimiento'

            ],

            datasets: [{

                data: [

                    {{ $graficaVehiculos['Disponibles'] }},

                    {{ $graficaVehiculos['Prestados'] }},

                    {{ $graficaVehiculos['Mantenimiento'] }}

                ],

                backgroundColor: [

                    '#16a34a',

                    '#ef4444',

                    '#f59e0b'

                ],

                borderColor: '#ffffff',

                borderWidth: 4,

                hoverOffset: 8

            }]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            cutout: '68%',

            plugins: {

                legend: {

                    position: 'bottom',

                    labels: {

                        usePointStyle: true,

                        pointStyle: 'circle',

                        padding: 20,

                        font: {

                            family: 'Inter',

                            size: 12

                        }

                    }

                },

                tooltip: {

                    padding: 12,

                    cornerRadius: 10

                }

            }

        }

    });

});

</script>

@endsection
       