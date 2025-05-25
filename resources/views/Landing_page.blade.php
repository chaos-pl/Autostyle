@php($noPadding = true)
@extends('layouts.app')

@section('content')
    <style>
        @font-face {
            font-family: 'Bebas Neue';
            src: url('{{ asset('fonts/bebasneue/BebasNeue-Regular.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            background-color: #f8f9fa;
            color: #e60000;
            font-family: 'Bebas Neue', sans-serif;
        }

        .bebas {
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 1px;
        }

        .btn-custom {
            background-color: #000;
            color: #cc0000;
            border: none;
        }

        .btn-custom:hover {
            background-color: #333;
        }

        .btn-buscar {
            background-color: #cc0000;
            color: white;
            border: none;
        }

        .btn-buscar:hover {
            background-color: #a80000;
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

    <nav class="navbar navbar-expand-lg shadow-sm" style="background-color: #000;">
        <div class="container-fluid px-4">
            <div class="row w-100 align-items-center">

                <div class="col-4 d-flex justify-content-start">
                    <ul class="navbar-nav flex-row">
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#" style="color: #ffffff;">
                                <i class="fa-solid fa-house me-1"></i>Inicio
                            </a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="#categorias" style="color: #ffffff;">
                                <i class="fa-solid fa-layer-group me-1"></i>Categorías
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacto" style="color: #ffffff;">
                                <i class="fa-solid fa-envelope me-1"></i>Contacto
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-4 d-flex justify-content-center">
                    <form class="d-flex w-100 justify-content-center" role="search">
                        <input class="form-control bg-dark text-white border-0 w-75 me-2" type="search" placeholder="Buscar..." aria-label="Buscar">
                        <button class="btn btn-buscar fw-bold" type="submit">Buscar</button>
                    </form>
                </div>

                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a href="#horarios" class="text-decoration-none me-4" style="color: #ffffff;">
                        <i class="fa-solid fa-clock me-1"></i> Horarios
                    </a>
                    <a href="#carrito" class="text-decoration-none" style="color: #ffffff;">
                        <i class="fa-solid fa-cart-shopping fa-lg me-1"></i> Carrito
                    </a>
                </div>

            </div>
        </div>
    </nav>

    <section id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('{{ asset('img/hero_img_tsuru.jpg') }}');">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="bebas display-4 text-uppercase">Los Mejores Accesorios para tu Auto</h1>
                    <p class="bebas">Encuentra los mejores accesorios personalizados.</p>
                    <a href="#productos" class="btn btn-custom btn-lg bebas">Ver Productos</a>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ asset('img/hero_img_ford.jpg') }}');">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="bebas display-4 text-uppercase">Calidad y Estilo para tu Vehículo</h1>
                    <p class="bebas">Accesorios que hacen la diferencia.</p>
                    <a href="#productos" class="btn btn-custom btn-lg bebas">Explorar</a>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ asset('img/hero_img_chevrolet.jpg') }}');">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="bebas display-4 text-uppercase">Personaliza tu Auto Hoy</h1>
                    <p class="bebas">Encuentra accesorios exclusivos para ti.</p>
                    <a href="#productos" class="btn btn-custom btn-lg bebas">Descubre Más</a>
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
        <h2 class="text-center fw-bold bebas" style="color: #e60000;">Contacto</h2>
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
            <button type="submit" class="btn btn-custom bebas">Enviar</button>
        </form>
    </section>

    <footer class="text-center text-white bg-dark py-3">
        <p class="bebas" style="color: #ffffff;">&copy; 2025 AutoStyle Accesorios. Todos los derechos reservados.</p>
        <div>
            <a href="#" class="me-3" style="color: #e60000;">Facebook</a>
            <a href="#" class="me-3" style="color: #e60000;">Instagram</a>
            <a href="#" style="color: #e60000;">Twitter</a>
        </div>
    </footer>
@endsection
