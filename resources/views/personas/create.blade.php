@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color: #cc0000; text-shadow: 1px 1px 0 #000;">Crear Persona</h2>

        <form action="{{ route('personas.store') }}" method="POST" enctype="multipart/form-data"
              style="background: #fff; padding: 30px; border-radius: 20px; border: 2px solid #cc0000;">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label fw-bold" style="color: #cc0000;">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required class="form-control" style="border-radius: 10px;">
            </div>

            <div class="mb-3">
                <label for="apellido_paterno" class="form-label fw-bold" style="color: #cc0000;">Apellido Paterno:</label>
                <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" style="border-radius: 10px;">
            </div>

            <div class="mb-3">
                <label for="apellido_materno" class="form-label fw-bold" style="color: #cc0000;">Apellido Materno:</label>
                <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" style="border-radius: 10px;">
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label fw-bold" style="color: #cc0000;">Correo Electrónico:</label>
                <input type="email" name="correo" id="correo" class="form-control" style="border-radius: 10px;">
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label fw-bold" style="color: #cc0000;">Foto:</label>
                <input type="file" name="foto" id="foto" accept="image/*" class="form-control" style="border-radius: 10px;">
            </div>

            <div class="mb-4">
                <label for="tipo" class="form-label fw-bold" style="color: #cc0000;">Tipo:</label>
                <select name="tipo" id="tipo" required class="form-select" style="border-radius: 10px;">
                    <option value="">Seleccione un tipo</option>
                    <option value="empleado">Empleado</option>
                    <option value="cliente">Cliente</option>
                    <option value="usuario">Usuario</option>
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
