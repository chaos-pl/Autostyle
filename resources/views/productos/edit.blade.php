@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color:#cc0000; text-shadow: 1px 1px 0 #000;">Editar Producto</h2>

        <form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #cc0000;">Nombre:</label>
                <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" required style="border-radius: 10px;">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #cc0000;">Precio:</label>
                <input type="number" name="precio" value="{{ $producto->precio }}" class="form-control" step="0.01" required style="border-radius: 10px;">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #cc0000;">Descripción:</label>
                <textarea name="descripcion" class="form-control" rows="3" style="border-radius: 10px;">{{ $producto->descripcion }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #cc0000;">Imagen actual:</label><br>
                @if($producto->imagen)
                    <img src="{{ asset($producto->imagen) }}" alt="Imagen" style="max-width: 200px; border-radius: 10px; margin-bottom: 10px;">
                @else
                    <p class="text-muted">No hay imagen subida.</p>
                @endif
                <input type="file" name="imagen" class="form-control mt-2" accept="image/*" style="border-radius: 10px;">
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold" style="color: #cc0000;">Categoría:</label>
                <select name="categoria_id" class="form-select" required style="border-radius: 10px;">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-danger px-4 py-2" style="border-radius: 10px;">
                    <i class="fa fa-save me-1"></i> Actualizar
                </button>
            </div>
        </form>
    </div>
@endsection
