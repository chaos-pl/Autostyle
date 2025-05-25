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
            height: 100%;
            margin: 0;
            background-color: #ffffff;
            font-family: 'Bebas Neue', sans-serif;
        }

        .text-shadow-black {
            text-shadow: 1px 1px 3px #000;
        }

        .dashboard-container {
            width: 100%;
            height: 100vh;
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
            overflow-y: auto;
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

        .stats-panel h4 {
            border-bottom: 2px solid #fff;
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-shadow: 1px 1px 3px #000;
        }

        .stat-item {
            margin-bottom: 15px;
            padding: 15px;
            background-color: #8a0707;
            border-radius: 10px;
            text-align: center;
        }

        .sidebar .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
            transition: all 0.3s ease;
        }

        .sidebar .brand:hover {
            transform: scale(1.03);
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

        .proveedor-card {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .proveedor-card a {
            margin-right: 10px;
        }
    </style>

    <div class="dashboard-container">
        <!-- SIDEBAR -->
        <div class="sidebar d-flex flex-column">
            <div class="brand">
                <img src="{{ asset('img/logo_autostyle.jpeg') }}" alt="Logo">
                <span class="text-shadow-black">AUTOSTYLE</span>
            </div>

            <div>
                <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
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
                <a href="/categorias" class="{{ request()->is('categorias') ? 'active' : '' }}">
                    <i class="fa-solid fa-tags me-2 text-shadow-black"></i>
                    <span class="text-shadow-black">CATEGORÍAS</span>
                </a>
                <a href="/autos" class="{{ request()->is('autos') ? 'active' : '' }}">
                    <i class="fa-solid fa-car me-2 text-shadow-black"></i>
                    <span class="text-shadow-black">AUTOS</span>
                </a>
            </div>

            <a href="/" class="logout mt-auto {{ request()->is('landing_page') ? 'active' : '' }}">
                <i class="fa-solid fa-arrow-left me-2 text-shadow-black"></i>
                <span class="text-shadow-black">SALIR</span>
            </a>
        </div>

        <!-- CONTENIDO PRINCIPAL -->
        <div class="content">
            <h2 class="fw-bold">Lista de Proveedores</h2>

            <a href="{{ route('proveedores.create') }}" class="btn btn-danger mb-3">Crear nuevo proveedor</a>

            @foreach($proveedores as $proveedor)
                <div class="proveedor-card">
                    <p><strong>Nombre:</strong> {{ $proveedor->nombre }}</p>
                    <p><strong>Teléfono:</strong> {{ $proveedor->telefono ?? 'N/A' }}</p>
                    <p><strong>Correo:</strong> {{ $proveedor->correo }}</p>
                    <p><strong>Dirección:</strong> {{ $proveedor->direccion }}</p>

                    <a href="{{ route('proveedores.edit', $proveedor) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </div>
            @endforeach
        </div>

        <!-- PANEL DE ESTADÍSTICAS -->
        <div class="stats-panel">
            <h4 class="text-shadow-black">Estadísticas</h4>

            <div class="stat-item d-flex align-items-center gap-3">
                <i class="fa-solid fa-sack-dollar fa-2x text-white text-shadow-black"></i>
                <div>
                    <h5 class="mb-0 text-white text-shadow-black">Ventas Totales</h5>
                    <p class="mb-0 text-white text-shadow-black">$75,000</p>
                </div>
            </div>

            <div class="stat-item d-flex align-items-center gap-3">
                <i class="fa-solid fa-warehouse fa-2x text-white text-shadow-black"></i>
                <div>
                    <h5 class="mb-0 text-white text-shadow-black">Almacén</h5>
                    <p class="mb-0 text-white text-shadow-black">65%</p>
                </div>
            </div>

            <div class="stat-item d-flex align-items-center gap-3">
                <i class="fa-solid fa-user-check fa-2x text-white text-shadow-black"></i>
                <div>
                    <h5 class="mb-0 text-white text-shadow-black">Clientes Activos</h5>
                    <p class="mb-0 text-white text-shadow-black">1,230</p>
                </div>
            </div>
        </div>
    </div>
@endsection
