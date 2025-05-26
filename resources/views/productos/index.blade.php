@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color:#cc0000; text-shadow: 1px 1px 0 #000;">Productos por Categoría</h2>

        <a href="{{ route('productos.create') }}" class="btn btn-danger mb-4" style="border-radius: 10px; font-weight: bold;">
            <i class="fa fa-plus me-1"></i> Crear nuevo producto
        </a>

        @foreach($categorias as $categoria)
            <div class="mb-4">
                <h4 style="color:#000; font-weight:bold;">{{ $categoria->nombre }}</h4>

                @if($categoria->productos->count())
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @foreach($categoria->productos as $producto)
                            <div class="col">
                                <div class="p-3" style="background-color: #f8f8f8; border: 2px solid #cc0000; border-radius: 20px;">

                                    @if($producto->imagen)
                                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto"
                                             style="width: 100%; max-height: 180px; object-fit: cover; border-radius: 10px; margin-bottom: 10px;">
                                    @endif

                                    <p><strong>Nombre:</strong> <span style="color:#000;">{{ $producto->nombre }}</span></p>
                                    <p><strong>Precio:</strong> <span style="color:#000;">${{ $producto->precio }}</span></p>
                                    <p><strong>Descripción:</strong> <span style="color:#000;">{{ $producto->descripcion }}</span></p>

                                    <div class="d-flex justify-content-between mt-3">
                                        <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning btn-sm" style="border-radius: 8px;">
                                            <i class="fa fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('productos.destroy', $producto) }}" method="POST" onsubmit="return confirm('¿Eliminar este producto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 8px;">
                                                <i class="fa fa-trash"></i> Eliminar
                                            </button>
                                        </form>
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
    </div>
@endsection
