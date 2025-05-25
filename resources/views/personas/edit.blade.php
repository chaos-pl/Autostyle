@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color: #cc0000; text-shadow: 1px 1px 0 #000;">Editar Persona</h2>

        <form action="{{ route('personas.update', $persona) }}" method="POST" enctype="multipart/form-data"
              style="background: #fff; padding: 30px; border-radius: 20px; border: 2px solid #cc0000;">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label fw-bold" style="color: #cc0000;">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ $persona->nombre }}" required class="form-control" style="border-radius: 10px;">
            </div>

            <div class="mb-3">
                <label for="apellido_paterno" class="form-label fw-bold" style="color: #cc0000;">Apellido Paterno:</label>
                <input type="text" name="apellido_paterno" id="apellido_paterno" value="{{ $persona->apellido_paterno }}" class="form-control" style="border-radius: 10px;">
            </div>

            <div class="mb-3">
                <label for="apellido_materno" class="form-label fw-bold" style="color: #cc0000;">Apellido Materno:</label>
                <input type="text" name="apellido_materno" id="apellido_materno" value="{{ $persona->apellido_materno }}" class="form-control" style="border-radius: 10px;">
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label fw-bold" style="color: #cc0000;">Correo:</label>
                <input type="email" name="correo" id="correo" value="{{ $persona->correo }}" class="form-control" style="border-radius: 10px;">
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label fw-bold" style="color: #cc0000;">Foto:</label><br>
                @if($persona->foto)
                    <img src="{{ asset($persona->foto) }}" alt="Foto actual"
                         style="max-width: 150px; max-height: 150px; object-fit: cover; border-radius: 10px; margin-bottom: 10px;">
                @endif
                <input type="file" name="foto" id="foto" accept="image/*" class="form-control" style="border-radius: 10px;">
                <small class="text-muted">Deja vacío si no quieres cambiar la foto</small>
            </div>

            <div class="mb-4">
                <label for="tipo" class="form-label fw-bold" style="color: #cc0000;">Tipo:</label>
                <select name="tipo" id="tipo" required class="form-select" style="border-radius: 10px;">
                    <option value="cliente" {{ $persona->tipo === 'cliente' ? 'selected' : '' }}>Cliente</option>
                    <option value="empleado" {{ $persona->tipo === 'empleado' ? 'selected' : '' }}>Empleado</option>
                    <option value="usuario" {{ $persona->tipo === 'usuario' ? 'selected' : '' }}>Usuario</option>
                </select>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-danger px-4 py-2" style="border-radius: 10px; font-weight: bold;">
                    <i class="fa fa-save me-1"></i> Actualizar
                </button>
            </div>
        </form>
    </div>
@endsection
