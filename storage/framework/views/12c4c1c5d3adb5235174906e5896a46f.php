

<?php $__env->startSection('titulo', 'Mantenimientos'); ?>

<?php $__env->startSection('contenido'); ?>

<style>
    .maintenance-page {
        padding: 6px 6px 30px;
    }

    .maintenance-hero {
        background: linear-gradient(135deg, #0f2f68 0%, #1d4ed8 58%, #2563eb 100%);
        border-radius: 22px;
        padding: 24px 26px;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        box-shadow: 0 14px 35px rgba(29, 78, 216, .18);
        margin-bottom: 18px;
        position: relative;
        overflow: hidden;
    }

    .maintenance-hero::after {
        content: '';
        position: absolute;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(255,255,255,.08);
        right: -70px;
        top: -100px;
    }

    .hero-left {
        display: flex;
        align-items: center;
        gap: 15px;
        position: relative;
        z-index: 1;
    }

    .hero-icon {
        width: 54px;
        height: 54px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,.14);
        border: 1px solid rgba(255,255,255,.18);
        font-size: 22px;
        flex-shrink: 0;
    }

    .hero-left h2 {
        margin: 0;
        font-size: 23px;
        font-weight: 800;
        letter-spacing: -.2px;
    }

    .hero-left p {
        margin: 5px 0 0;
        color: rgba(255,255,255,.82);
        font-size: 12px;
    }

    .btn-new-maintenance {
        position: relative;
        z-index: 1;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 17px;
        border-radius: 11px;
        background: #fff;
        color: #1d4ed8 !important;
        font-size: 12px;
        font-weight: 800;
        text-decoration: none;
        box-shadow: 0 8px 20px rgba(0,0,0,.12);
        transition: .2s ease;
        white-space: nowrap;
    }

    .btn-new-maintenance:hover {
        transform: translateY(-1px);
        box-shadow: 0 11px 24px rgba(0,0,0,.16);
    }

    .maintenance-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-bottom: 18px;
    }

    .stat-card {
        background: #fff;
        border: 1px solid #e8edf5;
        border-radius: 16px;
        padding: 16px;
        box-shadow: 0 7px 22px rgba(15,23,42,.05);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .stat-icon {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        flex-shrink: 0;
    }

    .stat-blue { background:#eff6ff; color:#2563eb; }
    .stat-orange { background:#fff7ed; color:#ea580c; }
    .stat-green { background:#f0fdf4; color:#16a34a; }
    .stat-slate { background:#f8fafc; color:#475569; }

    .stat-card small {
        display: block;
        color: #94a3b8;
        font-size: 9px;
        text-transform: uppercase;
        letter-spacing: .45px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .stat-card strong {
        color: #172033;
        font-size: 19px;
        font-weight: 800;
    }

    .maintenance-card {
        background: #fff;
        border: 1px solid #e8edf5;
        border-radius: 20px;
        box-shadow: 0 10px 28px rgba(15,23,42,.06);
        overflow: hidden;
    }

    .maintenance-toolbar {
        padding: 16px 18px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        border-bottom: 1px solid #eef2f7;
        background: #fbfcfe;
    }

    .toolbar-title strong {
        color: #172033;
        font-size: 14px;
        font-weight: 800;
    }

    .toolbar-title span {
        color: #94a3b8;
        font-size: 10px;
        margin-left: 6px;
    }

    .toolbar-filters {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .search-box {
        position: relative;
        min-width: 220px;
    }

    .search-box i {
        position: absolute;
        left: 11px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 12px;
        pointer-events: none;
    }

    .search-box input,
    .maintenance-filter {
        height: 38px;
        border: 1px solid #dbe3ee;
        border-radius: 9px;
        background: #fff;
        color: #334155;
        font-size: 11px;
        outline: none;
    }

    .search-box input {
        width: 100%;
        padding: 0 12px 0 32px;
    }

    .maintenance-filter {
        padding: 0 10px;
    }

    .search-box input:focus,
    .maintenance-filter:focus {
        border-color: #93c5fd;
        box-shadow: 0 0 0 3px rgba(37,99,235,.08);
    }

    .maintenance-table-wrap {
        overflow-x: auto;
    }

    .maintenance-table {
        width: 100%;
        min-width: 1120px;
        border-collapse: separate;
        border-spacing: 0;
    }

    .maintenance-table thead th {
        padding: 13px 14px;
        background: #f8fafc;
        border-bottom: 1px solid #e8edf5;
        color: #64748b;
        font-size: 9px;
        text-transform: uppercase;
        letter-spacing: .55px;
        font-weight: 800;
        white-space: nowrap;
        text-align: left;
    }

    .maintenance-table tbody td {
        padding: 13px 14px;
        border-bottom: 1px solid #eef2f7;
        color: #334155;
        font-size: 11px;
        vertical-align: middle;
        background: #fff;
    }

    .maintenance-table tbody tr:last-child td {
        border-bottom: none;
    }

    .maintenance-table tbody tr:hover td {
        background: #fbfdff;
    }

    .maintenance-id {
        width: 31px;
        height: 28px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #f1f5f9;
        color: #64748b;
        font-weight: 800;
    }

    .vehicle-plate {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 6px 9px;
        border-radius: 8px;
        background: #eff6ff;
        border: 1px solid #dbeafe;
        color: #1d4ed8;
        font-weight: 800;
        letter-spacing: .25px;
    }

    .type-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #334155;
        font-weight: 700;
    }

    .date-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
        color: #475569;
    }

    .date-chip i {
        color: #94a3b8;
    }

    .date-chip.request i { color:#8b5cf6; }
    .date-chip.maintenance i { color:#2563eb; }

    .workshop {
        max-width: 170px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .km {
        font-weight: 800;
        white-space: nowrap;
    }

    .km span {
        color: #94a3b8;
        font-weight: 600;
        margin-left: 2px;
    }

    .cost {
        font-weight: 800;
        color: #172033;
        white-space: nowrap;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 9px;
        border-radius: 999px;
        font-size: 9px;
        font-weight: 800;
        white-space: nowrap;
    }

    .badge i { font-size: 6px; }

    .badge-pending { background:#fff7ed; color:#c2410c; }
    .badge-process { background:#eff6ff; color:#2563eb; }
    .badge-finished { background:#f0fdf4; color:#15803d; }
    .badge-approval-pending { background:#f8fafc; color:#64748b; }
    .badge-approved { background:#f0fdf4; color:#15803d; }
    .badge-rejected { background:#fef2f2; color:#dc2626; }

    .actions {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .action-btn {
        width: 31px;
        height: 31px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        border: none;
        transition: .18s ease;
        cursor: pointer;
    }

    .action-view { background:#eff6ff; color:#2563eb; }
    .action-edit { background:#fff7ed; color:#d97706; }
    .action-delete { background:#fef2f2; color:#dc2626; }

    .action-view:hover { background:#2563eb; color:#fff; transform:translateY(-1px); }
    .action-edit:hover { background:#f59e0b; color:#fff; transform:translateY(-1px); }
    .action-delete:hover { background:#dc2626; color:#fff; transform:translateY(-1px); }

    .maintenance-alert {
        margin: 14px 18px 0;
        padding: 11px 13px;
        border-radius: 10px;
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #166534;
        font-size: 11px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .empty-maintenance {
        padding: 50px 20px !important;
        text-align: center;
        color: #94a3b8;
    }

    .empty-icon {
        width: 54px;
        height: 54px;
        margin: 0 auto 12px;
        border-radius: 14px;
        background: #eff6ff;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .empty-maintenance strong {
        display: block;
        color: #475569;
        font-size: 12px;
        margin-bottom: 4px;
    }

    .empty-maintenance span {
        font-size: 10px;
    }

    .no-results {
        display: none;
        padding: 38px 20px;
        text-align: center;
        color: #94a3b8;
        font-size: 11px;
    }

    @media (max-width: 950px) {
        .maintenance-stats { grid-template-columns: repeat(2, 1fr); }
        .maintenance-hero { align-items: flex-start; flex-direction: column; }
        .maintenance-toolbar { align-items: stretch; flex-direction: column; }
        .toolbar-filters { width: 100%; }
        .search-box { min-width: 0; flex: 1; }
    }

    @media (max-width: 600px) {
        .maintenance-page { padding-left: 2px; padding-right: 2px; }
        .maintenance-stats { grid-template-columns: 1fr 1fr; gap: 10px; }
        .stat-card { padding: 12px; }
        .hero-left h2 { font-size: 19px; }
        .hero-left p { font-size: 11px; }
    }
</style>

<div class="maintenance-page">

    <?php
        $totalMantenimientos = $mantenimientos->count();
        $pendientes = $mantenimientos->where('estado', 'Pendiente')->count();
        $enProceso = $mantenimientos->where('estado', 'En proceso')->count();
        $finalizados = $mantenimientos->where('estado', 'Finalizado')->count();
    ?>

    <div class="maintenance-hero">
        <div class="hero-left">
            <div class="hero-icon">
                <i class="fa fa-screwdriver-wrench"></i>
            </div>
            <div>
                <h2>Gestión de Mantenimientos</h2>
                <p>Control, seguimiento y trazabilidad del mantenimiento de los vehículos.</p>
            </div>
        </div>

        <a href="<?php echo e(route('mantenimientos.create')); ?>" class="btn-new-maintenance">
            <i class="fa fa-plus"></i>
            Nuevo mantenimiento
        </a>
    </div>

    <div class="maintenance-stats">
        <div class="stat-card">
            <div class="stat-icon stat-blue"><i class="fa fa-list-check"></i></div>
            <div>
                <small>Total</small>
                <strong><?php echo e($totalMantenimientos); ?></strong>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon stat-orange"><i class="fa fa-clock"></i></div>
            <div>
                <small>Pendientes</small>
                <strong><?php echo e($pendientes); ?></strong>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon stat-blue"><i class="fa fa-gears"></i></div>
            <div>
                <small>En proceso</small>
                <strong><?php echo e($enProceso); ?></strong>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon stat-green"><i class="fa fa-circle-check"></i></div>
            <div>
                <small>Finalizados</small>
                <strong><?php echo e($finalizados); ?></strong>
            </div>
        </div>
    </div>

    <div class="maintenance-card">

        <div class="maintenance-toolbar">
            <div class="toolbar-title">
                <strong>Registros</strong>
                <span><?php echo e($totalMantenimientos); ?> mantenimiento<?php echo e($totalMantenimientos == 1 ? '' : 's'); ?></span>
            </div>

            <div class="toolbar-filters">
                <div class="search-box">
                    <i class="fa fa-search"></i>
                    <input type="text" id="buscarMantenimiento" placeholder="Buscar por placa, tipo o taller...">
                </div>

                <select id="filtrarEstado" class="maintenance-filter">
                    <option value="">Todos los estados</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="En proceso">En proceso</option>
                    <option value="Finalizado">Finalizado</option>
                </select>
            </div>
        </div>

        <?php if(session('success')): ?>
            <div class="maintenance-alert">
                <i class="fa fa-circle-check"></i>
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="maintenance-table-wrap">
            <table class="maintenance-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Vehículo</th>
                        <th>Tipo</th>
                        <th>Fecha solicitud</th>
                        <th>Fecha mantenimiento</th>
                        <th>Taller</th>
                        <th>Kilometraje</th>
                        <th>Costo</th>
                        <th>Aprobación</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody id="tablaMantenimientos">
                    <?php $__empty_1 = true; $__currentLoopData = $mantenimientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mantenimiento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr
                            data-search="<?php echo e(strtolower(($mantenimiento->vehiculo->placa ?? '') . ' ' . ($mantenimiento->tipo ?? '') . ' ' . ($mantenimiento->taller ?? ''))); ?>"
                            data-estado="<?php echo e($mantenimiento->estado); ?>"
                        >
                            <td>
                                <span class="maintenance-id"><?php echo e($mantenimiento->id); ?></span>
                            </td>

                            <td>
                                <span class="vehicle-plate">
                                    <i class="fa fa-car"></i>
                                    <?php echo e(strtoupper($mantenimiento->vehiculo->placa ?? 'N/A')); ?>

                                </span>
                            </td>

                            <td>
                                <span class="type-pill">
                                    <i class="fa fa-wrench" style="color:#94a3b8;font-size:10px;"></i>
                                    <?php echo e($mantenimiento->tipo); ?>

                                </span>
                            </td>

                            <td>
                                <?php if($mantenimiento->fecha_solicitud): ?>
                                    <span class="date-chip request">
                                        <i class="fa fa-calendar-plus"></i>
                                        <?php echo e(\Carbon\Carbon::parse($mantenimiento->fecha_solicitud)->format('d/m/Y')); ?>

                                    </span>
                                <?php else: ?>
                                    <span style="color:#94a3b8;">No registrada</span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <span class="date-chip maintenance">
                                    <i class="fa fa-calendar-check"></i>
                                    <?php echo e(\Carbon\Carbon::parse($mantenimiento->fecha)->format('d/m/Y')); ?>

                                </span>
                            </td>

                            <td>
                                <div class="workshop" title="<?php echo e($mantenimiento->taller); ?>">
                                    <?php echo e($mantenimiento->taller); ?>

                                </div>
                            </td>

                            <td>
                                <span class="km">
                                    <?php echo e(number_format($mantenimiento->kilometraje, 0, ',', '.')); ?>

                                    <span>km</span>
                                </span>
                            </td>

                            <td>
                                <span class="cost">
                                    $ <?php echo e(number_format($mantenimiento->costo, 0, ',', '.')); ?>

                                </span>
                            </td>

                            <td>
                                <?php $aprobacion = $mantenimiento->aprobacion ?? 'Pendiente'; ?>

                                <?php if($aprobacion === 'Aprobada'): ?>
                                    <span class="badge badge-approved">
                                        <i class="fa fa-circle"></i>
                                        Aprobada
                                    </span>
                                <?php elseif($aprobacion === 'No aprobada'): ?>
                                    <span class="badge badge-rejected">
                                        <i class="fa fa-circle"></i>
                                        No aprobada
                                    </span>
                                <?php else: ?>
                                    <span class="badge badge-approval-pending">
                                        <i class="fa fa-circle"></i>
                                        Pendiente
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <?php if($mantenimiento->estado === 'Pendiente'): ?>
                                    <span class="badge badge-pending">
                                        <i class="fa fa-circle"></i>
                                        Pendiente
                                    </span>
                                <?php elseif($mantenimiento->estado === 'En proceso'): ?>
                                    <span class="badge badge-process">
                                        <i class="fa fa-circle"></i>
                                        En proceso
                                    </span>
                                <?php else: ?>
                                    <span class="badge badge-finished">
                                        <i class="fa fa-circle"></i>
                                        Finalizado
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td>
                                <div class="actions">
                                    <a href="<?php echo e(route('mantenimientos.show', $mantenimiento->id)); ?>"
                                       class="action-btn action-view" title="Ver mantenimiento">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a href="<?php echo e(route('mantenimientos.edit', $mantenimiento->id)); ?>"
                                       class="action-btn action-edit" title="Editar mantenimiento">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <form action="<?php echo e(route('mantenimientos.destroy', $mantenimiento->id)); ?>"
                                          method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit"
                                                class="action-btn action-delete"
                                                title="Eliminar mantenimiento"
                                                onclick="return confirm('¿Eliminar mantenimiento?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="11" class="empty-maintenance">
                                <div class="empty-icon">
                                    <i class="fa fa-tools"></i>
                                </div>
                                <strong>No hay mantenimientos registrados</strong>
                                <span>Actualmente no existen mantenimientos registrados en el sistema.</span>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <div id="noResultados" class="no-results">
                <i class="fa fa-search" style="font-size:22px;margin-bottom:8px;"></i>
                <div>No se encontraron mantenimientos con esos criterios.</div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buscar = document.getElementById('buscarMantenimiento');
        const filtro = document.getElementById('filtrarEstado');
        const filas = document.querySelectorAll('#tablaMantenimientos tr[data-search]');
        const noResultados = document.getElementById('noResultados');

        function filtrar() {
            const texto = (buscar.value || '').toLowerCase().trim();
            const estado = filtro.value || '';
            let visibles = 0;

            filas.forEach(function (fila) {
                const contenido = (fila.dataset.search || '').toLowerCase();
                const estadoFila = fila.dataset.estado || '';

                const coincideTexto = !texto || contenido.includes(texto);
                const coincideEstado = !estado || estadoFila === estado;
                const mostrar = coincideTexto && coincideEstado;

                fila.style.display = mostrar ? '' : 'none';
                if (mostrar) visibles++;
            });

            noResultados.style.display = visibles === 0 && filas.length > 0 ? 'block' : 'none';
        }

        buscar.addEventListener('input', filtrar);
        filtro.addEventListener('change', filtrar);
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\GestionVehiculos\resources\views/mantenimientos/index.blade.php ENDPATH**/ ?>