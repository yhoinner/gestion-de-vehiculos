

<?php $__env->startSection('titulo', 'Nuevo Préstamo'); ?>

<?php $__env->startSection('contenido'); ?>

<style>

    .prestamo-form-page {
        max-width: 1100px;
        margin: 0 auto;
        padding-bottom: 35px;
    }

    /* HEADER */

    .prestamo-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 22px;
    }

    .prestamo-title {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .prestamo-title-icon {
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

    .prestamo-title h1 {
        margin: 0;
        color: #172033;
        font-size: 25px;
        font-weight: 800;
    }

    .prestamo-title p {
        margin: 4px 0 0;
        color: #64748b;
        font-size: 12px;
    }

    /* VOLVER */

    .btn-volver-prestamo {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        padding: 10px 15px;

        border-radius: 10px;

        color: #475569;
        background: white;
        border: 1px solid #dbe2ea;

        text-decoration: none;

        font-size: 11px;
        font-weight: 700;

        transition: .2s;
    }

    .btn-volver-prestamo:hover {
        color: #2563eb;
        background: #eff6ff;
        border-color: #bfdbfe;
    }

    /* CARD */

    .prestamo-form-card {
        background: white;

        border: 1px solid #e5eaf2;

        border-radius: 20px;

        box-shadow:
            0 10px 30px rgba(15,23,42,.06);

        overflow: hidden;
    }

    .prestamo-card-header {
        padding: 22px 25px;

        display: flex;
        align-items: center;
        gap: 12px;

        border-bottom: 1px solid #edf0f5;

        background: linear-gradient(
            180deg,
            #ffffff,
            #f8fafc
        );
    }

    .mini-icon {
        width: 40px;
        height: 40px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 11px;

        background: #eff6ff;
        color: #2563eb;
    }

    .prestamo-card-header h2 {
        margin: 0;

        color: #172033;

        font-size: 16px;
        font-weight: 800;
    }

    .prestamo-card-header p {
        margin: 3px 0 0;

        color: #94a3b8;

        font-size: 10px;
    }

    /* BODY */

    .prestamo-form-body {
        padding: 28px;
    }

    /* ERRORES */

    .error-box {
        display: flex;
        gap: 10px;

        padding: 14px 16px;

        margin-bottom: 25px;

        border-radius: 12px;

        color: #991b1b;
        background: #fef2f2;

        border: 1px solid #fecaca;

        font-size: 11px;
    }

    .error-box ul {
        margin: 0;
        padding-left: 18px;
    }

    /* SECCIONES */

    .form-section {
        margin-bottom: 30px;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 9px;

        margin-bottom: 18px;
        padding-bottom: 10px;

        border-bottom: 1px solid #edf0f5;
    }

    .section-icon {
        width: 31px;
        height: 31px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 9px;

        background: #eff6ff;
        color: #2563eb;

        font-size: 12px;
    }

    .section-title strong {
        color: #334155;
        font-size: 12px;
        font-weight: 800;
    }

    .section-title span {
        color: #94a3b8;
        font-size: 9px;
    }

    /* GRID */

    .form-grid {
        display: grid;

        grid-template-columns: repeat(2, 1fr);

        gap: 19px 20px;
    }

    .form-grid.three {
        grid-template-columns: repeat(3, 1fr);
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .full {
        grid-column: 1 / -1;
    }

    /* LABEL */

    .form-label {
        display: flex;
        align-items: center;
        gap: 6px;

        margin-bottom: 7px;

        color: #334155;

        font-size: 10px;
        font-weight: 800;
    }

    .form-label i {
        color: #2563eb;
        font-size: 10px;
    }

    .required {
        color: #ef4444;
    }

    /* INPUT */

    .input-wrapper {
        position: relative;
    }

    .input-icon {
        position: absolute;

        left: 14px;
        top: 50%;

        transform: translateY(-50%);

        color: #94a3b8;

        font-size: 12px;

        pointer-events: none;
    }

    .form-control-custom {
        width: 100%;
        height: 45px;

        box-sizing: border-box;

        padding: 0 14px 0 39px;

        border-radius: 10px;

        border: 1px solid #dbe2ea;

        background: #f8fafc;

        color: #334155;

        font-size: 12px;

        outline: none;

        transition: .2s;
    }

    .form-control-custom:focus {
        border-color: #60a5fa;

        background: white;

        box-shadow:
            0 0 0 3px rgba(37,99,235,.10);
    }

    select.form-control-custom {
        cursor: pointer;
    }

    /* TEXTAREA */

    textarea.form-control-custom {
        height: auto;

        min-height: 100px;

        padding-top: 13px;

        resize: vertical;
    }

    textarea + .input-icon {
        top: 18px;

        transform: none;
    }

    /* AYUDA */

    .field-help {
        margin-top: 5px;

        color: #94a3b8;

        font-size: 9px;
    }

    /* COMBUSTIBLE */

    .combustible-grid {
        display: grid;

        grid-template-columns: repeat(5, 1fr);

        gap: 8px;
    }

    .combustible-option {
        position: relative;
    }

    .combustible-option input {
        position: absolute;

        opacity: 0;
    }

    .combustible-option label {
        height: 42px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 9px;

        border: 1px solid #dbe2ea;

        background: #f8fafc;

        color: #64748b;

        font-size: 10px;

        font-weight: 700;

        cursor: pointer;

        transition: .2s;
    }

    .combustible-option input:checked + label {
        color: #2563eb;

        background: #eff6ff;

        border-color: #60a5fa;

        box-shadow:
            0 0 0 2px rgba(37,99,235,.08);
    }

    .combustible-option label:hover {
        border-color: #93c5fd;
    }

    /* FOOTER */

    .form-footer {
        display: flex;

        align-items: center;

        justify-content: flex-end;

        gap: 10px;

        margin-top: 30px;

        padding-top: 22px;

        border-top: 1px solid #edf0f5;
    }

    .btn-form {
        height: 43px;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 8px;

        padding: 0 18px;

        border-radius: 10px;

        font-size: 11px;

        font-weight: 800;

        text-decoration: none;

        cursor: pointer;

        transition: .2s;
    }

    .btn-cancelar {
        color: #475569;

        background: white;

        border: 1px solid #dbe2ea;
    }

    .btn-cancelar:hover {
        background: #f8fafc;
    }

    .btn-guardar {
        color: white;

        border: none;

        background: linear-gradient(
            135deg,
            #2563eb,
            #1d4ed8
        );

        box-shadow:
            0 7px 16px rgba(37,99,235,.20);
    }

    .btn-guardar:hover {
        color: white;

        transform: translateY(-1px);

        box-shadow:
            0 10px 20px rgba(37,99,235,.25);
    }

    /* RESPONSIVE */

    @media(max-width: 850px) {

        .form-grid.three {
            grid-template-columns: 1fr 1fr;
        }

        .combustible-grid {
            grid-template-columns: repeat(3, 1fr);
        }

    }

    @media(max-width: 700px) {

        .prestamo-header {
            align-items: flex-start;

            flex-direction: column;
        }

        .btn-volver-prestamo {
            width: 100%;

            justify-content: center;
        }

        .form-grid,
        .form-grid.three {
            grid-template-columns: 1fr;
        }

        .full {
            grid-column: auto;
        }

        .prestamo-form-body {
            padding: 20px;
        }

        .combustible-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .form-footer {
            flex-direction: column-reverse;
        }

        .btn-form {
            width: 100%;
        }

    }

</style>


<div class="prestamo-form-page">


    

    <div class="prestamo-header">

        <div class="prestamo-title">

            <div class="prestamo-title-icon">

                <i class="fas fa-key"></i>

            </div>

            <div>

                <h1>Nuevo préstamo</h1>

                <p>
                    Registra la salida de un vehículo.
                </p>

            </div>

        </div>


        <a
            href="<?php echo e(route('prestamos.index')); ?>"
            class="btn-volver-prestamo"
        >

            <i class="fas fa-arrow-left"></i>

            Volver a préstamos

        </a>

    </div>


    

    <div class="prestamo-form-card">


        <div class="prestamo-card-header">

            <div class="mini-icon">

                <i class="fas fa-clipboard-list"></i>

            </div>

            <div>

                <h2>
                    Información del préstamo
                </h2>

                <p>
                    Complete los datos de la salida del vehículo.
                </p>

            </div>

        </div>


        <div class="prestamo-form-body">


            

            <?php if($errors->any()): ?>

                <div class="error-box">

                    <i class="fas fa-exclamation-circle"></i>

                    <div>

                        <strong>
                            Revise la información ingresada.
                        </strong>

                        <ul>

                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <li>
                                    <?php echo e($error); ?>

                                </li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>

                    </div>

                </div>

            <?php endif; ?>


            <form
                action="<?php echo e(route('prestamos.store')); ?>"
                method="POST"
            >

                <?php echo csrf_field(); ?>


                

                <div class="form-section">


                    <div class="section-title">

                        <div class="section-icon">

                            <i class="fas fa-car"></i>

                        </div>

                        <strong>
                            Asignación
                        </strong>

                        <span>
                            Vehículo y conductor
                        </span>

                    </div>


                    <div class="form-grid">


                        

                        <div class="form-group">

                            <label class="form-label">

                                <i class="fas fa-car"></i>

                                Vehículo

                                <span class="required">*</span>

                            </label>

                            <div class="input-wrapper">

                                <i class="fas fa-car input-icon"></i>

                                <select
                                    name="vehiculo_id"
                                    class="form-control-custom"
                                    required
                                >

                                    <option value="">
                                        Seleccione un vehículo...
                                    </option>

                                    <?php $__currentLoopData = $vehiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <option
                                            value="<?php echo e($vehiculo->id); ?>"
                                            data-tiene-adblue="<?php echo e($vehiculo->tiene_adblue ? '1' : '0'); ?>"
                                            data-nivel-adblue="<?php echo e($vehiculo->nivel_adblue ?? ''); ?>"
                                            <?php echo e(old('vehiculo_id') == $vehiculo->id ? 'selected' : ''); ?>

                                        >

                                            <?php echo e($vehiculo->placa); ?>


                                            -

                                            <?php echo e($vehiculo->marca); ?>


                                            <?php if($vehiculo->linea): ?>
                                                <?php echo e($vehiculo->linea); ?>

                                            <?php endif; ?>

                                        </option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>

                            </div>

                            <span class="field-help">
                                Seleccione el vehículo que será prestado.
                            </span>

                        </div>


                        

                        <div class="form-group">

                            <label class="form-label">

                                <i class="fas fa-user"></i>

                                Conductor

                                <span class="required">*</span>

                            </label>

                            <div class="input-wrapper">

                                <i class="fas fa-user input-icon"></i>

                                <select
                                    name="conductor_id"
                                    class="form-control-custom"
                                    required
                                >

                                    <option value="">
                                        Seleccione un conductor...
                                    </option>

                                    <?php $__currentLoopData = $conductores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conductor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <option
                                            value="<?php echo e($conductor->id); ?>"
                                            <?php echo e(old('conductor_id') == $conductor->id ? 'selected' : ''); ?>

                                        >

                                            <?php echo e($conductor->nombre); ?>

                                            <?php echo e($conductor->apellido); ?>


                                        </option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>

                            </div>

                            <span class="field-help">
                                Conductor responsable del vehículo.
                            </span>

                        </div>


                    </div>

                </div>


                
                <div class="form-section" id="adblueSection" style="display:none;">
                    <div class="section-title">
                        <div class="section-icon">
                            <i class="fas fa-tint"></i>
                        </div>
                        <strong>
                            AdBlue al momento de la salida
                        </strong>
                        <span>
                            Nivel registrado del vehículo
                        </span>
                    </div>

                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-tint"></i>
                                Nivel de AdBlue al salir
                            </label>

                            <div class="input-wrapper">
                                <i class="fas fa-tint input-icon"></i>
                                <input
                                    type="number"
                                    name="adblue_salida"
                                    id="adblueSalida"
                                    class="form-control-custom"
                                    min="0"
                                    max="100"
                                    step="0.01"
                                    value="<?php echo e(old('adblue_salida')); ?>"
                                    readonly
                                >
                            </div>

                            <span class="field-help">
                                Este nivel se toma automáticamente del vehículo seleccionado.
                            </span>
                        </div>

                        <div class="form-group" style="display:flex;align-items:center;">
                            <div style="
                                width:100%;
                                padding:14px 16px;
                                border:1px solid #dbeafe;
                                border-radius:10px;
                                background:#eff6ff;
                                color:#1e40af;
                                font-size:11px;
                                font-weight:700;
                            " id="adblueInfo">
                                Seleccione un vehículo con AdBlue para ver el nivel de salida.
                            </div>
                        </div>
                    </div>
                </div>

                

                <div class="form-section">


                    <div class="section-title">

                        <div class="section-icon">

                            <i class="fas fa-map-marker-alt"></i>

                        </div>

                        <strong>
                            Información del servicio
                        </strong>

                        <span>
                            Lugar y motivo del desplazamiento
                        </span>

                    </div>


                    <div class="form-grid">


                        

                        <div class="form-group">

                            <label class="form-label">

                                <i class="fas fa-building"></i>

                                Dependencia

                                <span class="required">*</span>

                            </label>

                            <div class="input-wrapper">

                                <i class="fas fa-building input-icon"></i>

                                <input
                                    type="text"
                                    name="dependencia"
                                    class="form-control-custom"
                                    value="<?php echo e(old('dependencia')); ?>"
                                    placeholder="Ej: Área Administrativa"
                                    required
                                >

                            </div>

                        </div>


                        

                        <div class="form-group">

                            <label class="form-label">

                                <i class="fas fa-map-marker-alt"></i>

                                Destino

                                <span class="required">*</span>

                            </label>

                            <div class="input-wrapper">

                                <i class="fas fa-map-marker-alt input-icon"></i>

                                <input
                                    type="text"
                                    name="destino"
                                    class="form-control-custom"
                                    value="<?php echo e(old('destino')); ?>"
                                    placeholder="Lugar de destino"
                                    required
                                >

                            </div>

                        </div>


                        

                        <div class="form-group full">

                            <label class="form-label">

                                <i class="fas fa-comment-alt"></i>

                                Motivo

                                <span class="required">*</span>

                            </label>

                            <div class="input-wrapper">

                                <i class="fas fa-comment-alt input-icon"></i>

                                <input
                                    type="text"
                                    name="motivo"
                                    class="form-control-custom"
                                    value="<?php echo e(old('motivo')); ?>"
                                    placeholder="Indique el motivo del desplazamiento"
                                    required
                                >

                            </div>

                        </div>


                    </div>

                </div>


                

                <div class="form-section">


                    <div class="section-title">

                        <div class="section-icon">

                            <i class="fas fa-route"></i>

                        </div>

                        <strong>
                            Datos de salida
                        </strong>

                        <span>
                            Información al momento de entregar el vehículo
                        </span>

                    </div>


                    <div class="form-grid three">


                        

                        <div class="form-group">

                            <label class="form-label">

                                <i class="fas fa-calendar-alt"></i>

                                Fecha salida

                                <span class="required">*</span>

                            </label>

                            <div class="input-wrapper">

                                <i class="fas fa-calendar-alt input-icon"></i>

                                <input
                                    type="date"
                                    name="fecha_salida"
                                    class="form-control-custom"
                                    value="<?php echo e(old('fecha_salida', date('Y-m-d'))); ?>"
                                    required
                                >

                            </div>

                        </div>


                        

                        <div class="form-group">

                            <label class="form-label">

                                <i class="fas fa-clock"></i>

                                Hora salida

                                <span class="required">*</span>

                            </label>

                            <div class="input-wrapper">

                                <i class="fas fa-clock input-icon"></i>

                                <input
                                    type="time"
                                    name="hora_salida"
                                    class="form-control-custom"
                                    value="<?php echo e(old('hora_salida')); ?>"
                                    required
                                >

                            </div>

                        </div>


                        

                        <div class="form-group">

                            <label class="form-label">

                                <i class="fas fa-tachometer-alt"></i>

                                Km salida

                                <span class="required">*</span>

                            </label>

                            <div class="input-wrapper">

                                <i class="fas fa-tachometer-alt input-icon"></i>

                                <input
                                    type="number"
                                    name="km_salida"
                                    class="form-control-custom"
                                    value="<?php echo e(old('km_salida')); ?>"
                                    min="0"
                                    placeholder="Ej: 45230"
                                    required
                                >

                            </div>

                        </div>


                    </div>

                </div>


                

                <div class="form-section">


                    <div class="section-title">

                        <div class="section-icon">

                            <i class="fas fa-gas-pump"></i>

                        </div>

                        <strong>
                            Nivel de combustible
                        </strong>

                        <span>
                            Nivel al momento de la salida
                        </span>

                    </div>


                    <div class="combustible-grid">


                        <div class="combustible-option">

                            <input
                                type="radio"
                                name="combustible_salida"
                                id="combustible_vacio"
                                value="Vacío"
                                <?php echo e(old('combustible_salida', 'Vacío') == 'Vacío' ? 'checked' : ''); ?>

                                required
                            >

                            <label for="combustible_vacio">

                                Vacío

                            </label>

                        </div>


                        <div class="combustible-option">

                            <input
                                type="radio"
                                name="combustible_salida"
                                id="combustible_1_4"
                                value="1/4"
                                <?php echo e(old('combustible_salida') == '1/4' ? 'checked' : ''); ?>

                            >

                            <label for="combustible_1_4">

                                1/4

                            </label>

                        </div>


                        <div class="combustible-option">

                            <input
                                type="radio"
                                name="combustible_salida"
                                id="combustible_1_2"
                                value="1/2"
                                <?php echo e(old('combustible_salida') == '1/2' ? 'checked' : ''); ?>

                            >

                            <label for="combustible_1_2">

                                1/2

                            </label>

                        </div>


                        <div class="combustible-option">

                            <input
                                type="radio"
                                name="combustible_salida"
                                id="combustible_3_4"
                                value="3/4"
                                <?php echo e(old('combustible_salida') == '3/4' ? 'checked' : ''); ?>

                            >

                            <label for="combustible_3_4">

                                3/4

                            </label>

                        </div>


                        <div class="combustible-option">

                            <input
                                type="radio"
                                name="combustible_salida"
                                id="combustible_lleno"
                                value="Tanque lleno"
                                <?php echo e(old('combustible_salida') == 'Tanque lleno' ? 'checked' : ''); ?>

                            >

                            <label for="combustible_lleno">

                                Tanque lleno

                            </label>

                        </div>


                    </div>

                </div>


                

                <div class="form-section">


                    <div class="section-title">

                        <div class="section-icon">

                            <i class="fas fa-sticky-note"></i>

                        </div>

                        <strong>
                            Observaciones
                        </strong>

                        <span>
                            Información adicional
                        </span>

                    </div>


                    <div class="form-group">

                        <div class="input-wrapper">

                            <textarea
                                name="observaciones"
                                class="form-control-custom"
                                rows="4"
                                placeholder="Escriba aquí cualquier observación relacionada con el préstamo..."
                            ><?php echo e(old('observaciones')); ?></textarea>

                            <i class="fas fa-sticky-note input-icon"></i>

                        </div>

                    </div>

                </div>


                

                <div class="form-footer">


                    <a
                        href="<?php echo e(route('prestamos.index')); ?>"
                        class="btn-form btn-cancelar"
                    >

                        <i class="fas fa-times"></i>

                        Cancelar

                    </a>


                    <button
                        type="submit"
                        class="btn-form btn-guardar"
                    >

                        <i class="fas fa-save"></i>

                        Registrar préstamo

                    </button>


                </div>


            </form>


        </div>

    </div>

</div>



<script>
document.addEventListener('DOMContentLoaded', function () {
    const vehiculoSelect = document.querySelector('select[name="vehiculo_id"]');
    const adblueSection = document.getElementById('adblueSection');
    const adblueSalida = document.getElementById('adblueSalida');
    const adblueInfo = document.getElementById('adblueInfo');

    function actualizarAdBlue() {
        if (!vehiculoSelect || !adblueSection || !adblueSalida) return;

        const option = vehiculoSelect.options[vehiculoSelect.selectedIndex];

        if (!option || !option.value) {
            adblueSection.style.display = 'none';
            adblueSalida.value = '';
            if (adblueInfo) {
                adblueInfo.textContent = 'Seleccione un vehículo con AdBlue para ver el nivel de salida.';
            }
            return;
        }

        const tieneAdblue = option.dataset.tieneAdblue === '1';
        const nivel = option.dataset.nivelAdblue || '';

        if (tieneAdblue) {
            adblueSection.style.display = 'block';
            adblueSalida.value = nivel;

            if (adblueInfo) {
                adblueInfo.innerHTML = '<i class="fas fa-check-circle"></i> El vehículo tiene AdBlue. Nivel registrado al salir: <strong>' + (nivel !== '' ? nivel + ' %' : 'No registrado') + '</strong>';
            }
        } else {
            adblueSection.style.display = 'none';
            adblueSalida.value = '';

            if (adblueInfo) {
                adblueInfo.textContent = 'Este vehículo no tiene AdBlue registrado.';
            }
        }
    }

    vehiculoSelect.addEventListener('change', actualizarAdBlue);
    actualizarAdBlue();
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\GestionVehiculos\resources\views/prestamos/create.blade.php ENDPATH**/ ?>