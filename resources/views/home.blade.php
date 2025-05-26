@extends('layouts.dashboard')

@section('dashboard-content')
    <style>
        @font-face {
            font-family: 'Bebas Neue';
            src: url('{{ asset('fonts/bebasneue/BebasNeue-Regular.ttf') }}') format('truetype');
        }

        html, body {
            font-family: 'Bebas Neue', sans-serif;
            background-color: #fff;
        }

        .content {
            padding: 40px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .content h2 {
            color: #cc0000;
            text-shadow: 1px 1px 0 #000;
            margin-bottom: 30px;
        }

        .stats-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .card-stat {
            background: linear-gradient(to bottom, #cc0000, #800000);
            color: #fff;
            border-radius: 20px;
            padding: 30px;
            width: 240px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.3s;
        }

        .card-stat:hover {
            transform: scale(1.05);
        }

        .card-stat i {
            font-size: 40px;
            margin-bottom: 15px;
            text-shadow: 1px 1px 2px #000;
        }

        .card-stat h3 {
            font-size: 22px;
            margin-bottom: 8px;
            text-shadow: 1px 1px 2px #000;
        }

        .card-stat p {
            font-size: 28px;
            font-weight: bold;
            margin: 0;
        }
    </style>

    <div class="content">
        <h2 class="fw-bold">Bienvenido al Dashboard</h2>

        <div class="stats-grid">
            <div class="card-stat">
                <i class="fa-solid fa-box"></i>
                <h3>Productos</h3>
                <p>{{ $totalProductos }}</p>
            </div>

            <div class="card-stat">
                <i class="fa-solid fa-user-check"></i>
                <h3>Clientes</h3>
                <p>{{ $totalClientes }}</p>
            </div>

            <div class="card-stat">
                <i class="fa-solid fa-users"></i>
                <h3>Empleados</h3>
                <p>{{ $totalEmpleados }}</p>
            </div>

            <div class="card-stat">
                <i class="fa-solid fa-truck"></i>
                <h3>Proveedores</h3>
                <p>{{ $totalProveedores }}</p>
            </div>
        </div>
    </div>
@endsection
