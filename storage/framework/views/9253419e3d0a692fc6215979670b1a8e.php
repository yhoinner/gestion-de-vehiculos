

<?php $__env->startSection('titulo', 'Expediente de Vehículos'); ?>

<?php $__env->startSection('contenido'); ?>

<style>
    .documents-container { padding: 5px 5px 30px; }

    .documents-header { margin-bottom: 18px; }
    .documents-title { display:flex; align-items:center; gap:14px; }
    .documents-title-icon {
        width:46px; height:46px; border-radius:12px;
        background:linear-gradient(135deg,#2563eb,#1d4ed8);
        color:#fff; display:flex; align-items:center; justify-content:center;
        font-size:20px; box-shadow:0 5px 12px rgba(37,99,235,.20);
    }
    .documents-title h3 { margin:0; color:#172033; font-size:21px; font-weight:700; }
    .documents-title p { margin:4px 0 0; color:#98a2b3; font-size:13px; }

    .documents-search { margin-bottom:22px; }
    .search-box { position:relative; max-width:520px; }
    .search-box > i { position:absolute; left:15px; top:50%; transform:translateY(-50%); color:#98a2b3; pointer-events:none; }
    .search-box input {
        width:100%; height:46px; padding:0 42px; border:1px solid #d0d5dd;
        border-radius:11px; background:#fff; color:#344054; font-size:14px; outline:none;
        box-shadow:0 3px 10px rgba(15,23,42,.04);
    }
    .search-box input:focus { border-color:#2563eb; box-shadow:0 0 0 3px rgba(37,99,235,.10); }
    .clear-search {
        position:absolute; right:11px; top:50%; transform:translateY(-50%);
        width:27px; height:27px; border:0; border-radius:50%; background:#eef2f6;
        color:#667085; cursor:pointer; display:flex; align-items:center; justify-content:center;
    }
    .search-result { margin-top:7px; color:#98a2b3; font-size:12px; }

    /* TARJETA HORIZONTAL */
    .documents-vehicles-grid {
        display:grid;
        grid-template-columns:repeat(2, minmax(0, 1fr));
        gap:18px;
        align-items:start;
    }

    .vehicle-document-item { margin:0; min-width:0; }
    .vehicle-row-card {
        background:#fff; border:1px solid #e5eaf2; border-radius:16px;
        box-shadow:0 7px 22px rgba(15,23,42,.06); overflow:hidden;
        transition:.2s ease;
    }
    .vehicle-row-card:hover { box-shadow:0 12px 28px rgba(15,23,42,.10); transform:translateY(-1px); }

    .vehicle-row-header {
        padding:13px 17px; background:linear-gradient(135deg,#18346b,#2557ad);
        color:#fff; display:flex; align-items:center; justify-content:space-between; gap:15px;
    }
    .vehicle-row-title { display:flex; align-items:center; gap:10px; min-width:0; }
    .vehicle-row-icon {
        width:38px; height:38px; flex:0 0 38px; border-radius:10px;
        background:rgba(255,255,255,.14); display:flex; align-items:center; justify-content:center;
    }
    .vehicle-plate { font-size:15px; font-weight:800; letter-spacing:.4px; }
    .vehicle-name { margin-top:2px; font-size:11px; opacity:.82; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
    .completion-badge {
        padding:6px 10px; border-radius:18px; background:rgba(255,255,255,.15);
        font-size:11px; font-weight:800; flex-shrink:0;
    }

    .vehicle-row-body { padding:16px; }
    .vehicle-main-grid { display:grid; grid-template-columns:170px 1fr; gap:18px; align-items:stretch; }

    .vehicle-photo-box {
        min-height:132px; border-radius:12px; background:#f1f5f9; border:1px solid #e5e7eb;
        overflow:hidden; display:flex; align-items:center; justify-content:center; position:relative;
    }
    .vehicle-photo-box img { width:100%; height:132px; object-fit:cover; display:block; }
    .vehicle-photo-placeholder { color:#94a3b8; text-align:center; padding:15px; }
    .vehicle-photo-placeholder i { display:block; font-size:28px; margin-bottom:7px; }
    .vehicle-photo-label {
        position:absolute; left:8px; bottom:8px; padding:4px 7px; border-radius:6px;
        background:rgba(15,23,42,.72); color:#fff; font-size:9px; font-weight:800;
    }

    .documents-grid {
        display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:10px;
    }
    .document-row {
        min-height:58px; border:1px solid #edf0f5; border-radius:10px; padding:10px 12px;
        display:flex; align-items:center; justify-content:space-between; gap:10px; background:#fff;
    }
    .document-left { display:flex; align-items:center; gap:9px; min-width:0; }
    .document-icon {
        width:32px; height:32px; border-radius:9px; display:flex; align-items:center; justify-content:center; flex:0 0 32px;
    }
    .icon-soat { background:#eaf2ff; color:#2563eb; }
    .icon-tecno { background:#f3e8ff; color:#7c3aed; }
    .icon-card { background:#fff7e6; color:#d97706; }
    .icon-photo { background:#e9f9f0; color:#15803d; }
    .document-name { color:#344054; font-size:12px; font-weight:800; }
    .document-help { color:#98a2b3; font-size:9px; margin-top:2px; }
    .document-status {
        display:inline-flex; align-items:center; gap:5px; padding:5px 8px;
        border-radius:18px; font-size:10px; font-weight:800; white-space:nowrap;
    }
    .status-loaded { background:#e9f9f0; color:#15803d; }
    .status-missing { background:#fff0f0; color:#dc2626; }
    .document-status i { font-size:7px; }

    .vehicle-row-footer {
        margin-top:14px; padding-top:13px; border-top:1px solid #eef1f5;
        display:flex; align-items:center; gap:14px;
    }
    .completion-section { flex:1; }
    .completion-info { display:flex; justify-content:space-between; align-items:center; margin-bottom:7px; }
    .completion-label { color:#667085; font-size:10px; font-weight:700; }
    .completion-number { color:#344054; font-size:11px; font-weight:800; }
    .completion-bar { height:7px; background:#e5e7eb; border-radius:20px; overflow:hidden; }
    .completion-fill { height:100%; border-radius:20px; background:linear-gradient(90deg,#2563eb,#3b82f6); }
    .missing-info { margin-top:6px; color:#b45309; font-size:9px; }

    .edit-vehicle-btn {
        display:inline-flex; align-items:center; justify-content:center; gap:7px;
        min-width:205px; padding:10px 14px; border-radius:10px;
        border:1px solid #bfdbfe; background:#eff6ff; color:#1d4ed8 !important;
        text-decoration:none; font-size:11px; font-weight:800; transition:.2s;
    }
    .edit-vehicle-btn:hover { background:#dbeafe; border-color:#93c5fd; }

    .empty-documents, .no-search-results { background:#fff; border-radius:16px; padding:55px 20px; text-align:center; box-shadow:0 7px 22px rgba(15,23,42,.06); }
    .empty-documents-icon, .no-search-results .icon { width:60px; height:60px; margin:0 auto 14px; border-radius:50%; background:#eff6ff; color:#2563eb; display:flex; align-items:center; justify-content:center; font-size:23px; }
    .empty-documents h5, .no-search-results h5 { margin:0 0 6px; color:#344054; font-weight:700; }
    .empty-documents p, .no-search-results p { margin:0; color:#98a2b3; font-size:13px; }

    @media(max-width:850px){
        .vehicle-main-grid { grid-template-columns:140px 1fr; }
        .documents-grid { grid-template-columns:1fr; }
        .edit-vehicle-btn { min-width:175px; }
    }
    @media(max-width:650px){
        #vehiclesContainer { grid-template-columns: 1fr; }
        .vehicle-main-grid { grid-template-columns:1fr; }
        .vehicle-photo-box { max-width:260px; }
        .vehicle-row-footer { flex-direction:column; align-items:stretch; }
        .edit-vehicle-btn { width:100%; }
    }
</style>

<div class="documents-container">

    <div class="documents-header">
        <div class="documents-title">
            <div class="documents-title-icon"><i class="fas fa-folder-open"></i></div>
            <div>
                <h3>Expediente Digital de Vehículos</h3>
                <p>Consulta rápidamente el estado de la documentación de cada vehículo.</p>
            </div>
        </div>
    </div>

    <div class="documents-search">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" id="searchVehicle" placeholder="Buscar vehículo por placa..." autocomplete="off">
            <button type="button" id="clearSearch" class="clear-search" style="display:none;"><i class="fas fa-times"></i></button>
        </div>
        <div class="search-result" id="searchResult">Mostrando todos los vehículos</div>
    </div>

    <div id="vehiclesContainer" class="documents-vehicles-grid">
        <?php $__empty_1 = true; $__currentLoopData = $vehiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $soat = $vehiculo->documentos->where('tipo','SOAT')->first();
                $tecno = $vehiculo->documentos->where('tipo','Tecnomecanica')->first();
                $tarjeta = $vehiculo->documentos->where('tipo','Tarjeta Propiedad')->first();
                $foto = $vehiculo->documentos->where('tipo','Foto Vehiculo')->first();

                $soatCargado = $soat && !empty($soat->ruta);
                $tecnoCargado = $tecno && !empty($tecno->ruta);
                $tarjetaCargada = $tarjeta && !empty($tarjeta->ruta);
                $fotoCargada = $foto && !empty($foto->ruta);

                $documentosCompletos = ($soatCargado ? 1 : 0) + ($tecnoCargado ? 1 : 0) + ($tarjetaCargada ? 1 : 0) + ($fotoCargada ? 1 : 0);
                $porcentaje = ($documentosCompletos / 4) * 100;

                $fotoUrl = null;
                if ($fotoCargada) {
                    $fotoUrl = asset('storage/' . ltrim($foto->ruta, '/'));
                } elseif (!empty($vehiculo->foto)) {
                    $fotoUrl = asset('storage/' . ltrim($vehiculo->foto, '/'));
                }

                $faltantes = [];
                if (!$soatCargado) $faltantes[] = 'SOAT';
                if (!$tecnoCargado) $faltantes[] = 'Tecnomecánica';
                if (!$tarjetaCargada) $faltantes[] = 'Tarjeta de propiedad';
                if (!$fotoCargada) $faltantes[] = 'Foto';
            ?>

            <div class="vehicle-document-item" data-placa="<?php echo e(strtolower(trim($vehiculo->placa))); ?>">
                <div class="vehicle-row-card">

                    <div class="vehicle-row-header">
                        <div class="vehicle-row-title">
                            <div class="vehicle-row-icon"><i class="fas fa-car"></i></div>
                            <div>
                                <div class="vehicle-plate"><?php echo e($vehiculo->placa); ?></div>
                                <div class="vehicle-name"><?php echo e($vehiculo->marca); ?> <?php echo e($vehiculo->linea); ?> · Modelo <?php echo e($vehiculo->modelo); ?></div>
                            </div>
                        </div>
                        <div class="completion-badge"><?php echo e($documentosCompletos); ?>/4</div>
                    </div>

                    <div class="vehicle-row-body">
                        <div class="vehicle-main-grid">
                            <div class="vehicle-photo-box">
                                <?php if($fotoUrl): ?>
                                    <img src="<?php echo e($fotoUrl); ?>" alt="Foto <?php echo e($vehiculo->placa); ?>" onerror="this.style.display='none';this.nextElementSibling.style.display='block';">
                                    <div class="vehicle-photo-placeholder" style="display:none;"><i class="fas fa-car"></i><span>Imagen no disponible</span></div>
                                <?php else: ?>
                                    <div class="vehicle-photo-placeholder"><i class="fas fa-image"></i><span>Sin foto</span></div>
                                <?php endif; ?>
                                <div class="vehicle-photo-label">FOTO DEL VEHÍCULO</div>
                            </div>

                            <div class="documents-grid">
                                <div class="document-row">
                                    <div class="document-left">
                                        <div class="document-icon icon-soat"><i class="fas fa-shield-alt"></i></div>
                                        <div><div class="document-name">SOAT</div><div class="document-help">Archivo registrado</div></div>
                                    </div>
                                    <span class="document-status <?php echo e($soatCargado ? 'status-loaded' : 'status-missing'); ?>"><i class="fas fa-circle"></i><?php echo e($soatCargado ? 'Sí' : 'Falta'); ?></span>
                                </div>

                                <div class="document-row">
                                    <div class="document-left">
                                        <div class="document-icon icon-tecno"><i class="fas fa-tools"></i></div>
                                        <div><div class="document-name">Tecnomecánica</div><div class="document-help">Archivo registrado</div></div>
                                    </div>
                                    <span class="document-status <?php echo e($tecnoCargado ? 'status-loaded' : 'status-missing'); ?>"><i class="fas fa-circle"></i><?php echo e($tecnoCargado ? 'Sí' : 'Falta'); ?></span>
                                </div>

                                <div class="document-row">
                                    <div class="document-left">
                                        <div class="document-icon icon-card"><i class="fas fa-id-card"></i></div>
                                        <div><div class="document-name">Tarjeta de propiedad</div><div class="document-help">Archivo registrado</div></div>
                                    </div>
                                    <span class="document-status <?php echo e($tarjetaCargada ? 'status-loaded' : 'status-missing'); ?>"><i class="fas fa-circle"></i><?php echo e($tarjetaCargada ? 'Sí' : 'Falta'); ?></span>
                                </div>

                                <div class="document-row">
                                    <div class="document-left">
                                        <div class="document-icon icon-photo"><i class="fas fa-camera"></i></div>
                                        <div><div class="document-name">Foto del vehículo</div><div class="document-help">Foto de perfil</div></div>
                                    </div>
                                    <span class="document-status <?php echo e($fotoCargada ? 'status-loaded' : 'status-missing'); ?>"><i class="fas fa-circle"></i><?php echo e($fotoCargada ? 'Sí' : 'Falta'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="vehicle-row-footer">
                            <div class="completion-section">
                                <div class="completion-info">
                                    <span class="completion-label">Expediente completo</span>
                                    <span class="completion-number"><?php echo e($porcentaje); ?>%</span>
                                </div>
                                <div class="completion-bar"><div class="completion-fill" style="width:<?php echo e($porcentaje); ?>%;"></div></div>
                                <?php if(count($faltantes) > 0): ?>
                                    <div class="missing-info"><i class="fas fa-triangle-exclamation"></i> Falta: <?php echo e(implode(', ', $faltantes)); ?></div>
                                <?php endif; ?>
                            </div>

                            <a href="<?php echo e(route('vehiculos.edit', $vehiculo)); ?>" class="edit-vehicle-btn">
                                <i class="fas fa-pen"></i> Editar vehículo para completar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="empty-documents">
                <div class="empty-documents-icon"><i class="fas fa-folder-open"></i></div>
                <h5>No existen vehículos registrados</h5>
                <p>Registra un vehículo para comenzar a administrar su expediente digital.</p>
            </div>
        <?php endif; ?>
    </div>

    <div id="noSearchResults" class="no-search-results" style="display:none; margin-top:18px;">
        <div class="icon"><i class="fas fa-search"></i></div>
        <h5>Vehículo no encontrado</h5>
        <p>No existe ningún vehículo con esa placa.</p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchVehicle');
    const clearButton = document.getElementById('clearSearch');
    const searchResult = document.getElementById('searchResult');
    const noSearchResults = document.getElementById('noSearchResults');
    const vehicles = document.querySelectorAll('.vehicle-document-item');

    function filtrarVehiculos() {
        const texto = (searchInput.value || '').toLowerCase().trim();
        let visibles = 0;

        vehicles.forEach(function (vehicle) {
            const placa = vehicle.dataset.placa || '';
            const mostrar = !texto || placa.includes(texto);
            vehicle.style.display = mostrar ? '' : 'none';
            if (mostrar) visibles++;
        });

        clearButton.style.display = texto ? 'flex' : 'none';
        noSearchResults.style.display = visibles === 0 ? 'block' : 'none';
        searchResult.textContent = texto
            ? (visibles === 1 ? '1 vehículo encontrado' : visibles + ' vehículos encontrados')
            : 'Mostrando todos los vehículos';
    }

    searchInput.addEventListener('input', filtrarVehiculos);
    clearButton.addEventListener('click', function () {
        searchInput.value = '';
        filtrarVehiculos();
        searchInput.focus();
    });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\GestionVehiculos\resources\views/documentos/index.blade.php ENDPATH**/ ?>