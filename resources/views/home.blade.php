@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-dark sidebar vh-100">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column text-white">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Ventas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Configuración</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Contenido principal -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="row g-4">
                    <div class="col-md-3">
                        <div class="card text-white bg-primary">
                            <div class="card-body">
                                <h5 class="card-title">Total Usuarios</h5>
                                <p class="card-text fs-3">1,250</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <h5 class="card-title">Ventas Hoy</h5>
                                <p class="card-text fs-3">$5,400</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-warning">
                            <div class="card-body">
                                <h5 class="card-title">Productos</h5>
                                <p class="card-text fs-3">320</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <h5 class="card-title">Pendientes</h5>
                                <p class="card-text fs-3">15</p>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <p>Bienvenido al panel de control.</p>
            </main>
        </div>
    </div>

    <style>
        .sidebar {
            background-color: #343a40;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
            color: white !important;
        }
    </style>
@endsection

