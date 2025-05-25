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

        .form-group input,
        .form-group select {
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
            cursor: pointer;
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
                <a href="/dashboard"><i class="fa-solid fa-home me-2 text-shadow-black"></i><span class="text-shadow-black">INICIO</span></a>
                <a href="/productos"><i class="fa-solid fa-box me-2 text-shadow-black"></i><span class="text-shadow-black">PRODUCTOS</span></a>
                <a href="/empleados"><i class="fa-solid fa-users me-2 text-shadow-black"></i><span class="text-shadow-black">EMPLEADOS</span></a>
                <a href="/proveedores"><i class="fa-solid fa-truck me-2 text-shadow-black"></i><span class="text-shadow-black">PROVEEDORES</span></a>
                <a href="/categorias"><i class="fa-solid fa-tags me-2 text-shadow-black"></i><span class="text-shadow-black">CATEGORÍAS</span></a>
                <a href="/autos"><i class="fa-solid fa-car me-2 text-shadow-black"></i><span class="text-shadow-black">AUTOS</span></a>
                <a href="/personas"><i class="fa-solid fa-id-card me-2 text-shadow-black"></i><span class="text-shadow-black">PERSONAS</span></a>
            </div>

            <a href="/" class="logout mt-auto"><i class="fa-solid fa-arrow-left me-2 text-shadow-black"></i><span class="text-shadow-black">SALIR</span></a>
        </div>

        <div class="content">
            <h2 class="fw-bold">Editar Persona</h2>

            <form action="{{ route('personas.update', $persona) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="{{ $persona->nombre }}" required>
                </div>

                <div class="form-group">
                    <label for="apellido_paterno">Apellido Paterno:</label>
                    <input type="text" name="apellido_paterno" id="apellido_paterno" value="{{ $persona->apellido_paterno }}">
                </div>

                <div class="form-group">
                    <label for="apellido_materno">Apellido Materno:</label>
                    <input type="text" name="apellido_materno" id="apellido_materno" value="{{ $persona->apellido_materno }}">
                </div>

                <div class="form-group">
                    <label for="correo">Correo:</label>
                    <input type="email" name="correo" id="correo" value="{{ $persona->correo }}">
                </div>

                <div class="form-group">
                    <label for="foto">Foto:</label><br>
                    @if($persona->foto)
                        <img src="{{ asset($persona->foto) }}" alt="Foto actual" style="max-width: 150px; max-height: 150px; object-fit: cover; border-radius: 10px; margin-bottom: 10px;">
                    @endif
                    <input type="file" name="foto" id="foto" accept="image/*">
                    <small>Deja vacío si no quieres cambiar la foto</small>
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <select name="tipo" id="tipo" required>
                        <option value="cliente" {{ $persona->tipo === 'cliente' ? 'selected' : '' }}>Cliente</option>
                        <option value="empleado" {{ $persona->tipo === 'empleado' ? 'selected' : '' }}>Empleado</option>
                        <option value="usuario" {{ $persona->tipo === 'usuario' ? 'selected' : '' }}>Usuario</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit">Actualizar</button>
                </div>
            </form>
        </div>

        <div class="stats-panel">
            <h4 class="text-shadow-black">Estadísticas</h4>

            <div class="stat-item d-flex align-items-center gap-3">
                <i class="fa-solid fa-user-group fa-2x text-white text-shadow-black"></i>
                <div>
                    <h5 class="mb-0 text-white text-shadow-black">Personas Totales</h5>
                    <p class="mb-0 text-white text-shadow-black">{{ \App\Models\Persona::count() }}</p>
                </div>
            </div>

            <div class="stat-item d-flex align-items-center gap-3">
                <i class="fa-solid fa-user-check fa-2x text-white text-shadow-black"></i>
                <div>
                    <h5 class="mb-0 text-white text-shadow-black">Clientes</h5>
                    <p class="mb-0 text-white text-shadow-black">{{ \App\Models\Persona::where('tipo', 'cliente')->count() }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
