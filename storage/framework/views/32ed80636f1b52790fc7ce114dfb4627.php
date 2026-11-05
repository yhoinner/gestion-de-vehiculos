

<?php $__env->startSection('titulo', 'Registrar Vehículo'); ?>

<?php $__env->startSection('contenido'); ?>

<style>

    .registro-vehiculo {
        max-width: 1250px;
        margin: 0 auto;
        padding-bottom: 30px;
    }

    /* HEADER */

    .registro-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 22px;
        gap: 15px;
    }

    .registro-titulo {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .registro-icono {
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        font-size: 22px;
        box-shadow: 0 8px 20px rgba(37, 99, 235, .20);
    }

    .registro-titulo h1 {
        margin: 0;
        font-size: 25px;
        font-weight: 800;
        color: #172033;
    }

    .registro-titulo p {
        margin: 4px 0 0;
        color: #64748b;
        font-size: 12px;
    }

    .btn-volver {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 15px;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        background: white;
        color: #475569;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: .2s;
    }

    .btn-volver:hover {
        color: #2563eb;
        border-color: #bfdbfe;
        background: #eff6ff;
    }

    /* CARD */

    .registro-card {
        background: white;
        border: 1px solid #e5eaf2;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(15, 23, 42, .06);
        overflow: hidden;
    }

    /* SECCIONES */

    .registro-section {
        padding: 25px 28px;
        border-bottom: 1px solid #edf0f5;
    }

    .registro-section:last-of-type {
        border-bottom: none;
    }

    .section-header {
        display: flex;
        align-items: center;
        gap: 11px;
        margin-bottom: 22px;
    }

    .section-icon {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        background: #eff6ff;
        color: #2563eb;
        font-size: 15px;
    }

    .section-header h3 {
        margin: 0;
        font-size: 15px;
        font-weight: 800;
        color: #172033;
    }

    .section-header p {
        margin: 3px 0 0;
        color: #94a3b8;
        font-size: 10px;
    }

    /* GRID */

    .form-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
    }

    .form-grid-2 {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    /* CAMPOS */

    .campo {
        display: flex;
        flex-direction: column;
    }

    .campo label {
        margin-bottom: 7px;
        color: #334155;
        font-size: 11px;
        font-weight: 700;
    }

    .campo label .required {
        color: #ef4444;
    }

    .campo input,
    .campo select {
        width: 100%;
        height: 43px;
        padding: 0 13px;
        border: 1px solid #dbe2ea;
        border-radius: 10px;
        outline: none;
        background: #f8fafc;
        color: #334155;
        font-size: 12px;
        transition: .2s;
        box-sizing: border-box;
    }

    .campo input:focus,
    .campo select:focus {
        border-color: #60a5fa;
        background: white;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, .10);
    }

    .campo input::placeholder {
        color: #a1aebe;
    }

    .campo small {
        margin-top: 5px;
        color: #94a3b8;
        font-size: 9px;
    }

    /* PLACA */

    .placa-input {
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 1px;
    }

    /* VIN */

    .vin-input {
        text-transform: uppercase;
        letter-spacing: .7px;
    }

    /* CAMPOS CONDICIONALES */

    .campo-condicional {
        display: none;
    }

    .campo-condicional.mostrar {
        display: flex;
    }

    /* CAJA INFORMATIVA */

    .info-box {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-top: 18px;
        padding: 12px 14px;
        border-radius: 10px;
        background: #eff6ff;
        border: 1px solid #dbeafe;
        color: #1e40af;
        font-size: 11px;
    }

    .info-box i {
        margin-top: 2px;
    }

    /* ALERTA EXTINTOR */

    .extintor-info {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 7px;
        color: #64748b;
        font-size: 9px;
    }

    /* ERRORES */

    .errores {
        margin: 0 28px 20px;
        padding: 14px 17px;
        border: 1px solid #fecaca;
        border-radius: 12px;
        background: #fef2f2;
        color: #991b1b;
        font-size: 12px;
    }

    .errores strong {
        display: block;
        margin-bottom: 7px;
    }

    .errores ul {
        margin: 0;
        padding-left: 18px;
    }

    /* BOTONES */

    .registro-footer {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        padding: 20px 28px;
        background: #f8fafc;
        border-top: 1px solid #edf0f5;
    }

    .btn-cancelar,
    .btn-guardar {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-width: 145px;
        height: 43px;
        padding: 0 18px;
        border-radius: 10px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s;
    }

    .btn-cancelar {
        border: 1px solid #dbe2ea;
        background: white;
        color: #64748b;
        text-decoration: none;
    }

    .btn-cancelar:hover {
        background: #f1f5f9;
    }

    .btn-guardar {
        border: none;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        box-shadow: 0 7px 16px rgba(37, 99, 235, .20);
    }

    .btn-guardar:hover {
        transform: translateY(-1px);
        box-shadow: 0 10px 20px rgba(37, 99, 235, .28);
    }

    /* RESPONSIVE */

    @media(max-width: 1000px) {

        .form-grid {
            grid-template-columns: repeat(2, 1fr);
        }

    }

    @media(max-width: 700px) {

        .registro-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .btn-volver {
            width: 100%;
            justify-content: center;
        }

        .registro-section {
            padding: 20px 16px;
        }

        .form-grid,
        .form-grid-2 {
            grid-template-columns: 1fr;
        }

        .registro-footer {
            flex-direction: column-reverse;
            padding: 18px 16px;
        }

        .btn-cancelar,
        .btn-guardar {
            width: 100%;
        }

    }

</style>


<div class="registro-vehiculo">


    

    <div class="registro-header">

        <div class="registro-titulo">

            <div class="registro-icono">
                <i class="fas fa-car"></i>
            </div>

            <div>

                <h1>Registrar vehículo</h1>

                <p>
                    Complete la información para registrar un nuevo vehículo.
                </p>

            </div>

        </div>


        <a href="<?php echo e(route('vehiculos.index')); ?>"
           class="btn-volver">

            <i class="fas fa-arrow-left"></i>

            Volver a vehículos

        </a>

    </div>



    

    <div class="registro-card">


        

        <?php if($errors->any()): ?>

            <div class="errores">

                <strong>

                    <i class="fas fa-exclamation-circle"></i>

                    Revise los siguientes campos:

                </strong>

                <ul>

                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <li><?php echo e($error); ?></li>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>

            </div>

        <?php endif; ?>



        <form
            action="<?php echo e(route('vehiculos.store')); ?>"
            method="POST"
             enctype="multipart/form-data"
        >

            <?php echo csrf_field(); ?>



            

            <div class="registro-section">

                <div class="section-header">

                    <div class="section-icon">

                        <i class="fas fa-id-card"></i>

                    </div>

                    <div>

                        <h3>Información básica</h3>

                        <p>
                            Identificación general del vehículo
                        </p>

                    </div>

                </div>


                <div class="form-grid">


                    

                    <div class="campo">

                        <label>
                            Placa <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="placa"
                            class="placa-input"
                            maxlength="10"
                            placeholder="Ej: ABC123"
                            value="<?php echo e(old('placa')); ?>"
                            required
                        >

                    </div>



                    

                    <div class="campo">

                        <label>
                            Tipo de vehículo
                            <span class="required">*</span>
                        </label>

                        <select
                            name="tipo_vehiculo"
                            required
                        >

                            <option value="">
                                Seleccione...
                            </option>

                            <option value="Automóvil"
                                <?php echo e(old('tipo_vehiculo') == 'Automóvil' ? 'selected' : ''); ?>>
                                Automóvil
                            </option>

                            <option value="Camioneta"
                                <?php echo e(old('tipo_vehiculo') == 'Camioneta' ? 'selected' : ''); ?>>
                                Camioneta
                            </option>

                            <option value="Motocicleta"
                                <?php echo e(old('tipo_vehiculo') == 'Motocicleta' ? 'selected' : ''); ?>>
                                Motocicleta
                            </option>

                            <option value="Camión"
                                <?php echo e(old('tipo_vehiculo') == 'Camión' ? 'selected' : ''); ?>>
                                Camión
                            </option>

                        </select>

                    </div>



                    

                    <div class="campo">

                        <label>
                            Marca <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="marca"
                            placeholder="Ej: Toyota"
                            value="<?php echo e(old('marca')); ?>"
                            required
                        >

                    </div>



                    

                    <div class="campo">

                        <label>
                            Línea <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="linea"
                            placeholder="Ej: Hilux"
                            value="<?php echo e(old('linea')); ?>"
                            required
                        >

                    </div>



                    

                    <div class="campo">

                        <label>
                            Modelo <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="modelo"
                            placeholder="Ej: 2024"
                            value="<?php echo e(old('modelo')); ?>"
                            required
                        >

                        <small>
                            El modelo corresponde al año/modelo del vehículo.
                        </small>

                    </div>



                    

                    <div class="campo">

                        <label>
                            Color <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            name="color"
                            placeholder="Ej: Blanco"
                            value="<?php echo e(old('color')); ?>"
                            required
                        >

                    </div>


                </div>

            </div>



            

            <div class="registro-section">

                <div class="section-header">

                    <div class="section-icon">

                        <i class="fas fa-shield-alt"></i>

                    </div>

                    <div>

                        <h3>Protección y servicio</h3>

                        <p>
                            Clasificación operativa y características de protección
                        </p>

                    </div>

                </div>


                <div class="form-grid">


                    

                    <div class="campo">

                        <label>

                            Tipo de protección

                            <span class="required">*</span>

                        </label>

                        <select
                            name="tipo_proteccion"
                            id="tipoProteccion"
                            required
                        >

                            <option value="">
                                Seleccione...
                            </option>

                            <option value="Convencional"
                                <?php echo e(old('tipo_proteccion', 'Convencional') == 'Convencional' ? 'selected' : ''); ?>>
                                Convencional
                            </option>

                            <option value="Blindado"
                                <?php echo e(old('tipo_proteccion') == 'Blindado' ? 'selected' : ''); ?>>
                                Blindado
                            </option>

                        </select>

                    </div>



                    

                    <div
                        class="campo campo-condicional"
                        id="nivelBlindajeBox"
                    >

                        <label>

                            Nivel de blindaje

                            <span class="required">*</span>

                        </label>

                        <select
                            name="nivel_blindaje"
                            id="nivelBlindaje"
                        >

                            <option value="">
                                Seleccione...
                            </option>

                            <option value="IIIA"
                                <?php echo e(old('nivel_blindaje') == 'IIIA' ? 'selected' : ''); ?>>
                                IIIA
                            </option>

                            <option value="II"
                                <?php echo e(old('nivel_blindaje') == 'II' ? 'selected' : ''); ?>>
                                II
                            </option>

                            <option value="III"
                                <?php echo e(old('nivel_blindaje') == 'III' ? 'selected' : ''); ?>>
                                III
                            </option>

                            <option value="IV"
                                <?php echo e(old('nivel_blindaje') == 'IV' ? 'selected' : ''); ?>>
                                IV
                            </option>

                            <option value="V"
                                <?php echo e(old('nivel_blindaje') == 'V' ? 'selected' : ''); ?>>
                                V
                            </option>

                        </select>

                    </div>



                    

                    <div class="campo">

                        <label>

                            Clase de servicio

                            <span class="required">*</span>

                        </label>

                        <select
                            name="clase_servicio"
                            required
                        >

                            <option value="">
                                Seleccione...
                            </option>

                            <option value="Misional"
                                <?php echo e(old('clase_servicio') == 'Misional' ? 'selected' : ''); ?>>
                                Misional
                            </option>

                            <option value="Administrativo"
                                <?php echo e(old('clase_servicio') == 'Administrativo' ? 'selected' : ''); ?>>
                                Administrativo
                            </option>

                        </select>

                    </div>


                </div>



                <div class="info-box">

                    <i class="fas fa-info-circle"></i>

                    <div>

                        <strong>Tipo de protección:</strong>

                        Si selecciona <strong>Blindado</strong>,
                        podrá registrar el nivel de blindaje.
                        Si selecciona <strong>Convencional</strong>,
                        este campo no será requerido.

                    </div>

                </div>

            </div>



            

            <div class="registro-section">

                <div class="section-header">

                    <div class="section-icon">

                        <i class="fas fa-cogs"></i>

                    </div>

                    <div>

                        <h3>Datos técnicos</h3>

                        <p>
                            Información de identificación y características mecánicas
                        </p>

                    </div>

                </div>


                <div class="form-grid">


                    

                    <div class="campo">

                        <label>

                            VIN <span class="required">*</span>

                        </label>

                        <input
                            type="text"
                            name="vin"
                            class="vin-input"
                            maxlength="17"
                            minlength="17"
                            placeholder="17 caracteres"
                            value="<?php echo e(old('vin')); ?>"
                            required
                        >

                        <small>
                            Código de identificación de 17 caracteres.
                        </small>

                    </div>



                    

                    <div class="campo">

                        <label>

                            Número de motor

                            <span class="required">*</span>

                        </label>

                        <input
                            type="text"
                            name="motor"
                            placeholder="Ej: 2GD-1234567"
                            value="<?php echo e(old('motor')); ?>"
                            required
                        >

                    </div>



                    

                    <div class="campo">

                        <label>

                            Cilindraje

                            <span class="required">*</span>

                        </label>

                        <input
                            type="number"
                            name="cilindraje"
                            min="50"
                            max="10000"
                            placeholder="Ej: 2800"
                            value="<?php echo e(old('cilindraje')); ?>"
                            required
                        >

                        <small>
                            Cilindraje expresado en cc.
                        </small>

                    </div>



                    

                    <div class="campo">

                        <label>

                            Combustible

                            <span class="required">*</span>

                        </label>

                        <select
                            name="combustible"
                            required
                        >

                            <option value="">
                                Seleccione...
                            </option>

                            <option value="Gasolina"
                                <?php echo e(old('combustible') == 'Gasolina' ? 'selected' : ''); ?>>
                                Gasolina
                            </option>

                            <option value="Diésel"
                                <?php echo e(old('combustible') == 'Diésel' ? 'selected' : ''); ?>>
                                Diésel
                            </option>

                            <option value="Gas"
                                <?php echo e(old('combustible') == 'Gas' ? 'selected' : ''); ?>>
                                Gas
                            </option>

                            <option value="Híbrido"
                                <?php echo e(old('combustible') == 'Híbrido' ? 'selected' : ''); ?>>
                                Híbrido
                            </option>

                            <option value="Eléctrico"
                                <?php echo e(old('combustible') == 'Eléctrico' ? 'selected' : ''); ?>>
                                Eléctrico
                            </option>

                        </select>

                    </div>



                    

                    <div class="campo">

                        <label>

                            Transmisión

                            <span class="required">*</span>

                        </label>

                        <select
                            name="transmision"
                            required
                        >

                            <option value="">
                                Seleccione...
                            </option>

                            <option value="Manual"
                                <?php echo e(old('transmision') == 'Manual' ? 'selected' : ''); ?>>
                                Manual
                            </option>

                            <option value="Automática"
                                <?php echo e(old('transmision') == 'Automática' ? 'selected' : ''); ?>>
                                Automática
                            </option>

                            <option value="CVT"
                                <?php echo e(old('transmision') == 'CVT' ? 'selected' : ''); ?>>
                                CVT
                            </option>

                        </select>

                    </div>


                </div>

            </div>



            

            <div class="registro-section">

                <div class="section-header">

                    <div class="section-icon">

                        <i class="fas fa-tools"></i>

                    </div>

                    <div>

                        <h3>Equipamiento del vehículo</h3>

                        <p>
                            Elementos y características adicionales
                        </p>

                    </div>

                </div>


                <div class="form-grid">


                    

                    <div class="campo">

                        <label>

                            ¿Tiene AdBlue?

                            <span class="required">*</span>

                        </label>

                        <select
                            name="tiene_adblue"
                            id="tieneAdblue"
                            required
                        >

                            <option value="">
                                Seleccione...
                            </option>

                            <option value="0"
                                <?php echo e(old('tiene_adblue') === '0' ? 'selected' : ''); ?>>
                                No
                            </option>

                            <option value="1"
                                <?php echo e(old('tiene_adblue') === '1' ? 'selected' : ''); ?>>
                                Sí
                            </option>

                        </select>

                    </div>



                    

                    <div
                        class="campo campo-condicional"
                        id="nivelAdblueBox"
                    >

                        <label>

                            Nivel de AdBlue (%)

                            <span class="required">*</span>

                        </label>

                        <input
                            type="number"
                            name="nivel_adblue"
                            id="nivelAdblue"
                            min="0"
                            max="100"
                            step="0.01"
                            placeholder="Ej: 80"
                            value="<?php echo e(old('nivel_adblue')); ?>"
                        >

                        <small>
                            Registre el nivel aproximado entre 0 y 100%.
                        </small>

                    </div>



                    

                    <div class="campo">

                        <label>

                            ¿Tiene kit de carretera?

                            <span class="required">*</span>

                        </label>

                        <select
                            name="kit_carretera"
                            required
                        >

                            <option value="">
                                Seleccione...
                            </option>

                            <option value="0"
                                <?php echo e(old('kit_carretera') === '0' ? 'selected' : ''); ?>>
                                No
                            </option>

                            <option value="1"
                                <?php echo e(old('kit_carretera') === '1' ? 'selected' : ''); ?>>
                                Sí
                            </option>

                        </select>

                    </div>



                    

                    <div class="campo">

                        <label>

                            Vencimiento del extintor

                        </label>

                        <input
                            type="date"
                            name="fecha_vencimiento_extintor"
                            min="<?php echo e(date('Y-m-d')); ?>"
                            value="<?php echo e(old('fecha_vencimiento_extintor')); ?>"
                        >

                        <div class="extintor-info">

                            <i class="fas fa-fire-extinguisher"></i>

                            Se generarán alertas cuando esté próximo a vencer.

                        </div>

                    </div>


                </div>

            </div>





            

            <div class="registro-section">

                <div class="section-header">

                    <div class="section-icon">
                        <i class="fas fa-file-shield"></i>
                    </div>

                    <div>
                        <h3>SOAT y Tecnomecánica</h3>
                        <p>Registre la vigencia y el soporte documental del vehículo.</p>
                    </div>

                </div>

                <div class="form-grid">

                    
                    <div class="campo">
                        <label>¿Tiene SOAT? <span class="required">*</span></label>
                        <select name="tiene_soat" id="tieneSoat" required>
                            <option value="">Seleccione...</option>
                            <option value="0" <?php echo e(old('tiene_soat') === '0' ? 'selected' : ''); ?>>No</option>
                            <option value="1" <?php echo e(old('tiene_soat') === '1' ? 'selected' : ''); ?>>Sí</option>
                        </select>
                    </div>

                    <div class="campo campo-condicional" id="soatDatosBox">
                        <label>Aseguradora</label>
                        <input type="text" name="soat_aseguradora" maxlength="150"
                               placeholder="Ej: SURA"
                               value="<?php echo e(old('soat_aseguradora')); ?>">
                    </div>

                    <div class="campo campo-condicional" id="soatDatosBox2">
                        <label>Número de póliza</label>
                        <input type="text" name="soat_numero_poliza" maxlength="100"
                               value="<?php echo e(old('soat_numero_poliza')); ?>">
                    </div>

                    <div class="campo campo-condicional" id="soatDatosBox3">
                        <label>Fecha de vencimiento</label>
                        <input type="date" name="soat_fecha_vencimiento"
                               min="<?php echo e(date('Y-m-d')); ?>"
                               value="<?php echo e(old('soat_fecha_vencimiento')); ?>">
                    </div>

                    <div class="campo campo-condicional" id="soatDatosBox4">
                        <label>Archivo SOAT</label>
                        <input type="file" name="soat_archivo" accept=".pdf,.jpg,.jpeg,.png">
                        <small>PDF o imagen. Máximo 5 MB.</small>
                    </div>

                    
                    <div class="campo">
                        <label>¿Tiene tecnomecánica? <span class="required">*</span></label>
                        <select name="tiene_tecnomecanica" id="tieneTecno" required>
                            <option value="">Seleccione...</option>
                            <option value="0" <?php echo e(old('tiene_tecnomecanica') === '0' ? 'selected' : ''); ?>>No</option>
                            <option value="1" <?php echo e(old('tiene_tecnomecanica') === '1' ? 'selected' : ''); ?>>Sí</option>
                        </select>
                    </div>

                    <div class="campo campo-condicional" id="tecnoDatosBox">
                        <label>Fecha de expedición</label>
                        <input type="date" name="tecno_fecha_expedicion"
                               max="<?php echo e(date('Y-m-d')); ?>"
                               value="<?php echo e(old('tecno_fecha_expedicion')); ?>">
                    </div>

                    <div class="campo campo-condicional" id="tecnoDatosBox2">
                        <label>Fecha de vencimiento</label>
                        <input type="date" name="tecno_fecha_vencimiento"
                               min="<?php echo e(date('Y-m-d')); ?>"
                               value="<?php echo e(old('tecno_fecha_vencimiento')); ?>">
                    </div>

                    <div class="campo campo-condicional" id="tecnoDatosBox3">
                        <label>Centro de diagnóstico</label>
                        <input type="text" name="tecno_centro_diagnostico" maxlength="150"
                               value="<?php echo e(old('tecno_centro_diagnostico')); ?>">
                    </div>

                    <div class="campo campo-condicional" id="tecnoDatosBox4">
                        <label>Número de certificado</label>
                        <input type="text" name="tecno_numero_certificado" maxlength="100"
                               value="<?php echo e(old('tecno_numero_certificado')); ?>">
                    </div>

                    <div class="campo campo-condicional" id="tecnoDatosBox5">
                        <label>Archivo tecnomecánica</label>
                        <input type="file" name="tecno_archivo" accept=".pdf,.jpg,.jpeg,.png">
                        <small>PDF o imagen. Máximo 5 MB.</small>
                    </div>

                </div>

                <div class="info-box">
                    <i class="fas fa-bell"></i>
                    <div>
                        <strong>Alertas:</strong>
                        las fechas de vencimiento de SOAT y tecnomecánica quedarán disponibles para generar alertas en el Dashboard.
                    </div>
                </div>

            </div>

            

            <div class="registro-section">

                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-folder-open"></i>
                    </div>
                    <div>
                        <h3>Documentos y fotografía</h3>
                        <p>Cargue los soportes que quedarán asociados al vehículo.</p>
                    </div>
                </div>

                <div class="form-grid-2">

                    <div class="campo">
                        <label>Tarjeta de propiedad</label>
                        <input type="file" name="tarjeta_archivo" accept=".pdf,.jpg,.jpeg,.png">
                        <small>PDF o imagen. El número de tarjeta se registra arriba.</small>
                    </div>

                    <div class="campo">
                        <label>Foto del vehículo</label>
                        <input type="file" name="foto_archivo" accept=".jpg,.jpeg,.png,.webp">
                        <small>La fotografía quedará guardada en el expediente.</small>
                    </div>

                </div>

            </div>

            

            <div class="registro-section">

                <div class="section-header">

                    <div class="section-icon">

                        <i class="fas fa-map-marker-alt"></i>

                    </div>

                    <div>

                        <h3>Estado y ubicación</h3>

                        <p>
                            Información operativa y regional del vehículo
                        </p>

                    </div>

                </div>


                <div class="form-grid">


                    

                    <div class="campo">

                        <label>

                            Estado

                            <span class="required">*</span>

                        </label>

                        <select
                            name="estado"
                            required
                        >

                            <option value="Disponible"
                                <?php echo e(old('estado', 'Disponible') == 'Disponible' ? 'selected' : ''); ?>>
                                Disponible
                            </option>

                            <option value="Prestado"
                                <?php echo e(old('estado') == 'Prestado' ? 'selected' : ''); ?>>
                                Prestado
                            </option>

                            <option value="Mantenimiento"
                                <?php echo e(old('estado') == 'Mantenimiento' ? 'selected' : ''); ?>>
                                Mantenimiento
                            </option>

                        </select>

                    </div>



                    

                    <div class="campo">

                        <label>

                            Regional

                            <span class="required">*</span>

                        </label>

                        <select
                            name="regional"
                            required
                        >

                            <option value="">
                                Seleccione...
                            </option>

                            <option value="Neiva"
                                <?php echo e(old('regional', 'Neiva') == 'Neiva' ? 'selected' : ''); ?>>
                                Neiva
                            </option>

                            <option value="Ibagué"
                                <?php echo e(old('regional') == 'Ibagué' ? 'selected' : ''); ?>>
                                Ibagué
                            </option>

                        </select>

                    </div>



                    

                    <div class="campo">

                        <label>

                            Fecha de Compra
                            <span class="required">*</span>

                        </label>

                        <input
                            type="date"
                            name="fecha_llegada_regional"
                            max="<?php echo e(date('Y-m-d')); ?>"
                            value="<?php echo e(old('fecha_llegada_regional')); ?>"
                            required
                        >

                        <small>
                            Fecha desde la cual el vehículo pertenece a esta regional.
                        </small>

                    </div>


                </div>

            </div>



            

            <div class="registro-section">

                <div class="section-header">

                    <div class="section-icon">

                        <i class="fas fa-file-alt"></i>

                    </div>

                    <div>

                        <h3>Información administrativa</h3>

                        <p>
                            Datos de propiedad y registro del vehículo
                        </p>

                    </div>

                </div>


                <div class="form-grid-2">


                    

                    <div class="campo">

                        <label>

                            Número de tarjeta de propiedad

                            <span class="required">*</span>

                        </label>

                        <input
                            type="text"
                            name="tarjeta_propiedad"
                            maxlength="30"
                            placeholder="Número de tarjeta"
                            value="<?php echo e(old('tarjeta_propiedad')); ?>"
                            required
                        >

                    </div>



                    

                    <div class="campo">

                        <label>

                            Fecha de compra

                            <span class="required">*</span>

                        </label>

                        <input
                            type="date"
                            name="fecha_compra"
                            max="<?php echo e(date('Y-m-d')); ?>"
                            value="<?php echo e(old('fecha_compra')); ?>"
                            required
                        >

                    </div>


                </div>

            </div>



            

            <div class="registro-footer">


                <a
                    href="<?php echo e(route('vehiculos.index')); ?>"
                    class="btn-cancelar"
                >

                    <i class="fas fa-times"></i>

                    Cancelar

                </a>


                <button
                    type="submit"
                    class="btn-guardar"
                >

                    <i class="fas fa-save"></i>

                    Guardar vehículo

                </button>


            </div>


        </form>

    </div>

</div>



<script>

document.addEventListener('DOMContentLoaded', function () {


    /* ==========================================================
       TIPO DE PROTECCIÓN
    ========================================================== */

    const tipoProteccion =
        document.getElementById('tipoProteccion');

    const nivelBlindajeBox =
        document.getElementById('nivelBlindajeBox');

    const nivelBlindaje =
        document.getElementById('nivelBlindaje');


    function actualizarBlindaje() {

        if (tipoProteccion.value === 'Blindado') {

            nivelBlindajeBox.classList.add('mostrar');

            nivelBlindaje.required = true;

        } else {

            nivelBlindajeBox.classList.remove('mostrar');

            nivelBlindaje.required = false;

            nivelBlindaje.value = '';

        }

    }


    tipoProteccion.addEventListener(
        'change',
        actualizarBlindaje
    );


    actualizarBlindaje();



    /* ==========================================================
       ADBLUE
    ========================================================== */

    const tieneAdblue =
        document.getElementById('tieneAdblue');

    const nivelAdblueBox =
        document.getElementById('nivelAdblueBox');

    const nivelAdblue =
        document.getElementById('nivelAdblue');


    function actualizarAdblue() {

        if (tieneAdblue.value === '1') {

            nivelAdblueBox.classList.add('mostrar');

            nivelAdblue.required = true;

        } else {

            nivelAdblueBox.classList.remove('mostrar');

            nivelAdblue.required = false;

            nivelAdblue.value = '';

        }

    }


    tieneAdblue.addEventListener(
        'change',
        actualizarAdblue
    );


    actualizarAdblue();


    /* ==========================================================
       SOAT Y TECNOMECÁNICA
    ========================================================== */

    const tieneSoat = document.getElementById('tieneSoat');
    const soatBoxes = [
        'soatDatosBox','soatDatosBox2','soatDatosBox3','soatDatosBox4'
    ].map(id => document.getElementById(id));

    function actualizarSoat() {
        const mostrar = tieneSoat.value === '1';
        soatBoxes.forEach(box => {
            if (!box) return;
            box.classList.toggle('mostrar', mostrar);
            const input = box.querySelector('input');
            if (input) input.disabled = !mostrar;
        });
    }

    tieneSoat.addEventListener('change', actualizarSoat);
    actualizarSoat();

    const tieneTecno = document.getElementById('tieneTecno');
    const tecnoBoxes = [
        'tecnoDatosBox','tecnoDatosBox2','tecnoDatosBox3','tecnoDatosBox4','tecnoDatosBox5'
    ].map(id => document.getElementById(id));

    function actualizarTecno() {
        const mostrar = tieneTecno.value === '1';
        tecnoBoxes.forEach(box => {
            if (!box) return;
            box.classList.toggle('mostrar', mostrar);
            const input = box.querySelector('input');
            if (input) input.disabled = !mostrar;
        });
    }

    tieneTecno.addEventListener('change', actualizarTecno);
    actualizarTecno();


});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\GestionVehiculos\resources\views/vehiculos/create.blade.php ENDPATH**/ ?>