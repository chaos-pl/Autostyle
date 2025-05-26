@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color:#cc0000; text-shadow:1px 1px 0 #000;">Crear Relación Producto - Proveedor</h2>

        <form action="{{ route('producto_proveedor.store') }}" method="POST" style="background: #fff; padding: 30px; border-radius: 20px; border: 2px solid #cc0000;">
            @csrf

            <div class="mb-4">
                <label for="producto_id" class="form-label fw-bold" style="color: #cc0000;">Producto:</label>
                <select name="producto_id" id="producto_id" class="form-select" required style="border-radius: 10px;">
                    <option value="">Seleccione un producto</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="proveedor_id" class="form-label fw-bold" style="color: #cc0000;">Proveedor:</label>
                <select name="proveedor_id" id="proveedor_id" class="form-select" required style="border-radius: 10px;">
                    <option value="">Seleccione un proveedor</option>
                    @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-danger px-4 py-2" style="border-radius: 10px; font-weight: bold;">
                    <i class="fa fa-save me-1"></i> Guardar
                </button>
            </div>
        </form>
    </div>
@endsection

