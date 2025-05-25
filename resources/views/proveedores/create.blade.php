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

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        .form-group button {
            background-color: #cc0000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            transition: 0.3s ease;
        }

        .form-group button:hover {
            background-color: #8a0707;
        }
    </style>

    <div class="dashboard-container">
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
                    <i class="fa-solid fa-tags me-2 text-shadow-black"></i>
                    <span class="text-shadow-black">Autos</span>
                </a>
            </div>

            <a href="/" class="logout mt-auto {{ request()->is('landing_page') ? 'active' : '' }}">
                <i class="fa-solid fa-arrow-left me-2 text-shadow-black"></i>
                <span class="text-shadow-black">SALIR</span>
            </a>
        </div>

        <div class="content">
            <h2 class="fw-bold">Crear Proveedor</h2>

            <form action="{{ route('proveedores.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" required>
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" required>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" required>
                </div>

                <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" name="correo" id="correo" required>
                </div>


                <div class="form-group">
                    <button type="submit">Guardar</button>
                </div>
            </form>
        </div>

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
