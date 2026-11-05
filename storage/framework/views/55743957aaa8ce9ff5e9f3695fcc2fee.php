

<?php $__env->startSection('titulo', 'Vehículos'); ?>

<?php $__env->startSection('contenido'); ?>

<style>

    /* =====================================================
       VEHÍCULOS
    ===================================================== */

    .vehiculos-page {
        width: 100%;
        animation: entradaVehiculos .4s ease;
    }

    @keyframes entradaVehiculos {
        from {
            opacity: 0;
            transform: translateY(8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }


    /* =====================================================
       ENCABEZADO
    ===================================================== */

    .vehiculos-header {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        margin-bottom: 22px;

    }

    .vehiculos-title {

        display: flex;

        align-items: center;

        gap: 14px;

    }

    .vehiculos-title-icon {

        width: 52px;

        height: 52px;

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
            0 8px 20px rgba(37,99,235,.22);

    }

    .vehiculos-title h1 {

        margin: 0;

        color: #172033;

        font-size: 25px;

        font-weight: 800;

    }

    .vehiculos-title p {

        margin: 4px 0 0;

        color: #64748b;

        font-size: 12px;

    }


    /* =====================================================
       BOTÓN NUEVO
    ===================================================== */

    .btn-nuevo-vehiculo {

        display: inline-flex;

        align-items: center;

        gap: 9px;

        padding: 12px 18px;

        border: none;

        border-radius: 12px;

        background:
            linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );

        color: white;

        font-size: 13px;

        font-weight: 700;

        box-shadow:
            0 8px 18px rgba(37,99,235,.22);

        transition: .25s;

    }

    .btn-nuevo-vehiculo:hover {

        color: white;

        transform: translateY(-2px);

        box-shadow:
            0 12px 24px rgba(37,99,235,.30);

    }


    /* =====================================================
       TARJETA PRINCIPAL
    ===================================================== */

    .vehiculos-card {

        background: white;

        border: 1px solid #e5eaf2;

        border-radius: 20px;

        box-shadow:
            0 10px 30px rgba(15,23,42,.06);

        overflow: hidden;

    }


    /* =====================================================
       BARRA DE HERRAMIENTAS
    ===================================================== */

    .vehiculos-toolbar {

        padding: 18px 20px;

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        border-bottom: 1px solid #edf0f5;

        background: #ffffff;

    }

    .vehiculos-count {

        display: flex;

        align-items: center;

        gap: 8px;

        color: #475569;

        font-size: 13px;

        font-weight: 600;

    }

    .vehiculos-count-badge {

        min-width: 30px;

        height: 28px;

        display: flex;

        align-items: center;

        justify-content: center;

        padding: 0 8px;

        border-radius: 9px;

        background: #eff6ff;

        color: #2563eb;

        font-weight: 800;

    }


    /* =====================================================
       BUSCADOR
    ===================================================== */

    .vehiculos-tools {

        display: flex;

        align-items: center;

        gap: 10px;

    }

    .search-box {

        position: relative;

        width: 260px;

    }

    .search-box i {

        position: absolute;

        left: 13px;

        top: 50%;

        transform: translateY(-50%);

        color: #94a3b8;

        font-size: 13px;

    }

    .search-box input {

        width: 100%;

        height: 40px;

        padding:
            0 13px 0 38px;

        border:
            1px solid #e2e8f0;

        border-radius: 11px;

        outline: none;

        color: #334155;

        background: #f8fafc;

        font-size: 12px;

        transition: .2s;

    }

    .search-box input:focus {

        border-color: #60a5fa;

        background: white;

        box-shadow:
            0 0 0 3px rgba(59,130,246,.10);

    }

    .btn-limpiar-busqueda {
        height: 40px;
        padding: 0 13px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        border: 1px solid #e2e8f0;
        border-radius: 11px;
        background: #f8fafc;
        color: #64748b;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s;
    }

    .btn-limpiar-busqueda:hover {
        background: #eff6ff;
        border-color: #bfdbfe;
        color: #2563eb;
    }


    .estado-filter {

        height: 40px;

        padding:
            0 12px;

        border:
            1px solid #e2e8f0;

        border-radius: 11px;

        outline: none;

        color: #475569;

        background: #f8fafc;

        font-size: 12px;

        cursor: pointer;

    }


    /* =====================================================
       TABLA
    ===================================================== */

    .table-wrapper {

        width: 100%;

        overflow-x: auto;

    }

    .vehiculos-table {

        width: 100%;

        border-collapse: collapse;

        margin: 0;

    }

    .vehiculos-table thead th {

        padding:
            15px 18px;

        background: #f8fafc;

        color: #64748b;

        border-bottom:
            1px solid #e5eaf2;

        font-size: 10px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .7px;

        white-space: nowrap;

    }

    .vehiculos-table tbody td {

        padding:
            15px 18px;

        color: #334155;

        border-bottom:
            1px solid #f0f2f6;

        font-size: 13px;

        vertical-align: middle;

    }

    .vehiculos-table tbody tr {

        transition: .2s;

    }

    .vehiculos-table tbody tr:hover {

        background: #f8fbff;

    }

    .vehiculos-table tbody tr:last-child td {

        border-bottom: none;

    }


    /* =====================================================
       ID
    ===================================================== */

    .vehicle-id {

        color: #94a3b8;

        font-size: 12px;

        font-weight: 700;

    }


    /* =====================================================
       VEHÍCULO
    ===================================================== */

    .vehicle-info {

        display: flex;

        align-items: center;

        gap: 11px;

    }

    .vehicle-icon {

        width: 40px;

        height: 40px;

        flex-shrink: 0;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 12px;

        background: #eff6ff;

        color: #2563eb;

        font-size: 17px;

    }

    .vehicle-name strong {

        display: block;

        color: #172033;

        font-size: 13px;

        font-weight: 700;

    }

    .vehicle-name span {

        display: block;

        margin-top: 3px;

        color: #94a3b8;

        font-size: 10px;

    }


    /* =====================================================
       PLACA
    ===================================================== */

    .placa-badge {

        display: inline-flex;

        align-items: center;

        padding:
            7px 11px;

        border-radius: 8px;

        background: #f1f5f9;

        border:
            1px solid #cbd5e1;

        color: #172033;

        font-size: 12px;

        font-weight: 800;

        letter-spacing: .8px;

    }


    /* =====================================================
       DATOS
    ===================================================== */

    .dato-principal {

        color: #334155;

        font-weight: 600;

    }

    .dato-secundario {

        display: block;

        margin-top: 3px;

        color: #94a3b8;

        font-size: 10px;

    }


    /* =====================================================
       ESTADOS
    ===================================================== */

    .estado {

        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding:
            7px 11px;

        border-radius: 20px;

        font-size: 11px;

        font-weight: 700;

        white-space: nowrap;

    }

    .estado::before {

        content: '';

        width: 7px;

        height: 7px;

        border-radius: 50%;

    }

    .estado-disponible {

        color: #166534;

        background: #f0fdf4;

        border:
            1px solid #bbf7d0;

    }

    .estado-disponible::before {

        background: #22c55e;

    }

    .estado-prestado {

        color: #991b1b;

        background: #fef2f2;

        border:
            1px solid #fecaca;

    }

    .estado-prestado::before {

        background: #ef4444;

    }

    .estado-mantenimiento {

        color: #92400e;

        background: #fffbeb;

        border:
            1px solid #fde68a;

    }

    .estado-mantenimiento::before {

        background: #f59e0b;

    }

    .estado-default {

        color: #475569;

        background: #f8fafc;

        border:
            1px solid #cbd5e1;

    }

    .estado-default::before {

        background: #64748b;

    }


    /* =====================================================
       ACCIONES
    ===================================================== */

    .acciones {

        display: flex;

        align-items: center;

        gap: 7px;

    }

    .btn-accion {

        width: 35px;

        height: 35px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        border-radius: 9px;

        border: 1px solid;

        transition: .2s;

    }

    .btn-ver {

        color: #2563eb;

        background: #eff6ff;

        border-color: #bfdbfe;

    }

    .btn-ver:hover {

        color: white;

        background: #2563eb;

        border-color: #2563eb;

        transform: translateY(-2px);

    }

    .btn-editar {

        color: #d97706;

        background: #fffbeb;

        border-color: #fde68a;

    }

    .btn-editar:hover {

        color: white;

        background: #f59e0b;

        border-color: #f59e0b;

        transform: translateY(-2px);

    }

    .btn-eliminar {

        color: #dc2626;

        background: #fef2f2;

        border-color: #fecaca;

    }

    .btn-eliminar:hover {

        color: white;

        background: #dc2626;

        border-color: #dc2626;

        transform: translateY(-2px);

    }


    /* =====================================================
       SIN VEHÍCULOS
    ===================================================== */

    .empty-state {

        padding: 70px 20px;

        text-align: center;

    }

    .empty-icon {

        width: 75px;

        height: 75px;

        margin: 0 auto 18px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 22px;

        background: #eff6ff;

        color: #2563eb;

        font-size: 30px;

    }

    .empty-state h3 {

        margin: 0;

        color: #334155;

        font-size: 17px;

        font-weight: 700;

    }

    .empty-state p {

        margin: 7px 0 20px;

        color: #94a3b8;

        font-size: 12px;

    }


    /* =====================================================
       VISTA MÓVIL
    ===================================================== */

    .mobile-vehicles {

        display: none;

    }

    .mobile-vehicle-card {

        padding: 17px;

        border-bottom:
            1px solid #edf0f5;

    }

    .mobile-vehicle-top {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 10px;

        margin-bottom: 15px;

    }

    .mobile-vehicle-info {

        display: flex;

        align-items: center;

        gap: 10px;

    }

    .mobile-vehicle-icon {

        width: 42px;

        height: 42px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 12px;

        background: #eff6ff;

        color: #2563eb;

    }

    .mobile-vehicle-info strong {

        display: block;

        color: #172033;

        font-size: 13px;

    }

    .mobile-vehicle-info span {

        display: block;

        margin-top: 3px;

        color: #94a3b8;

        font-size: 10px;

    }

    .mobile-details {

        display: grid;

        grid-template-columns:
            1fr 1fr;

        gap: 9px;

        margin-bottom: 14px;

    }

    .mobile-detail {

        padding: 10px;

        border-radius: 10px;

        background: #f8fafc;

    }

    .mobile-detail small {

        display: block;

        color: #94a3b8;

        font-size: 9px;

        margin-bottom: 3px;

    }

    .mobile-detail strong {

        color: #334155;

        font-size: 11px;

    }

    .mobile-actions {

        display: flex;

        gap: 8px;

    }

    .mobile-actions .btn-accion {

        flex: 1;

        width: auto;

    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media(max-width: 900px) {

        .vehiculos-toolbar {

            align-items: flex-start;

            flex-direction: column;

        }

        .vehiculos-tools {

            width: 100%;

        }

        .search-box {

            flex: 1;

            width: auto;

        }

    }


    @media(max-width: 700px) {

        .vehiculos-header {

            align-items: flex-start;

            flex-direction: column;

        }

        .btn-nuevo-vehiculo {

            width: 100%;

            justify-content: center;

        }

        .vehiculos-title h1 {

            font-size: 22px;

        }

        .table-wrapper {

            display: none;

        }

        .mobile-vehicles {

            display: block;

        }

        .vehiculos-tools {

            flex-direction: column;

            width: 100%;

        }

        .search-box,
        .estado-filter {

            width: 100%;

        }

    }


</style>


<div class="vehiculos-page">


    <!-- =====================================================
         ENCABEZADO
    ====================================================== -->

    <div class="vehiculos-header">

        <div class="vehiculos-title">

            <div class="vehiculos-title-icon">

                <i class="fas fa-car-side"></i>

            </div>

            <div>

                <h1>Vehículos</h1>

                <p>
                    Administra y consulta los vehículos registrados.
                </p>

            </div>

        </div>


        <a href="<?php echo e(route('vehiculos.create')); ?>"
           class="btn-nuevo-vehiculo">

            <i class="fas fa-plus"></i>

            Nuevo vehículo

        </a>

    </div>


    <!-- =====================================================
         TARJETA
    ====================================================== -->

    <div class="vehiculos-card">


        <!-- BARRA SUPERIOR -->

        <div class="vehiculos-toolbar">


            <div class="vehiculos-count">

                <span>
                    Vehículos registrados
                </span>

                <span class="vehiculos-count-badge">

                    <?php echo e($vehiculos->count()); ?>


                </span>

            </div>


            <div class="vehiculos-tools">


                <div class="search-box">

                    <i class="fas fa-search"></i>

                    <input
                        type="text"
                        id="buscarVehiculo"
                        placeholder="Buscar por placa..."
                    >

                </div>


                <select
                    id="filtrarEstado"
                    class="estado-filter"
                >

                    <option value="">
                        Todos los estados
                    </option>

                    <option value="Disponible">
                        Disponible
                    </option>

                    <option value="Prestado">
                        Prestado
                    </option>

                    <option value="Mantenimiento">
                        Mantenimiento
                    </option>

                </select>

                <button
                    type="button"
                    id="limpiarBusqueda"
                    class="btn-limpiar-busqueda"
                    title="Limpiar búsqueda"
                >
                    <i class="fas fa-rotate-left"></i>
                    Limpiar
                </button>


            </div>

        </div>


        <!-- =================================================
             TABLA DESKTOP
        ================================================== -->

        <div class="table-wrapper">

            <table class="vehiculos-table">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Vehículo</th>

                        <th>Placa</th>

                        <th>Modelo</th>

                        <th>Estado</th>

                        <th>Acciones</th>

                    </tr>

                </thead>


                <tbody id="tablaVehiculos">


                    <?php $__empty_1 = true; $__currentLoopData = $vehiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr
    data-placa="<?php echo e(strtolower(trim($vehiculo->placa))); ?>"
    data-estado="<?php echo e($vehiculo->estado); ?>"
>


                            <!-- ID -->

                            <td>

                                <span class="vehicle-id">

                                    #<?php echo e($vehiculo->id); ?>


                                </span>

                            </td>


                            <!-- VEHÍCULO -->

                            <td>

                                <div class="vehicle-info">

                                    <div class="vehicle-icon">

                                        <i class="fas fa-car"></i>

                                    </div>


                                    <div class="vehicle-name">

                                        <strong>

                                            <?php echo e($vehiculo->marca); ?>


                                        </strong>

                                        <span>

                                            <?php echo e($vehiculo->linea); ?>


                                        </span>

                                    </div>

                                </div>

                            </td>


                            <!-- PLACA -->

                            <td>

                                <span class="placa-badge">

                                    <?php echo e(strtoupper($vehiculo->placa)); ?>


                                </span>

                            </td>


                            <!-- MODELO -->

                            <td>

                                <span class="dato-principal">

                                    <?php echo e($vehiculo->modelo); ?>


                                </span>

                                <?php if(!empty($vehiculo->color)): ?>

                                    <span class="dato-secundario">

                                        <?php echo e($vehiculo->color); ?>


                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- ESTADO -->

                            <td>

                                <?php if($vehiculo->estado == 'Disponible'): ?>

                                    <span class="estado estado-disponible">

                                        Disponible

                                    </span>

                                <?php elseif($vehiculo->estado == 'Prestado'): ?>

                                    <span class="estado estado-prestado">

                                        Prestado

                                    </span>

                                <?php elseif($vehiculo->estado == 'Mantenimiento'): ?>

                                    <span class="estado estado-mantenimiento">

                                        Mantenimiento

                                    </span>

                                <?php else: ?>

                                    <span class="estado estado-default">

                                        <?php echo e($vehiculo->estado); ?>


                                    </span>

                                <?php endif; ?>

                            </td>


                            <!-- ACCIONES -->

                            <td>

                                <div class="acciones">


                                    <!-- VER -->

                                    <a href="<?php echo e(route('vehiculos.show', $vehiculo)); ?>"
                                       class="btn-accion btn-ver"
                                       title="Ver vehículo">

                                        <i class="fas fa-eye"></i>

                                    </a>


                                    <!-- EDITAR -->

                                    <a href="<?php echo e(route('vehiculos.edit', $vehiculo)); ?>"
                                       class="btn-accion btn-editar"
                                       title="Editar vehículo">

                                        <i class="fas fa-pen"></i>

                                    </a>


                                    <!-- ELIMINAR -->

                                    <form
                                        action="<?php echo e(route('vehiculos.destroy', $vehiculo)); ?>"
                                        method="POST"
                                        style="display:inline"
                                    >

                                        <?php echo csrf_field(); ?>

                                        <?php echo method_field('DELETE'); ?>


                                        <button
                                            type="button"
                                            class="btn-accion btn-eliminar"
                                            title="Eliminar vehículo"
                                            onclick="confirmarEliminar(this.form)"
                                        >

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>


                                </div>

                            </td>


                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="6">

                                <div class="empty-state">

                                    <div class="empty-icon">

                                        <i class="fas fa-car"></i>

                                    </div>

                                    <h3>
                                        No hay vehículos registrados
                                    </h3>

                                    <p>
                                        Comienza registrando el primer vehículo del sistema.
                                    </p>

                                    <a
                                        href="<?php echo e(route('vehiculos.create')); ?>"
                                        class="btn-nuevo-vehiculo"
                                    >

                                        <i class="fas fa-plus"></i>

                                        Registrar vehículo

                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endif; ?>


                </tbody>

            </table>

        </div>


        <!-- =================================================
             VISTA MÓVIL
        ================================================== -->

        <div class="mobile-vehicles"
             id="mobileVehiculos">


            <?php $__empty_1 = true; $__currentLoopData = $vehiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div
                    class="mobile-vehicle-card"
                    data-placa="<?php echo e(strtolower($vehiculo->placa)); ?>"
                    data-estado="<?php echo e($vehiculo->estado); ?>"
                >


                    <div class="mobile-vehicle-top">


                        <div class="mobile-vehicle-info">

                            <div class="mobile-vehicle-icon">

                                <i class="fas fa-car"></i>

                            </div>


                            <div>

                                <strong>

                                    <?php echo e($vehiculo->marca); ?>

                                    <?php echo e($vehiculo->linea); ?>


                                </strong>

                                <span>

                                    ID #<?php echo e($vehiculo->id); ?>


                                </span>

                            </div>

                        </div>


                        <span class="placa-badge">

                            <?php echo e(strtoupper($vehiculo->placa)); ?>


                        </span>


                    </div>


                    <div class="mobile-details">


                        <div class="mobile-detail">

                            <small>
                                Modelo
                            </small>

                            <strong>
                                <?php echo e($vehiculo->modelo); ?>

                            </strong>

                        </div>


                        <div class="mobile-detail">

                            <small>
                                Color
                            </small>

                            <strong>
                                <?php echo e($vehiculo->color ?: 'No registrado'); ?>

                            </strong>

                        </div>


                        <div class="mobile-detail">

                            <small>
                                Estado
                            </small>

                            <strong>

                                <?php echo e($vehiculo->estado); ?>


                            </strong>

                        </div>


                    </div>


                    <div class="mobile-actions">


                        <a
                            href="<?php echo e(route('vehiculos.show', $vehiculo)); ?>"
                            class="btn-accion btn-ver"
                            title="Ver"
                        >

                            <i class="fas fa-eye"></i>

                        </a>


                        <a
                            href="<?php echo e(route('vehiculos.edit', $vehiculo)); ?>"
                            class="btn-accion btn-editar"
                            title="Editar"
                        >

                            <i class="fas fa-pen"></i>

                        </a>


                        <form
                            action="<?php echo e(route('vehiculos.destroy', $vehiculo)); ?>"
                            method="POST"
                            style="display:flex; flex:1;"
                        >

                            <?php echo csrf_field(); ?>

                            <?php echo method_field('DELETE'); ?>


                            <button
                                type="button"
                                class="btn-accion btn-eliminar"
                                title="Eliminar"
                                style="width:100%;"
                                onclick="confirmarEliminar(this.form)"
                            >

                                <i class="fas fa-trash"></i>

                            </button>

                        </form>


                    </div>


                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="empty-state">

                    <div class="empty-icon">

                        <i class="fas fa-car"></i>

                    </div>

                    <h3>
                        No hay vehículos registrados
                    </h3>

                    <p>
                        Comienza registrando el primer vehículo.
                    </p>

                </div>

            <?php endif; ?>


        </div>


    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {


    const buscador =
        document.getElementById('buscarVehiculo');

    const filtro =
        document.getElementById('filtrarEstado');

    const limpiar =
        document.getElementById('limpiarBusqueda');


    function filtrarVehiculos() {


        const texto =
            buscador.value
                .toLowerCase()
                .trim();


        const estado =
            filtro.value;


        const elementos =
            document.querySelectorAll(
                '#tablaVehiculos tr[data-placa], #mobileVehiculos .mobile-vehicle-card[data-placa]'
            );


        elementos.forEach(function (elemento) {


            const placa =
                elemento
                    .getAttribute('data-placa')
                    .toLowerCase();


            const estadoVehiculo =
                elemento
                    .getAttribute('data-estado');


            const coincideTexto =
                placa.includes(texto);


            const coincideEstado =
                estado === '' ||
                estadoVehiculo === estado;


            if(coincideTexto && coincideEstado){

                elemento.style.display = '';

            }else{

                elemento.style.display = 'none';

            }


        });

    }


    if(buscador){

        buscador.addEventListener(
            'input',
            filtrarVehiculos
        );

    }


    if(filtro){

        filtro.addEventListener(
            'change',
            filtrarVehiculos
        );

    }


    if(limpiar){

        limpiar.addEventListener('click', function(){

            buscador.value = '';
            filtro.value = '';

            filtrarVehiculos();
            buscador.focus();

        });

    }


});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\GestionVehiculos\resources\views/vehiculos/index.blade.php ENDPATH**/ ?>