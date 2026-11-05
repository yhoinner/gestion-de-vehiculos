<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Sistema Gestión Vehicular</title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>

*{

margin:0;

padding:0;

box-sizing:border-box;

font-family:'Poppins',sans-serif;

}

body{

display:flex;

justify-content:center;

align-items:center;

min-height:100vh;

background:linear-gradient(135deg,#0d47a1,#1565c0,#1e88e5);

overflow:hidden;

position:relative;

}

body::before{

content:'';

position:absolute;

width:700px;

height:700px;

background:rgba(255,255,255,.05);

border-radius:50%;

top:-220px;

left:-180px;

filter:blur(30px);

}

body::after{

content:'';

position:absolute;

width:600px;

height:600px;

background:rgba(255,255,255,.04);

border-radius:50%;

bottom:-180px;

right:-150px;

filter:blur(30px);

} 

.login-box{

position:relative;

width:430px;

padding:45px;

border-radius:28px;

background:rgba(255,255,255,.12);

backdrop-filter:blur(25px);

-webkit-backdrop-filter:blur(25px);

border:1px solid rgba(255,255,255,.20);

box-shadow:0 20px 60px rgba(0,0,0,.35);

z-index:10;

}

.logo{

width:95px;

height:95px;

border-radius:50%;

margin:auto;

display:flex;

justify-content:center;

align-items:center;

background:linear-gradient(135deg,#4facfe,#0066ff);

box-shadow:0 15px 35px rgba(0,102,255,.45);

color:white;

font-size:42px;

}

h1{

margin-top:25px;

text-align:center;

color:white;

font-size:34px;

font-weight:700;

}

.subtitulo{

text-align:center;

color:#dbeafe;

margin-top:10px;

margin-bottom:35px;

font-size:15px;

}

.input-group{

    margin-bottom:22px;

}

.input-group label{

    display:block;

    color:#ffffff;

    font-size:14px;

    font-weight:500;

    margin-bottom:8px;

}

.input-group label i{

    margin-right:8px;

    color:#7dd3fc;

}

.input-group input{

    width:100%;

    height:55px;

    border:none;

    outline:none;

    border-radius:14px;

    padding:0 18px;

    background:rgba(255,255,255,.12);

    color:white;

    font-size:15px;

    backdrop-filter:blur(10px);

    border:1px solid rgba(255,255,255,.18);

    transition:.30s;

}

.input-group input::placeholder{

    color:#dbeafe;

}

.input-group input:focus{

    border:1px solid #7dd3fc;

    box-shadow:0 0 20px rgba(125,211,252,.35);

}

.password-box{

    position:relative;

}

.password-box input{

    padding-right:55px;

}

.password-box button{

    position:absolute;

    right:15px;

    top:50%;

    transform:translateY(-50%);

    border:none;

    background:none;

    color:white;

    cursor:pointer;

    font-size:18px;

}

.remember-row{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin:25px 0;

    color:white;

    font-size:14px;

}

.remember-row a{

    color:#7dd3fc;

    text-decoration:none;

}

.remember-row a:hover{

    text-decoration:underline;

}

.btn-login{

    width:100%;

    height:58px;

    border:none;

    border-radius:14px;

    background:linear-gradient(135deg,#2196F3,#1565C0);

    color:white;

    font-size:18px;

    font-weight:600;

    cursor:pointer;

    transition:.35s;

}

.btn-login:hover{

    transform:translateY(-3px);

    box-shadow:0 15px 35px rgba(33,150,243,.45);

}

.btn-login i{

    margin-left:10px;

}

.error{

    display:block;

    margin-top:8px;

    color:#fecaca;

    font-size:13px;

}

.alert-success{

    background:#22c55e;

    color:white;

    padding:12px;

    border-radius:10px;

    margin-bottom:20px;

}

@media(max-width:520px){

.login-box{

width:95%;

padding:35px 25px;

}

h1{

font-size:28px;

}

.logo{

width:80px;

height:80px;

font-size:34px;

}

}


<?php echo e($slot); ?>


</style>

</head>

<body>

<div class="login-box">

<div class="logo">

<i class="fas fa-car-side"></i>

</div>

<h1>Sistema Gestión Vehicular</h1>

<p class="subtitulo">

Unidad Nacional de Protección

</p>
<form method="POST" action="<?php echo e(route('login')); ?>">

    <?php echo csrf_field(); ?>

    <?php if(session('status')): ?>

        <div class="alert-success">

            <?php echo e(session('status')); ?>


        </div>

    <?php endif; ?>

    <div class="input-group">

        <label>

            <i class="fa-solid fa-envelope"></i>

            Correo electrónico

        </label>

        <input
            type="email"
            name="email"
            value="<?php echo e(old('email')); ?>"
            placeholder="Ingrese su correo"
            required
            autofocus
        >

        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

            <small class="error">

                <?php echo e($message); ?>


            </small>

        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    </div>

    <div class="input-group">

        <label>

            <i class="fa-solid fa-lock"></i>

            Contraseña

        </label>

        <div class="password-box">

            <input
                id="password"
                type="password"
                name="password"
                placeholder="Ingrese su contraseña"
                required
            >

            <button
                type="button"
                id="togglePassword">

                <i class="fa-solid fa-eye"></i>

            </button>

        </div>

        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>

            <small class="error">

                <?php echo e($message); ?>


            </small>

        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    </div>

    <div class="remember-row">

        <label>

            <input
                type="checkbox"
                name="remember">

            Recordarme

        </label>

        <?php if(Route::has('password.request')): ?>

            <a href="<?php echo e(route('password.request')); ?>">

                ¿Olvidó su contraseña?

            </a>

        <?php endif; ?>

    </div>

    <button
        class="btn-login"
        type="submit">

        Iniciar sesión

        <i class="fa-solid fa-arrow-right"></i>

    </button>

</form>
<script>

const togglePassword = document.getElementById('togglePassword');

const password = document.getElementById('password');

togglePassword.addEventListener('click',function(){

    const type=password.getAttribute('type')==='password'
    ?'text'
    :'password';

    password.setAttribute('type',type);

    this.innerHTML=type==='password'

    ?'<i class="fa-solid fa-eye"></i>'

    :'<i class="fa-solid fa-eye-slash"></i>';

});

</script>

</div>

</body>

</html><?php /**PATH C:\laragon\www\GestionVehiculos\resources\views/layouts/guest.blade.php ENDPATH**/ ?>