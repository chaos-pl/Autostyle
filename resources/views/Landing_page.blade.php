@php($noPadding = true)
@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }
        .btn-custom {
            background-color: #000;
            color: #FFC107;
            border: none;
        }
        .btn-custom:hover {
            background-color: #333;
        }
        .card-img-top {
            width: 300px;
            height: 250px;
            object-fit: cover;
            display: block;
            margin: auto;
        }
        .carousel-item {
            height: 60vh;
            min-height: 300px;
            background-position: center;
            background-size: cover;
            position: relative;
        }
        .carousel-caption {
            background-color: rgba(0,0,0,0.5);
            padding: 1.5rem;
            border-radius: 0.5rem;
            bottom: 20%;
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #00060a;">
        <div class="container">
            <!-- Logo y Nombre -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height: 40px; width: auto;" class="me-2">
                <span class="fw-bold text-warning">AutoStyle Accesorios</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse fw-bold" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Resto de ítems aquí -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa-solid fa-house me-2"></i>Inicio
                        </a>
                    </li>
                    <!-- etc... -->
                </ul>

                <!-- Barra de búsqueda -->
                <form class="d-flex ms-auto" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar productos..." aria-label="Buscar">
                    <button class="btn btn-outline-warning" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>

    <section id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" style="margin-top: 0;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('{{ asset('img/hero_img_tsuru.jpg') }}');">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Los Mejores Accesorios para tu Auto</h1>
                    <p>Encuentra los mejores accesorios personalizados.</p>
                    <a href="#productos" class="btn btn-custom btn-lg">Ver Productos</a>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ asset('img/hero_img_ford.jpg') }}');">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Calidad y Estilo para tu Vehículo</h1>
                    <p>Accesorios que hacen la diferencia.</p>
                    <a href="#productos" class="btn btn-custom btn-lg">Explorar</a>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ asset('img/hero_img_chevrolet.jpg') }}');">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Personaliza tu Auto Hoy</h1>
                    <p>Encuentra accesorios exclusivos para ti.</p>
                    <a href="#productos" class="btn btn-custom btn-lg">Descubre Más</a>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </section>

    <section id="contacto" class="container my-5">
        <h2 class="text-center text-warning fw-bold">Contacto</h2>
        <form>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea class="form-control" id="mensaje" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-custom">Enviar</button>
        </form>
    </section>

    <footer class="text-center text-white bg-dark py-3">
        <p>&copy; 2025 AutoStyle Accesorios. Todos los derechos reservados.</p>
        <div>
            <a href="#" class="text-warning me-3">Facebook</a>
            <a href="#" class="text-warning me-3">Instagram</a>
            <a href="#" class="text-warning">Twitter</a>
        </div>
    </footer>
@endsection

