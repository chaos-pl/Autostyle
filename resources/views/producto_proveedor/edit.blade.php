@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color:#cc0000; text-shadow:1px 1px 0 #000;">Editar Relación Producto - Proveedor</h2>

        <form action="{{ route('producto_proveedor.update', $productoProveedor) }}" method="POST"
              style="background: #fff; padding: 30px; border-radius: 20px; border: 2px solid #cc0000;">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="producto_id" class="form-label fw-bold" style="color: #cc0000;">Producto:</label>
                <select name="producto_id" id="producto_id" class="form-select" required style="border-radius: 10px;">
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}" {{ $productoProveedor->producto_id == $producto->id ? 'selected' : '' }}>
                            {{ $producto->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="proveedor_id" class="form-label fw-bold" style="color: #cc0000;">Proveedor:</label>
                <select name="proveedor_id" id="proveedor_id" class="form-select" required style="border-radius: 10px;">
                    @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}" {{ $productoProveedor->proveedor_id == $proveedor->id ? 'selected' : '' }}>
                            {{ $proveedor->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('producto_proveedor.index') }}" class="btn btn-secondary px-4 py-2" style="border-radius: 10px; font-weight: bold;">
                    <i class="fa fa-times me-1"></i> Cancelar
                </a>

                <button type="submit" class="btn btn-danger px-4 py-2" style="border-radius: 10px; font-weight: bold;">
                    <i class="fa fa-save me-1"></i> Actualizar
                </button>
            </div>
        </form>
    </div>
@endsection
