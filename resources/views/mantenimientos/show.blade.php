@extends('layouts.admin')

@section('titulo', 'Detalle del Mantenimiento')

@section('contenido')

<style>

    .maintenance-detail-container {
        padding: 5px 5px 30px;
    }

    .maintenance-detail-card {
        background: #ffffff;
        border: none;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(15, 23, 42, 0.07);
        overflow: hidden;
    }

    /* HEADER */

    .detail-header {
        padding: 24px 28px;
        border-bottom: 1px solid #edf1f7;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }

    .detail-header-left {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .detail-header-icon {
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

    .detail-header h3 {
        margin: 0;
        color: #172033;
        font-size: 21px;
        font-weight: 700;
    }

    .detail-header p {
        margin: 4px 0 0;
        color: #98a2b3;
        font-size: 13px;
    }

    /* ESTADO */

    .detail-status {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 8px 13px;
        border-radius: 20px;
        background: #fff7e6;
        color: #b76e00;
        font-size: 13px;
        font-weight: 700;
    }

    .detail-status i {
        font-size: 8px;
    }

    /* BODY */

    .detail-body {
        padding: 28px;
    }

    /* SECCIONES */

    .detail-section {
        margin-bottom: 28px;
    }

    .detail-section:last-child {
        margin-bottom: 0;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 9px;
        margin-bottom: 16px;
        color: #344054;
        font-size: 15px;
        font-weight: 700;
    }

    .section-title i {
        color: #2563eb;
        font-size: 14px;
    }

    /* CAMPOS */

    .detail-field {
        height: 100%;
        background: #f8fafc;
        border: 1px solid #edf1f7;
        border-radius: 12px;
        padding: 14px 16px;
        transition: all .18s ease;
    }

    .detail-field:hover {
        border-color: #dbe5f3;
        background: #f8fbff;
    }

    .detail-label {
        display: block;
        margin-bottom: 6px;
        color: #98a2b3;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .4px;
    }

    .detail-value {
        color: #172033;
        font-size: 14px;
        font-weight: 600;
        word-break: break-word;
    }

    /* VEHÍCULO */

    .vehicle-detail {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .vehicle-detail-icon {
        width: 38px;
        height: 38px;
        border-radius: 9px;
        background: #eaf2ff;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .vehicle-detail-plate {
        font-size: 14px;
        font-weight: 700;
        color: #1d4ed8;
    }

    .vehicle-detail-name {
        color: #667085;
        font-size: 12px;
        margin-top: 2px;
    }

    /* COSTO */

    .cost-value {
        color: #15803d;
        font-size: 17px;
        font-weight: 800;
    }

    /* KILOMETRAJE */

    .km-value {
        color: #2563eb;
        font-size: 16px;
        font-weight: 800;
    }

    /* DESCRIPCIÓN */

    .description-box {
        background: #f8fafc;
        border: 1px solid #edf1f7;
        border-radius: 12px;
        padding: 17px;
        color: #475467;
        font-size: 14px;
        line-height: 1.6;
        min-height: 85px;
        white-space: pre-line;
    }

    /* ESTADO FINAL */

    .status-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 17px 18px;
        border-radius: 12px;
        background: #fffaf0;
        border: 1px solid #fce8bb;
    }

    .status-card-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .status-card-icon {
        width: 38px;
        height: 38px;
        border-radius: 9px;
        background: #fff0c7;
        color: #b76e00;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .status-card-title {
        color: #344054;
        font-size: 13px;
        font-weight: 700;
    }

    .status-card-description {
        color: #98a2b3;
        font-size: 12px;
        margin-top: 2px;
    }

    .status-card-badge {
        padding: 7px 13px;
        border-radius: 20px;
        background: #fff0c7;
        color: #b76e00;
        font-size: 12px;
        font-weight: 700;
    }

    /* FOOTER */

    .detail-footer {
        padding: 18px 28px;
        background: #fafbfc;
        border-top: 1px solid #edf1f7;
        display: flex;
        justify-content: flex-end;
    }

    .btn-back {
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

    .btn-back:hover {
        background: #e2e8f0;
        color: #1e293b;
    }

    /* RESPONSIVE */

    @media (max-width: 768px) {

        .detail-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .detail-body {
            padding: 20px;
        }

        .detail-footer {
            padding: 15px 20px;
        }

    }

</style>


<div class="maintenance-detail-container">

    <div class="maintenance-detail-card">


        {{-- ENCABEZADO --}}

        <div class="detail-header">

            <div class="detail-header-left">

                <div class="detail-header-icon">
                    <i class="fa fa-tools"></i>
                </div>

                <div>

                    <h3>Detalle del Mantenimiento</h3>

                    <p>
                        Información completa del mantenimiento registrado
                    </p>

                </div>

            </div>


            {{-- ESTADO --}}

            <div class="detail-status">

                <i class="fa fa-circle"></i>

                {{ $mantenimiento->estado }}

            </div>

        </div>



        {{-- CONTENIDO --}}

        <div class="detail-body">


            {{-- INFORMACIÓN DEL VEHÍCULO --}}

            <div class="detail-section">

                <div class="section-title">

                    <i class="fa fa-car"></i>

                    Información del vehículo

                </div>


                <div class="row g-3">

                    <div class="col-md-6">

                        <div class="detail-field">

                            <span class="detail-label">
                                Vehículo
                            </span>

                            <div class="vehicle-detail">

                                <div class="vehicle-detail-icon">

                                    <i class="fa fa-car"></i>

                                </div>

                                <div>

                                    <div class="vehicle-detail-plate">

                                        {{ $mantenimiento->vehiculo->placa }}

                                    </div>

                                    <div class="vehicle-detail-name">

                                        {{ $mantenimiento->vehiculo->marca }}

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="col-md-6">

                        <div class="detail-field">

                            <span class="detail-label">
                                Tipo de mantenimiento
                            </span>

                            <div class="detail-value">

                                {{ $mantenimiento->tipo }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            {{-- INFORMACIÓN DEL MANTENIMIENTO --}}

            <div class="detail-section">

                <div class="section-title">

                    <i class="fa fa-wrench"></i>

                    Información del mantenimiento

                </div>


                <div class="row g-3">


                    {{-- FECHA --}}

                    <div class="col-md-4">

                        <div class="detail-field">

                            <span class="detail-label">
                                Fecha
                            </span>

                            <div class="detail-value">

                                <i class="fa fa-calendar"
                                   style="color:#2563eb; margin-right:6px;"></i>

                                {{ $mantenimiento->fecha }}

                            </div>

                        </div>

                    </div>


                    {{-- TALLER --}}

                    <div class="col-md-4">

                        <div class="detail-field">

                            <span class="detail-label">
                                Taller
                            </span>

                            <div class="detail-value">

                                <i class="fa fa-building"
                                   style="color:#2563eb; margin-right:6px;"></i>

                                {{ $mantenimiento->taller }}

                            </div>

                        </div>

                    </div>


                    {{-- KILOMETRAJE --}}

                    <div class="col-md-4">

                        <div class="detail-field">

                            <span class="detail-label">
                                Kilometraje
                            </span>

                            <div class="km-value">

                                {{ number_format($mantenimiento->kilometraje) }}

                                <span style="font-size:12px;">
                                    Km
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- COSTO --}}

                    <div class="col-md-4">

                        <div class="detail-field">

                            <span class="detail-label">
                                Costo
                            </span>

                            <div class="cost-value">

                                $ {{ number_format($mantenimiento->costo,0,',','.') }}

                            </div>

                        </div>

                    </div>


                    {{-- TÉCNICO --}}

                    <div class="col-md-4">

                        <div class="detail-field">

                            <span class="detail-label">
                                Técnico
                            </span>

                            <div class="detail-value">

                                <i class="fa fa-user-cog"
                                   style="color:#2563eb; margin-right:6px;"></i>

                                {{ $mantenimiento->tecnico }}

                            </div>

                        </div>

                    </div>


                    {{-- FACTURA --}}

                    <div class="col-md-4">

                        <div class="detail-field">

                            <span class="detail-label">
                                Factura
                            </span>

                            <div class="detail-value">

                                <i class="fa fa-file-invoice"
                                   style="color:#2563eb; margin-right:6px;"></i>

                                {{ $mantenimiento->factura }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            {{-- DESCRIPCIÓN --}}

            <div class="detail-section">

                <div class="section-title">

                    <i class="fa fa-align-left"></i>

                    Descripción

                </div>


                <div class="description-box">

                    {{ $mantenimiento->descripcion }}

                </div>

            </div>



            {{-- PRÓXIMO MANTENIMIENTO --}}

            <div class="detail-section">

                <div class="section-title">

                    <i class="fa fa-calendar-check"></i>

                    Próximo mantenimiento

                </div>


                <div class="row g-3">

                    <div class="col-md-4">

                        <div class="detail-field">

                            <span class="detail-label">
                                Fecha programada
                            </span>

                            <div class="detail-value">

                                <i class="fa fa-calendar-alt"
                                   style="color:#2563eb; margin-right:6px;"></i>

                                {{ $mantenimiento->proximo_mantenimiento }}

                            </div>

                        </div>

                    </div>


                    <div class="col-md-8">

                        <div class="status-card">

                            <div class="status-card-left">

                                <div class="status-card-icon">

                                    <i class="fa fa-clock"></i>

                                </div>

                                <div>

                                    <div class="status-card-title">
                                        Estado actual
                                    </div>

                                    <div class="status-card-description">
                                        Estado registrado para este mantenimiento
                                    </div>

                                </div>

                            </div>


                            <div class="status-card-badge">

                                {{ $mantenimiento->estado }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>


        {{-- FOOTER --}}

        <div class="detail-footer">

            <a href="{{ route('mantenimientos.index') }}"
               class="btn-back">

                <i class="fa fa-arrow-left"></i>

                Volver a mantenimientos

            </a>

        </div>


    </div>

</div>

@endsection