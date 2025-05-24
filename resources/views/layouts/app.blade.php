<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Fuente local -->
    <style>
        @font-face {
            font-family: 'Bebas Neue';
            src: url('{{ asset('fonts/bebasneue/BebasNeue-Regular.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        .bebas {
            font-family: 'Bebas Neue', sans-serif;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <nav class="navbar navbar-light bg-white shadow-sm">
        <div class="container-fluid">

            <div class="row w-100 align-items-center">

                <!-- Columna 1: Logo y Nombre -->
                <div class="col-md-4 d-flex align-items-center">
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        <img src="{{ asset('img/autostyle_logo.png') }}" alt="Logo" height="80">
                        <div class="ms-2 bebas">
                            <strong class="d-block fs-3" style="color: #e60000;">AUTOSTYLE</strong>
                            <small class="fs-6" style="color: #00060a;">Refacciones y Accesorios</small>
                        </div>
                    </a>
                </div>

                <!-- Columna 2: Texto Central -->
                <div class="col-md-4 text-center d-none d-md-block">
                    <div class="bebas" style="color: #e60000; font-size: 1.1rem; font-weight: bold;">
                        LOS MEJORES DESCUENTOS Y PROMOCIONES EN AUTOPARTES
                    </div>
                    <div style="color: #6c757d; font-size: 0.9rem;">
                        Potencia tu camino
                    </div>
                </div>

                <!-- Columna 3: Login / Usuario -->
                <div class="col-md-4 text-end">
                    <ul class="navbar-nav flex-row justify-content-end">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item me-3">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <i class="fa-solid fa-user"></i> Ingresar
                                    </a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="fa-solid fa-user-plus"></i> Registrarse
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-user-circle"></i> {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>

            </div>
        </div>
    </nav>


    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>

