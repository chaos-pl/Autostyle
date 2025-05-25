@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color: #cc0000; text-shadow: 1px 1px 0 #000;">Editar Proveedor</h2>

        <form action="{{ route('proveedores.update', $proveedor) }}" method="POST"
              style="background: #fff; padding: 30px; border-radius: 20px; border: 2px solid #cc0000;">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label fw-bold" style="color: #cc0000;">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ $proveedor->nombre }}" required class="form-control" style="border-radius: 10px;">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label fw-bold" style="color: #cc0000;">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" value="{{ $proveedor->telefono }}" class="form-control" style="border-radius: 10px;">
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label fw-bold" style="color: #cc0000;">Correo electrónico:</label>
                <input type="email" name="correo" id="correo" value="{{ $proveedor->correo }}" class="form-control" style="border-radius: 10px;">
            </div>

            <div class="mb-4">
                <label for="direccion" class="form-label fw-bold" style="color: #cc0000;">Dirección:</label>
                <input type="text" name="direccion" id="direccion" value="{{ $proveedor->direccion }}" class="form-control" style="border-radius: 10px;">
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-danger px-4 py-2" style="border-radius: 10px; font-weight: bold;">
                    <i class="fa fa-save me-1"></i> Actualizar
                </button>
            </div>
        </form>
    </div>
@endsection
