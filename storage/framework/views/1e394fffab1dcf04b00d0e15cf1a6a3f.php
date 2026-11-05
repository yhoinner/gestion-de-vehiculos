

<?php $__env->startSection('titulo', 'Conductores'); ?>

<?php $__env->startSection('contenido'); ?>

<style>
    .conductores-page {
        padding: 2px 2px 35px;
    }

    .page-header-custom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    .page-title-custom {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .page-title-icon {
        width: 52px;
        height: 52px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: #fff;
        font-size: 21px;
        box-shadow: 0 8px 20px rgba(37, 99, 235, .20);
        flex-shrink: 0;
    }

    .page-title-custom h1 {
        margin: 0;
        color: #172033;
        font-size: 25px;
        font-weight: 800;
    }

    .page-title-custom p {
        margin: 4px 0 0;
        color: #64748b;
        font-size: 12px;
    }

    .btn-nuevo {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 42px;
        padding: 0 17px;
        border-radius: 11px;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: #fff !important;
        text-decoration: none;
        border: none;
        font-size: 12px;
        font-weight: 800;
        box-shadow: 0 8px 18px rgba(37, 99, 235, .18);
        transition: .2s ease;
    }

    .btn-nuevo:hover {
        transform: translateY(-1px);
        box-shadow: 0 11px 22px rgba(37, 99, 235, .24);
    }

    .conductores-resumen {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-bottom: 18px;
    }

    .resumen-item {
        position: relative;
        overflow: hidden;
        min-height: 102px;
        padding: 18px;
        border-radius: 16px;
        color: #fff;
        box-shadow: 0 8px 22px rgba(15, 23, 42, .08);
    }

    .resumen-item::after {
        content: '';
        position: absolute;
        width: 100px;
        height: 100px;
        right: -25px;
        bottom: -42px;
        border-radius: 50%;
        background: rgba(255,255,255,.10);
    }

    .resumen-item i {
        position: absolute;
        top: 17px;
        right: 18px;
        font-size: 24px;
        opacity: .82;
        z-index: 2;
    }

    .resumen-item h3 {
        position: relative;
        z-index: 2;
        margin: 0;
        font-size: 29px;
        font-weight: 800;
    }

    .resumen-item p {
        position: relative;
        z-index: 2;
        margin: 5px 0 0;
        font-size: 11px;
        font-weight: 700;
    }

    .resumen-total { background: linear-gradient(135deg,#2563eb,#1d4ed8); }
    .resumen-activos { background: linear-gradient(135deg,#16a34a,#15803d); }
    .resumen-inactivos { background: linear-gradient(135deg,#64748b,#475569); }
    .resumen-alerta { background: linear-gradient(135deg,#f59e0b,#d97706); }

    .alert-success-custom {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 12px 15px;
        margin-bottom: 16px;
        border: 1px solid #bbf7d0;
        border-radius: 12px;
        background: #f0fdf4;
        color: #166534;
        font-size: 12px;
        font-weight: 700;
    }

    .conductores-card {
        background: #fff;
        border: 1px solid #e5eaf2;
        border-radius: 18px;
        box-shadow: 0 10px 28px rgba(15,23,42,.06);
        overflow: hidden;
    }

    .card-toolbar {
        padding: 18px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        border-bottom: 1px solid #edf0f5;
        background: linear-gradient(180deg,#fff,#fbfdff);
    }

    .toolbar-title {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .toolbar-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eff6ff;
        color: #2563eb;
        font-size: 13px;
        flex-shrink: 0;
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

    .toolbar-filters {
        display: flex;
        align-items: center;
        gap: 9px;
        flex-wrap: wrap;
        justify-content: flex-end;
    }

    .search-box,
    .filter-box {
        position: relative;
    }

    .search-box { width: 310px; }
    .filter-box { width: 150px; }

    .search-box i,
    .filter-box i {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 11px;
        pointer-events: none;
        z-index: 2;
    }

    .search-box input,
    .filter-box select {
        width: 100%;
        height: 39px;
        box-sizing: border-box;
        border: 1px solid #dbe2ea;
        border-radius: 10px;
        background: #f8fafc;
        color: #334155;
        font-size: 11px;
        outline: none;
        transition: .2s ease;
    }

    .search-box input {
        padding: 0 13px 0 35px;
    }

    .filter-box select {
        padding: 0 10px 0 34px;
        cursor: pointer;
        appearance: auto;
    }

    .search-box input:focus,
    .filter-box select:focus {
        background: #fff;
        border-color: #60a5fa;
        box-shadow: 0 0 0 3px rgba(37,99,235,.10);
    }

    .table-responsive-custom {
        width: 100%;
        overflow-x: auto;
    }

    .conductores-table {
        width: 100%;
        min-width: 1180px;
        border-collapse: collapse;
    }

    .conductores-table thead th {
        padding: 13px 15px;
        color: #64748b;
        background: #f8fafc;
        border-bottom: 1px solid #e5eaf2;
        font-size: 9px;
        font-weight: 800;
        text-align: left;
        text-transform: uppercase;
        letter-spacing: .45px;
        white-space: nowrap;
    }

    .conductores-table tbody td {
        padding: 13px 15px;
        color: #475569;
        border-bottom: 1px solid #f0f2f6;
        font-size: 11px;
        vertical-align: middle;
        background: #fff;
    }

    .conductores-table tbody tr {
        transition: .18s ease;
    }

    .conductores-table tbody tr:hover td {
        background: #f8fbff;
    }

    .conductores-table tbody tr:last-child td {
        border-bottom: none;
    }

    .conductor-info {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 205px;
    }

    .conductor-avatar {
        width: 39px;
        height: 39px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        background: linear-gradient(135deg,#eff6ff,#dbeafe);
        color: #2563eb;
        font-size: 12px;
        font-weight: 800;
        border: 1px solid #dbeafe;
    }

    .conductor-info strong,
    .licencia-info strong,
    .dato-principal {
        display: block;
        color: #334155;
        font-size: 11px;
        font-weight: 800;
    }

    .conductor-info span,
    .licencia-info span,
    .dato-secundario {
        display: block;
        margin-top: 3px;
        color: #94a3b8;
        font-size: 9px;
        line-height: 1.3;
    }

    .cedula-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 9px;
        border-radius: 8px;
        background: #f8fafc;
        border: 1px solid #e5eaf2;
        color: #475569;
        font-size: 10px;
        font-weight: 700;
    }

    .info-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        max-width: 190px;
        padding: 6px 9px;
        border-radius: 8px;
        background: #f8fafc;
        border: 1px solid #e5eaf2;
        color: #475569;
        font-size: 10px;
        font-weight: 700;
    }

    .info-chip i {
        color: #2563eb;
        font-size: 10px;
    }

    .contract-badge,
    .sex-badge,
    .regional-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 9px;
        border-radius: 20px;
        font-size: 9px;
        font-weight: 800;
        white-space: nowrap;
    }

    .contract-badge {
        background: #eef2ff;
        color: #4338ca;
    }

    .sex-badge {
        background: #fdf2f8;
        color: #9d174d;
    }

    .regional-badge {
        background: #ecfeff;
        color: #0f766e;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 9px;
        font-weight: 800;
        white-space: nowrap;
    }

    .status-badge::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
    }

    .estado-activo { color: #166534; background: #f0fdf4; }
    .estado-activo::before { background: #22c55e; }
    .estado-inactivo { color: #475569; background: #f1f5f9; }
    .estado-inactivo::before { background: #94a3b8; }
    .estado-suspendido { color: #92400e; background: #fffbeb; }
    .estado-suspendido::before { background: #f59e0b; }

    .vence-normal {
        color: #475569;
        font-weight: 700;
        white-space: nowrap;
    }

    .vence-proximo,
    .vence-vencido {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 8px;
        border-radius: 8px;
        font-size: 9px;
        font-weight: 800;
        white-space: nowrap;
    }

    .vence-proximo { color: #92400e; background: #fffbeb; }
    .vence-vencido { color: #991b1b; background: #fef2f2; }

    .acciones-conductor {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .btn-action {
        width: 33px;
        height: 33px;
        border-radius: 9px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 10px;
        cursor: pointer;
        transition: .18s ease;
    }

    .btn-edit {
        color: #d97706;
        background: #fffbeb;
        border: 1px solid #fde68a;
    }

    .btn-edit:hover {
        color: #fff;
        background: #f59e0b;
        border-color: #f59e0b;
    }

    .btn-delete {
        color: #dc2626;
        background: #fef2f2;
        border: 1px solid #fecaca;
    }

    .btn-delete:hover {
        color: #fff;
        background: #dc2626;
        border-color: #dc2626;
    }

    .empty-state {
        padding: 52px 20px;
        text-align: center;
        color: #94a3b8;
    }

    .empty-state i {
        display: block;
        margin-bottom: 12px;
        color: #cbd5e1;
        font-size: 31px;
    }

    .empty-state strong {
        display: block;
        color: #64748b;
        font-size: 12px;
    }

    .empty-state span {
        display: block;
        margin-top: 4px;
        font-size: 10px;
    }

    .no-data {
        color: #94a3b8;
        font-size: 10px;
        font-style: italic;
    }

    @media(max-width: 1100px) {
        .conductores-resumen {
            grid-template-columns: repeat(2, 1fr);
        }

        .card-toolbar {
            align-items: flex-start;
            flex-direction: column;
        }

        .toolbar-filters {
            width: 100%;
            justify-content: stretch;
        }

        .search-box {
            flex: 1;
            width: auto;
        }
    }

    @media(max-width: 650px) {
        .page-header-custom {
            align-items: flex-start;
            flex-direction: column;
        }

        .btn-nuevo {
            width: 100%;
        }

        .conductores-resumen {
            grid-template-columns: 1fr;
        }

        .toolbar-filters {
            flex-direction: column;
        }

        .search-box,
        .filter-box {
            width: 100%;
        }
    }
</style>

<div class="conductores-page">

    <div class="page-header-custom">
        <div class="page-title-custom">
            <div class="page-title-icon">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <h1>Conductores</h1>
                <p>Administra la información personal, laboral y operativa de los conductores.</p>
            </div>
        </div>

        <a href="<?php echo e(route('conductores.create')); ?>" class="btn-nuevo">
            <i class="fas fa-user-plus"></i>
            Nuevo conductor
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert-success-custom">
            <i class="fas fa-check-circle"></i>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php
        $totalConductores = $conductores->count();
        $conductoresActivos = $conductores->where('estado', 'Activo')->count();
        $conductoresInactivos = $conductores->where('estado', 'Inactivo')->count();
        $licenciasAlerta = $conductores->filter(function($conductor) {
            if (!$conductor->vence_licencia) return false;
            $fecha = \Carbon\Carbon::parse($conductor->vence_licencia);
            return !$fecha->isPast() && $fecha->diffInDays(now()) <= 30;
        })->count();
    ?>

    <div class="conductores-resumen">
        <div class="resumen-item resumen-total">
            <i class="fas fa-users"></i>
            <h3><?php echo e($totalConductores); ?></h3>
            <p>Conductores registrados</p>
        </div>

        <div class="resumen-item resumen-activos">
            <i class="fas fa-user-check"></i>
            <h3><?php echo e($conductoresActivos); ?></h3>
            <p>Conductores activos</p>
        </div>

        <div class="resumen-item resumen-inactivos">
            <i class="fas fa-user-slash"></i>
            <h3><?php echo e($conductoresInactivos); ?></h3>
            <p>Conductores inactivos</p>
        </div>

        <div class="resumen-item resumen-alerta">
            <i class="fas fa-id-card"></i>
            <h3><?php echo e($licenciasAlerta); ?></h3>
            <p>Licencias próximas a vencer</p>
        </div>
    </div>

    <div class="conductores-card">

        <div class="card-toolbar">
            <div class="toolbar-title">
                <div class="toolbar-icon">
                    <i class="fas fa-address-book"></i>
                </div>
                <div>
                    <h3>Directorio de conductores</h3>
                    <p>Consulta, filtra y administra los registros.</p>
                </div>
            </div>

            <div class="toolbar-filters">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input
                        type="text"
                        id="buscarConductor"
                        placeholder="Buscar nombre, cédula, regional, dependencia..."
                        autocomplete="off"
                    >
                </div>

                <div class="filter-box">
                    <i class="fas fa-filter"></i>
                    <select id="filtroEstado">
                        <option value="">Todos</option>
                        <option value="activo">Activos</option>
                        <option value="inactivo">Inactivos</option>
                        <option value="suspendido">Suspendidos</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="table-responsive-custom">
            <table class="conductores-table" id="tablaConductores">
                <thead>
                    <tr>
                        <th>Conductor</th>
                        <th>Cédula</th>
                        <th>Cargo / Dependencia</th>
                        <th>Regional / Sede</th>
                        <th>Contrato</th>
                        <th>Sexo</th>
                        <th>Licencia</th>
                        <th>Vencimiento</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody id="conductoresBody">
                    <?php $__empty_1 = true; $__currentLoopData = $conductores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conductor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $nombreCompleto = trim(($conductor->nombre ?? '') . ' ' . ($conductor->apellido ?? ''));
                            $inicialNombre = strtoupper(substr($conductor->nombre ?? 'C', 0, 1));
                            $inicialApellido = strtoupper(substr($conductor->apellido ?? 'D', 0, 1));

                            $licenciaVencida = false;
                            $licenciaProxima = false;

                            if ($conductor->vence_licencia) {
                                $fechaVencimiento = \Carbon\Carbon::parse($conductor->vence_licencia);
                                $licenciaVencida = $fechaVencimiento->isPast();
                                $licenciaProxima = !$licenciaVencida && $fechaVencimiento->diffInDays(now()) <= 30;
                            }

                            $estadoClave = strtolower($conductor->estado ?? 'inactivo');
                        ?>

                        <tr
                            data-search="<?php echo e(strtolower(implode(' ', array_filter([
                                $nombreCompleto,
                                $conductor->cedula,
                                $conductor->cargo,
                                $conductor->dependencia ?? null,
                                $conductor->regional ?? null,
                                $conductor->sede ?? null,
                                $conductor->grupo_interno_trabajo ?? null,
                                $conductor->tipo_contrato ?? null,
                                $conductor->sexo ?? null,
                                $conductor->licencia
                            ])))); ?>"
                            data-estado="<?php echo e($estadoClave); ?>"
                        >
                            <td>
                                <div class="conductor-info">
                                    <div class="conductor-avatar">
                                        <?php echo e($inicialNombre); ?><?php echo e($inicialApellido); ?>

                                    </div>
                                    <div>
                                        <strong><?php echo e($nombreCompleto ?: 'Sin nombre'); ?></strong>
                                        <span>ID #<?php echo e($conductor->id); ?></span>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <span class="cedula-chip">
                                    <i class="fas fa-id-card"></i>
                                    <?php echo e($conductor->cedula ?: 'No registrada'); ?>

                                </span>
                            </td>

                            <td>
                                <span class="dato-principal">
                                    <?php echo e($conductor->cargo ?: 'Sin cargo'); ?>

                                </span>
                                <span class="dato-secundario">
                                    <?php echo e($conductor->dependencia ?: 'Sin dependencia'); ?>

                                </span>
                            </td>

                            <td>
                                <?php if($conductor->regional || $conductor->sede): ?>
                                    <span class="regional-badge">
                                        <i class="fas fa-location-dot"></i>
                                        <?php echo e($conductor->regional ?: 'Sin regional'); ?>

                                    </span>
                                    <span class="dato-secundario">
                                        <?php echo e($conductor->sede ?: 'Sin sede'); ?>

                                    </span>
                                <?php else: ?>
                                    <span class="no-data">Sin regional / sede</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <span class="contract-badge">
                                    <i class="fas fa-file-signature"></i>
                                    <?php echo e($conductor->tipo_contrato ?: 'No registrado'); ?>

                                </span>
                            </td>

                            <td>
                                <span class="sex-badge">
                                    <i class="fas fa-venus-mars"></i>
                                    <?php echo e($conductor->sexo ?: 'No registrado'); ?>

                                </span>
                            </td>

                            <td>
                                <div class="licencia-info">
                                    <strong><?php echo e($conductor->licencia ?: 'No registrada'); ?></strong>
                                    <span><?php echo e($conductor->categoria ? 'Categoría ' . $conductor->categoria : 'Licencia de conducción'); ?></span>
                                </div>
                            </td>

                            <td>
                                <?php if($conductor->vence_licencia): ?>
                                    <?php if($licenciaVencida): ?>
                                        <span class="vence-vencido">
                                            <i class="fas fa-circle-exclamation"></i>
                                            <?php echo e(\Carbon\Carbon::parse($conductor->vence_licencia)->format('d/m/Y')); ?>

                                        </span>
                                    <?php elseif($licenciaProxima): ?>
                                        <span class="vence-proximo">
                                            <i class="fas fa-clock"></i>
                                            <?php echo e(\Carbon\Carbon::parse($conductor->vence_licencia)->format('d/m/Y')); ?>

                                        </span>
                                    <?php else: ?>
                                        <span class="vence-normal">
                                            <?php echo e(\Carbon\Carbon::parse($conductor->vence_licencia)->format('d/m/Y')); ?>

                                        </span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="no-data">No registrada</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if($conductor->estado == 'Activo'): ?>
                                    <span class="status-badge estado-activo">Activo</span>
                                <?php elseif($conductor->estado == 'Suspendido'): ?>
                                    <span class="status-badge estado-suspendido">Suspendido</span>
                                <?php else: ?>
                                    <span class="status-badge estado-inactivo">Inactivo</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <div class="acciones-conductor">
                                    <a
                                        href="<?php echo e(route('conductores.edit', $conductor)); ?>"
                                        class="btn-action btn-edit"
                                        title="Editar conductor"
                                    >
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <form
                                        action="<?php echo e(route('conductores.destroy', $conductor)); ?>"
                                        method="POST"
                                        style="display:inline;"
                                    >
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button
                                            type="submit"
                                            class="btn-action btn-delete"
                                            title="Eliminar conductor"
                                            onclick="return confirm('¿Está seguro de eliminar este conductor?')"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="10">
                                <div class="empty-state">
                                    <i class="fas fa-users"></i>
                                    <strong>No hay conductores registrados</strong>
                                    <span>Registra un conductor para comenzar.</span>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const buscador = document.getElementById('buscarConductor');
    const filtro = document.getElementById('filtroEstado');
    const filas = Array.from(document.querySelectorAll('#conductoresBody tr[data-search]'));

    function filtrar() {
        const texto = (buscador?.value || '').toLowerCase().trim();
        const estado = (filtro?.value || '').toLowerCase().trim();

        filas.forEach(function (fila) {
            const contenido = fila.dataset.search || '';
            const estadoFila = fila.dataset.estado || '';
            const coincideTexto = !texto || contenido.includes(texto);
            const coincideEstado = !estado || estadoFila === estado;

            fila.style.display = (coincideTexto && coincideEstado) ? '' : 'none';
        });
    }

    buscador?.addEventListener('input', filtrar);
    filtro?.addEventListener('change', filtrar);
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\GestionVehiculos\resources\views/conductores/index.blade.php ENDPATH**/ ?>