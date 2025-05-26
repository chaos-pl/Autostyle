@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color:#cc0000; text-shadow: 1px 1px 0 #000;">Crear Producto</h2>

        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #cc0000;">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required style="border-radius: 10px;">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #cc0000;">Precio:</label>
                <input type="number" name="precio" class="form-control" required step="0.01" style="border-radius: 10px;">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #cc0000;">Descripción:</label>
                <textarea name="descripcion" class="form-control" rows="3" style="border-radius: 10px;"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold" style="color: #cc0000;">Imagen:</label>
                <input type="file" name="imagen" class="form-control" accept="image/*" style="border-radius: 10px;">
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold" style="color: #cc0000;">Categoría:</label>
                <select name="categoria_id" class="form-select" required style="border-radius: 10px;">
                    <option value="">Selecciona una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-danger px-4 py-2" style="border-radius: 10px;">
                    <i class="fa fa-save me-1"></i> Guardar
                </button>
            </div>
        </form>
    </div>
@endsection

