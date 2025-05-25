@extends('layouts.app')

@section('content')
    {{-- Mantenemos los mismos estilos --}}

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
            <h2 class="fw-bold">Editar Proveedor</h2>

            <form action="{{ route('proveedores.update', $proveedor) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="{{ $proveedor->nombre }}" required>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" value="{{ $proveedor->telefono }}">
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" name="email" id="email" value="{{ $proveedor->email }}">
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" value="{{ $proveedor->direccion }}">
                </div>

                <div class="form-group">
                    <button type="submit">Actualizar</button>
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
