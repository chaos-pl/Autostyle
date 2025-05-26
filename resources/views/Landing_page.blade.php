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
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
            margin: auto;
        }

        .categoria-separador {
            border: none;
            border-top: 4px dashed #cc0000;
            margin: 60px 0 30px;
            width: 100%;
            opacity: 1;
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
                    <a href="#" class="text-decoration-none me-4" style="color: #ffffff;" data-bs-toggle="modal" data-bs-target="#horariosModal">
                        <i class="fa-solid fa-clock me-1"></i> Horarios
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

    <section id="categorias" class="container my-5">
        <h2 class="text-center fw-bold bebas mb-5" style="color: #e60000;">Categorías de Productos</h2>

        @foreach($categorias as $categoria)
            {{-- Separador decorativo entre categorías --}}
            <hr class="categoria-separador">

            <div class="mb-5">
                <h3 class="fw-bold bebas mb-4 text-uppercase" style="color: #cc0000;">{{ $categoria->nombre }}</h3>

                @if($categoria->productos->count())
                    <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                        @foreach($categoria->productos as $producto)
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    {{-- Imagen del producto --}}
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">

                                    <div class="card-body text-center">
                                        <h5 class="card-title bebas">{{ $producto->nombre }}</h5>

                                        {{-- Botón para mostrar detalles --}}
                                        <button class="btn btn-buscar mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#infoProducto{{ $producto->id }}">
                                            Ver más
                                        </button>

                                        {{-- Sección oculta con precio y descripción --}}
                                        <div class="collapse mt-3" id="infoProducto{{ $producto->id }}">
                                            <p><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
                                            <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">No hay productos en esta categoría.</p>
                @endif
            </div>
        @endforeach
    </section>

    <section id="contacto" class="container my-5">
        <h2 class="text-center fw-bold bebas" style="color: #e60000;">Contacto</h2>

        {{-- Mensaje de éxito --}}
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- Mensajes de error --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contactos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono (opcional)</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
            </div>
            <div class="mb-3">
                <label for="mensaje" class="form-label">Mensaje</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required>{{ old('mensaje') }}</textarea>
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

    <div class="modal fade" id="horariosModal" tabindex="-1" aria-labelledby="horariosModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title fw-bold bebas" id="horariosModalLabel">HORARIOS DE LA TIENDA</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body bg-light">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="bg-secondary text-white">
                            <tr>
                                <th style="color: red">Día</th>
                                <th style="color: red;">Horario</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="bg-light fw-bold">
                                <td>Sábado</td>
                                <td>8:00 AM - 9:30 PM</td>
                            </tr>
                            <tr><td>Domingo</td><td>8:00 AM - 9:00 PM</td></tr>
                            <tr><td>Lunes</td><td>8:00 AM - 9:30 PM</td></tr>
                            <tr><td>Martes</td><td>8:00 AM - 9:30 PM</td></tr>
                            <tr><td>Miércoles</td><td>8:00 AM - 9:30 PM</td></tr>
                            <tr><td>Jueves</td><td>8:00 AM - 9:30 PM</td></tr>
                            <tr><td>Viernes</td><td>8:00 AM - 9:30 PM</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
