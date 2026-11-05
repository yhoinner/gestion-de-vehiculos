<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

<form method="POST" action="<?php echo e(route('login')); ?>">
    <?php echo csrf_field(); ?>

    <div class="login-header">

        <div class="logo-circle">
            <i class="fas fa-car-side"></i>
        </div>

        <h1>Sistema Gestión Vehicular</h1>

        <p>Unidad Nacional de Protección</p>

    </div>

    <?php if(session('status')): ?>
        <div class="alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <div class="mb-4">

        <label class="form-label">
            <i class="fa-solid fa-envelope"></i>
            Correo electrónico
        </label>

        <input
            type="email"
            name="email"
            value="<?php echo e(old('email')); ?>"
            class="form-control"
            placeholder="Ingrese su correo"
            required
            autofocus
        >

        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger mt-1"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    </div>

    <div class="mb-4">

        <label class="form-label">
            <i class="fa-solid fa-lock"></i>
            Contraseña
        </label>

        <div class="password-box">

            <input
                id="password"
                type="password"
                name="password"
                class="form-control"
                placeholder="Ingrese su contraseña"
                required
            >

            <button
                type="button"
                id="togglePassword"
                class="password-toggle">

                <i class="fa-solid fa-eye"></i>

            </button>

        </div>

        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="text-danger mt-1"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    </div>

    <div class="remember-row">

        <label class="remember">

            <input type="checkbox" name="remember">

            Recordarme

        </label>

        <?php if(Route::has('password.request')): ?>
            <a href="<?php echo e(route('password.request')); ?>">
                ¿Olvidó su contraseña?
            </a>
        <?php endif; ?>

    </div>

    <button class="login-button">

        Iniciar sesión

        <i class="fa-solid fa-arrow-right"></i>

    </button>

</form>

<style>

.login-header{

    text-align:center;

    margin-bottom:35px;

}

.logo-circle{

    width:90px;

    height:90px;

    margin:auto;

    border-radius:50%;

    background:linear-gradient(135deg,#2563eb,#0f4c81);

    display:flex;

    justify-content:center;

    align-items:center;

    color:white;

    font-size:40px;

    box-shadow:0 15px 35px rgba(37,99,235,.45);

}

.login-header h1{

    margin-top:20px;

    margin-bottom:8px;

    color:white;

    font-size:32px;

    font-weight:700;

}

.login-header p{

    color:#dbeafe;

    font-size:15px;

}

.form-label{

    color:white;

    font-weight:600;

    margin-bottom:8px;

    display:block;

}

.form-control{

    width:100%;

    height:55px;

    border:none;

    border-radius:14px;

    background:rgba(255,255,255,.15);

    color:white;

    padding:0 18px;

    font-size:15px;

    outline:none;

    backdrop-filter:blur(12px);

}

.form-control::placeholder{

    color:#d1d5db;

}

.form-control:focus{

    border:2px solid #60a5fa;

    background:rgba(255,255,255,.22);

}

.password-box{

    position:relative;

}

.password-toggle{

    position:absolute;

    top:50%;

    right:15px;

    transform:translateY(-50%);

    background:none;

    border:none;

    color:white;

    cursor:pointer;

    font-size:18px;

}

.remember-row{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-top:18px;

    margin-bottom:25px;

    font-size:14px;

}

.remember{

    color:white;

}

.remember-row a{

    color:#93c5fd;

    text-decoration:none;

}

.remember-row a:hover{

    text-decoration:underline;

}

.login-button{

    width:100%;

    height:58px;

    border:none;

    border-radius:14px;

    background:linear-gradient(135deg,#3b82f6,#2563eb);

    color:white;

    font-size:18px;

    font-weight:600;

    cursor:pointer;

    transition:.30s;

}

.login-button:hover{

    transform:translateY(-3px);

    box-shadow:0 15px 35px rgba(37,99,235,.45);

}

.alert-success{

    background:#16a34a;

    color:white;

    padding:12px;

    border-radius:10px;

    margin-bottom:20px;

}

.text-danger{

    color:#fecaca;

    font-size:13px;

    margin-top:6px;

}

@media(max-width:768px){

    .login-header h1{

        font-size:26px;

    }

    .logo-circle{

        width:75px;

        height:75px;

        font-size:32px;

    }

}

</style>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\GestionVehiculos\resources\views/auth/login.blade.php ENDPATH**/ ?>