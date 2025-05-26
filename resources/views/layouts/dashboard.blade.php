@extends('layouts.app')

@section('content')
    <style>
        @font-face {
            font-family: 'Bebas Neue';
            src: url('{{ asset('fonts/bebasneue/BebasNeue-Regular.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        html, body {
            background-color: #ffffff;
            font-family: 'Bebas Neue', sans-serif;
        }

        .dashboard-container {
            width: 100%;
            min-height: 100vh;
            display: flex;
            padding: 20px;
            gap: 20px;
            box-sizing: border-box;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(to bottom, #cc0000, #800000);
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 20px;
            border-radius: 20px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 15px 10px;
            font-weight: bold;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            border-left: 5px solid #fff;
            background-color: #8a0707;
            transform: scale(1.03);
        }

        .content {
            flex-grow: 1;
            padding: 40px;
            background-color: #fff;
            color: #e60000;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .stats-panel {
            width: 300px;
            background: linear-gradient(to bottom, #cc0000, #800000);
            color: #fff;
            padding: 20px;
            border-radius: 20px;
        }

        .stat-item {
            margin-bottom: 15px;
            padding: 15px;
            background-color: #8a0707;
            border-radius: 10px;
        }

        .sidebar .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .sidebar .brand img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .sidebar .brand span {
            font-size: 1.8rem;
            color: #fff;
            font-weight: bold;
            letter-spacing: 1px;
            text-shadow: 1px 1px 3px #000;
        }

        .text-shadow-black {
            text-shadow: 1px 1px 3px #000;
        }
        .sidebar a.active {
            background-color: #8a0707;
            border-left: 5px solid #ffffff;
            transform: scale(1.03);
        }
    </style>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column">
            <div class="brand">
                <img src="{{ asset('img/logo_autostyle.jpeg') }}" alt="Logo">
                <span class="text-shadow-black">AUTOSTYLE</span>
            </div>

            <a href="/home" class="{{ request()->is('inicio*') ? 'active' : '' }}">
                <i class="fa-solid fa-home me-2 text-shadow-black"></i>
                <span class="text-shadow-black">INICIO</span>
            </a>
            <a href="/productos" class="{{ request()->is('productos') ? 'active' : '' }}">
                <i class="fa-solid fa-box me-2 text-shadow-black"></i>
                <span class="text-shadow-black">PRODUCTOS</span>
            </a>
            <a href="/empleados" class="{{ request()->is('empleados') ? 'active' : '' }}">
                <i class="fa-solid fa-users me-2 text-shadow-black"></i>
                <span class="text-shadow-black">EMPLEADOS</span>
            </a>
            <a href="/proveedores" class="{{ request()->is('proveedores') ? 'active' : '' }}">
                <i class="fa-solid fa-truck me-2 text-shadow-black"></i>
                <span class="text-shadow-black">PROVEEDORES</span>
            </a>
            <a href="{{ route('categorias.index') }}" class="{{ request()->is('categorias') ? 'active' : '' }}">
                <i class="fa-solid fa-tags me-2 text-shadow-black"></i>
                <span class="text-shadow-black">CATEGORÍAS</span>
            </a>
            <a href="/autos" class="{{ request()->is('autos') ? 'active' : '' }}">
                <i class="fa-solid fa-tags me-2 text-shadow-black"></i>
                <span class="text-shadow-black">Autos</span>
            </a>
            <a href="/personas" class="{{ request()->is('personas') ? 'active' : '' }}">
                <i class="fa-solid fa-tags me-2 text-shadow-black"></i>
                <span class="text-shadow-black">Personas</span>
            </a>
            <a href="{{ route('clientes.index') }}" class="{{ request()->is('clientes') ? 'active' : '' }}">
                <i class="fa-solid fa-tags me-2 text-shadow-black"></i>
                <span class="text-shadow-black">Clientes</span>
            </a>
            <a href="{{ route('producto_proveedor.index') }}" class="{{ request()->is('producto_proveedor') ? 'active' : '' }}">
                <i class="fa-solid fa-link me-2 text-shadow-black"></i>
                <span class="text-shadow-black">Producto-Proveedor</span>
            </a>


            <a href="/" class="logout mt-auto {{ request()->is('landing_page') ? 'active' : '' }}">
                <i class="fa-solid fa-arrow-left me-2 text-shadow-black"></i>
                <span class="text-shadow-black">SALIR</span>
            </a>
        </div>

        <!-- Main content -->
        <div class="content">
            @yield('dashboard-content')
        </div>

        <!-- Optional stats -->
        <div class="stats-panel">
            <h4 class="text-shadow-black">Estadísticas</h4>
            <div class="stat-item">
                <h5 class="mb-0 text-white">Ventas Totales</h5>
                <p class="mb-0">$75,000</p>
            </div>
            <div class="stat-item">
                <h5 class="mb-0 text-white">Almacén</h5>
                <p class="mb-0">65%</p>
            </div>
            <div class="stat-item">
                <h5 class="mb-0 text-white">Clientes Activos</h5>
                <p class="mb-0">1,230</p>
            </div>
        </div>
    </div>
@endsection
