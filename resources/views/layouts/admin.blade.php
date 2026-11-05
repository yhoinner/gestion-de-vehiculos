<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UNP - Sistema de Gestión Vehicular</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>

        /* =====================================================
           CONFIGURACIÓN GENERAL
        ===================================================== */

        :root {

            --azul-oscuro: #071a41;
            --azul-sidebar: #0b2252;
            --azul: #2563eb;
            --azul-claro: #3b82f6;

            --fondo: #f4f7fb;
            --blanco: #ffffff;

            --texto: #172033;
            --texto-secundario: #64748b;

            --borde: #e5eaf2;

            --verde: #16a34a;
            --rojo: #ef4444;
            --amarillo: #f59e0b;

            --sidebar-width: 285px;

            --sombra:
                0 10px 30px rgba(15, 23, 42, .07);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {

            min-height: 100vh;

            background:
                radial-gradient(
                    circle at 80% 10%,
                    rgba(59,130,246,.08),
                    transparent 28%
                ),
                #f4f7fb;

            color: var(--texto);

            font-family: 'Inter', sans-serif;

            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {

            width: var(--sidebar-width);

            height: 100vh;

            position: fixed;

            left: 0;
            top: 0;

            z-index: 1000;

            display: flex;

            flex-direction: column;

            background:
                linear-gradient(
                    180deg,
                    #06183b 0%,
                    #0a2353 55%,
                    #0c2d66 100%
                );

            color: white;

            box-shadow:
                8px 0 30px rgba(2, 12, 35, .18);

            transition: .3s ease;

            overflow-y: auto;

            scrollbar-width: thin;
        }

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,.2);
            border-radius: 10px;
        }


        /* =====================================================
           LOGO
        ===================================================== */

        .logo {

            padding: 28px 22px 24px;

            border-bottom:
                1px solid rgba(255,255,255,.08);
        }

        .logo-content {

            display: flex;

            align-items: center;

            gap: 14px;
        }

        .logo-icon {

            width: 52px;
            height: 52px;

            flex-shrink: 0;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 16px;

            background:
                linear-gradient(
                    135deg,
                    #3b82f6,
                    #1d4ed8
                );

            box-shadow:
                0 8px 22px rgba(37,99,235,.35);

            font-size: 23px;
        }

        .logo-text h2 {

            color: white;

            font-size: 27px;

            line-height: 1;

            font-weight: 800;

            letter-spacing: .5px;

            margin-bottom: 6px;
        }

        .logo-text span {

            color: #bfdbfe;

            font-size: 12px;

            font-weight: 500;
        }

        .logo-subtitle {

            margin-top: 12px;

            color: #94a3b8;

            font-size: 11px;

            line-height: 1.5;
        }


        /* =====================================================
           MENÚ
        ===================================================== */

        .menu {

            flex: 1;

            padding: 20px 13px;
        }

        .menu-title {

            padding:
                8px 14px
                10px;

            color: #64748b;

            font-size: 10px;

            font-weight: 700;

            text-transform: uppercase;

            letter-spacing: 1.2px;
        }

        .menu a,
        .dropdown-btn {

            width: 100%;

            display: flex;

            align-items: center;

            gap: 13px;

            padding: 13px 15px;

            margin-bottom: 5px;

            border-radius: 12px;

            color: #dbeafe;

            background: transparent;

            font-size: 14px;

            font-weight: 500;

            transition:
                background .25s ease,
                color .25s ease,
                transform .25s ease;

            cursor: pointer;

            border: none;
        }

        .menu a i,
        .dropdown-btn i:first-child {

            width: 22px;

            text-align: center;

            font-size: 16px;

            color: #bfdbfe;

            transition: .25s;
        }

        .menu a:hover,
        .dropdown-btn:hover {

            color: white;

            background:
                rgba(59,130,246,.14);

            transform: translateX(3px);
        }

        .menu a:hover i,
        .dropdown-btn:hover i:first-child {

            color: #60a5fa;
        }

        .menu a.active {

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #2563eb,
                    #1d4ed8
                );

            box-shadow:
                0 8px 20px
                rgba(37,99,235,.28);
        }

        .menu a.active i {

            color: white;
        }


        /* =====================================================
           REPORTES
        ===================================================== */

        .dropdown-btn {

            justify-content: flex-start;
        }

        .dropdown-btn .flecha {

            width: auto;

            margin-left: auto;

            color: #94a3b8;

            font-size: 11px;

            transition: transform .25s ease;
        }

        .dropdown-btn.active .flecha {

            transform: rotate(90deg);

            color: white;
        }

        .submenu {

            display: none;

            padding: 4px 0 8px;

            margin: 0 6px 5px;

            background:
                rgba(2,12,35,.25);

            border-radius: 12px;
        }

        .submenu.show {

            display: block;

            animation:
                submenuEntrada .2s ease;
        }

        @keyframes submenuEntrada {

            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .submenu a {

            padding:
                10px 13px
                10px 40px;

            margin: 2px 0;

            font-size: 13px;

            border-radius: 9px;
        }

        .submenu a i {

            font-size: 13px;
        }

        .menu-divider {

            height: 1px;

            margin: 15px 10px;

            background:
                rgba(255,255,255,.08);
        }


        /* =====================================================
           USUARIO DEL SIDEBAR
        ===================================================== */

        .sidebar-user {

            margin: 8px 13px 15px;

            padding: 14px;

            display: flex;

            align-items: center;

            gap: 11px;

            background:
                rgba(255,255,255,.07);

            border:
                1px solid rgba(255,255,255,.08);

            border-radius: 15px;
        }

        .user-avatar {

            width: 42px;
            height: 42px;

            flex-shrink: 0;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background:
                linear-gradient(
                    135deg,
                    #60a5fa,
                    #2563eb
                );

            color: white;

            font-size: 18px;
        }

        .user-info {

            min-width: 0;
        }

        .user-info strong {

            display: block;

            color: white;

            font-size: 13px;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;
        }

        .user-info span {

            display: block;

            color: #94a3b8;

            font-size: 11px;

            margin-top: 3px;

            white-space: nowrap;

            overflow: hidden;

            text-overflow: ellipsis;
        }


        /* =====================================================
           CERRAR SESIÓN
        ===================================================== */

        .logout {

            width: calc(100% - 26px);

            margin:
                0 13px 18px;

            padding: 13px 15px;

            display: flex;

            align-items: center;

            gap: 13px;

            color: #fecaca;

            background:
                transparent;

            border:
                1px solid rgba(248,113,113,.15);

            border-radius: 12px;

            font-size: 14px;

            font-weight: 500;

            text-align: left;

            cursor: pointer;

            transition: .25s;
        }

        .logout:hover {

            color: white;

            background:
                rgba(239,68,68,.15);

            border-color:
                rgba(239,68,68,.3);
        }


        /* =====================================================
           CONTENIDO PRINCIPAL
        ===================================================== */

        .content {

            min-height: 100vh;

            margin-left: var(--sidebar-width);

            transition: .3s ease;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {

            height: 78px;

            padding:
                0 30px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            background:
                rgba(255,255,255,.92);

            backdrop-filter: blur(15px);

            -webkit-backdrop-filter: blur(15px);

            border-bottom:
                1px solid #e8edf4;

            box-shadow:
                0 3px 18px rgba(15,23,42,.04);

            position: sticky;

            top: 0;

            z-index: 900;
        }

        .topbar-left {

            display: flex;

            align-items: center;

            gap: 15px;
        }

        .mobile-menu {

            display: none;

            width: 40px;
            height: 40px;

            border: none;

            border-radius: 10px;

            background: #eff6ff;

            color: #2563eb;

            cursor: pointer;

            font-size: 18px;
        }

        .topbar-title h4 {

            margin: 0;

            color: #172033;

            font-size: 21px;

            font-weight: 700;
        }

        .topbar-title small {

            display: block;

            margin-top: 2px;

            color: #94a3b8;

            font-size: 11px;
        }

        .topbar-right {

            display: flex;

            align-items: center;

            gap: 18px;
        }

        .topbar-date {

            color: #64748b;

            font-size: 12px;
        }

        .topbar-user {

            display: flex;

            align-items: center;

            gap: 10px;

            padding:
                6px 10px;

            border-radius: 12px;

            background: #f8fafc;
        }

        .topbar-avatar {

            width: 37px;
            height: 37px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            color: white;

            background:
                linear-gradient(
                    135deg,
                    #3b82f6,
                    #1d4ed8
                );
        }

        .topbar-user-info strong {

            display: block;

            color: #172033;

            font-size: 12px;
        }

        .topbar-user-info span {

            color: #94a3b8;

            font-size: 10px;
        }


        /* =====================================================
           CONTENIDO
        ===================================================== */

        .main {

            padding: 28px 30px 40px;

            max-width: 1800px;

            margin: 0 auto;
        }


        /* =====================================================
           CARDS GENERALES
        ===================================================== */

        .card {

            border: 1px solid var(--borde);

            border-radius: 18px;

            background: white;

            box-shadow: var(--sombra);

            overflow: hidden;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width: 1100px) {

            :root {
                --sidebar-width: 250px;
            }

            .topbar-date {
                display: none;
            }

            .main {
                padding: 22px;
            }
        }

        @media(max-width: 768px) {

            .sidebar {

                transform: translateX(-100%);

                width: 280px;
            }

            .sidebar.mobile-open {

                transform: translateX(0);
            }

            .content {

                margin-left: 0;
            }

            .topbar {

                height: 70px;

                padding: 0 16px;
            }

            .mobile-menu {

                display: block;
            }

            .topbar-title h4 {

                font-size: 18px;
            }

            .topbar-user-info {

                display: none;
            }

            .main {

                padding: 18px 14px 30px;
            }

            .mobile-overlay {

                display: none;

                position: fixed;

                inset: 0;

                z-index: 950;

                background:
                    rgba(2,12,35,.5);

                backdrop-filter:
                    blur(3px);
            }

            .mobile-overlay.show {

                display: block;
            }
        }

        @media(max-width: 480px) {

            .topbar-right {
                gap: 5px;
            }

            .topbar-user {
                background: transparent;
                padding: 3px;
            }

            .topbar-avatar {
                width: 34px;
                height: 34px;
            }

            .main {
                padding: 15px 10px 25px;
            }
        }

    </style>

</head>


<body>


<!-- =====================================================
     SIDEBAR
===================================================== -->

<div class="sidebar" id="sidebar">

    <div class="logo">

        <div class="logo-content">

            <div class="logo-icon">

                <i class="fas fa-car-side"></i>

            </div>

            <div class="logo-text">

                <h2>UNP</h2>

                <span>Sistema Gestión Vehicular</span>

            </div>

        </div>

        <div class="logo-subtitle">

            Unidad Nacional de Protección

        </div>

    </div>


    <div class="menu">

        <div class="menu-title">
            Principal
        </div>


        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <i class="fas fa-chart-pie"></i>

            <span>Dashboard</span>

        </a>


        <a href="{{ route('vehiculos.index') }}"
           class="{{ request()->routeIs('vehiculos.*') ? 'active' : '' }}">

            <i class="fas fa-car"></i>

            <span>Vehículos</span>

        </a>


        <a href="{{ route('conductores.index') }}"
           class="{{ request()->routeIs('conductores.*') ? 'active' : '' }}">

            <i class="fas fa-users"></i>

            <span>Conductores</span>

        </a>


        <a href="{{ route('prestamos.index') }}"
           class="{{ request()->routeIs('prestamos.*') ? 'active' : '' }}">

            <i class="fas fa-key"></i>

            <span>Préstamos</span>

        </a>


        <a href="{{ route('mantenimientos.index') }}"
           class="{{ request()->routeIs('mantenimientos.*') ? 'active' : '' }}">

            <i class="fas fa-screwdriver-wrench"></i>

            <span>Mantenimientos</span>

        </a>


        <a href="{{ route('documentos.index') }}"
           class="{{ request()->routeIs('documentos.*') ? 'active' : '' }}">

            <i class="fas fa-folder-open"></i>

            <span>Documentos</span>

        </a>


        <div class="menu-title">
            Reportes
        </div>


        <div class="dropdown-btn" id="reportesBtn">

            <i class="fas fa-file-pdf"></i>

            <span>Reportes</span>

            <i class="fas fa-chevron-right flecha"></i>

        </div>


        <div class="submenu" id="reportesSubmenu">

            <a href="{{ route('reportes.vehiculos') }}">

                <i class="fas fa-car"></i>

                <span>Vehículos</span>

            </a>

            <a href="{{ route('reportes.conductores') }}">

                <i class="fas fa-users"></i>

                <span>Conductores</span>

            </a>

            <a href="{{ route('reportes.prestamos') }}">

                <i class="fas fa-key"></i>

                <span>Préstamos</span>

            </a>

            <a href="{{ route('reportes.mantenimientos') }}">

                <i class="fas fa-screwdriver-wrench"></i>

                <span>Mantenimientos</span>

            </a>

        </div>


        <div class="menu-divider"></div>

    </div>


    <!-- USUARIO -->

    <div class="sidebar-user">

        <div class="user-avatar">

            <i class="fas fa-user"></i>

        </div>

        <div class="user-info">

            <strong>
                {{ Auth::user()->name }}
            </strong>

            <span>
                Administrador
            </span>

        </div>

    </div>


    <!-- LOGOUT -->

    <form method="POST"
          action="{{ route('logout') }}">

        @csrf

        <button class="logout"
                type="submit">

            <i class="fas fa-right-from-bracket"></i>

            <span>Cerrar sesión</span>

        </button>

    </form>

</div>


<!-- OVERLAY MÓVIL -->

<div class="mobile-overlay"
     id="mobileOverlay"></div>


<!-- =====================================================
     CONTENIDO
===================================================== -->

<div class="content">


    <!-- TOPBAR -->

    <div class="topbar">


        <div class="topbar-left">

            <button class="mobile-menu"
                    id="mobileMenu">

                <i class="fas fa-bars"></i>

            </button>


            <div class="topbar-title">

                <h4>
                    @yield('titulo')
                </h4>

                <small>
                    Sistema de Gestión Vehicular
                </small>

            </div>

        </div>


        <div class="topbar-right">


            <div class="topbar-date">

                <i class="far fa-calendar"></i>

                {{ now()->format('d/m/Y') }}

            </div>


            <div class="topbar-user">

                <div class="topbar-avatar">

                    <i class="fas fa-user"></i>

                </div>

                <div class="topbar-user-info">

                    <strong>
                        {{ Auth::user()->name }}
                    </strong>

                    <span>
                        Administrador
                    </span>

                </div>

            </div>

        </div>

    </div>


    <!-- MAIN -->

    <div class="main">


        @if(session('success'))

            <script>

                document.addEventListener('DOMContentLoaded', function () {

                    Swal.fire({

                        icon: 'success',

                        title: 'Proceso exitoso',

                        text: @json(session('success')),

                        confirmButtonColor: '#2563eb',

                        borderRadius: '16px'

                    });

                });

            </script>

        @endif


        @if(session('error'))

            <script>

                document.addEventListener('DOMContentLoaded', function () {

                    Swal.fire({

                        icon: 'error',

                        title: 'Ha ocurrido un error',

                        text: @json(session('error')),

                        confirmButtonColor: '#dc2626',

                        borderRadius: '16px'

                    });

                });

            </script>

        @endif


        @yield('contenido')

    </div>

</div>


<!-- =====================================================
     BOOTSTRAP
===================================================== -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


<script>

document.addEventListener('DOMContentLoaded', function () {


    /* ==========================================
       REPORTES
    ========================================== */

    const reportesBtn =
        document.getElementById('reportesBtn');

    const reportesSubmenu =
        document.getElementById('reportesSubmenu');


    if(reportesBtn && reportesSubmenu){

        reportesBtn.addEventListener('click', function(){

            reportesSubmenu.classList.toggle('show');

            reportesBtn.classList.toggle('active');

        });

    }


    /* ==========================================
       MENÚ MÓVIL
    ========================================== */

    const mobileMenu =
        document.getElementById('mobileMenu');

    const sidebar =
        document.getElementById('sidebar');

    const mobileOverlay =
        document.getElementById('mobileOverlay');


    function abrirMenu(){

        sidebar.classList.add('mobile-open');

        mobileOverlay.classList.add('show');

    }


    function cerrarMenu(){

        sidebar.classList.remove('mobile-open');

        mobileOverlay.classList.remove('show');

    }


    if(mobileMenu){

        mobileMenu.addEventListener(
            'click',
            abrirMenu
        );

    }


    if(mobileOverlay){

        mobileOverlay.addEventListener(
            'click',
            cerrarMenu
        );

    }


    /* ==========================================
       CERRAR SIDEBAR AL TOCAR UN ENLACE
       EN CELULAR
    ========================================== */

    document
        .querySelectorAll('.sidebar a')
        .forEach(function(link){

            link.addEventListener('click', function(){

                if(window.innerWidth <= 768){

                    cerrarMenu();

                }

            });

        });


});



/* ==========================================
   CONFIRMAR ELIMINACIÓN
========================================== */

function confirmarEliminar(form){

    Swal.fire({

        title: '¿Está seguro?',

        text: 'Esta acción no se puede deshacer.',

        icon: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#dc2626',

        cancelButtonColor: '#64748b',

        confirmButtonText: 'Sí, eliminar',

        cancelButtonText: 'Cancelar',

        reverseButtons: true,

        borderRadius: '16px'

    }).then((result) => {

        if(result.isConfirmed){

            form.submit();

        }

    });

}

</script>


</body>

</html>