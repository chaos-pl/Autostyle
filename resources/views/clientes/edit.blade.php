@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color: #cc0000; text-shadow: 1px 1px 0 #000;">Editar Cliente</h2>

        <form action="{{ route('clientes.update', $cliente) }}" method="POST"
              style="background: #fff; padding: 30px; border-radius: 20px; border: 2px solid #cc0000;">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="persona_id" class="form-label fw-bold" style="color: #cc0000;">Seleccionar Persona:</label>
                <select name="persona_id" id="persona_id" class="form-select" style="border-radius: 10px;" required>
                    <option value="">Seleccione una persona</option>
                    @foreach($personas as $persona)
                        <option value="{{ $persona->id }}" {{ $cliente->persona_id == $persona->id ? 'selected' : '' }}>
                            {{ $persona->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="direccion" class="form-label fw-bold" style="color: #cc0000;">Dirección:</label>
                <input type="text" name="direccion" id="direccion" class="form-control" style="border-radius: 10px;"
                       value="{{ old('direccion', $cliente->direccion) }}" placeholder="Ingrese la dirección del cliente">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary px-4 py-2" style="border-radius: 10px; font-weight: bold;">
                    <i class="fa fa-times me-1"></i> Cancelar
                </a>

                <button type="submit" class="btn btn-danger px-4 py-2" style="border-radius: 10px; font-weight: bold;">
                    <i class="fa fa-save me-1"></i> Actualizar
                </button>
            </div>
        </form>
    </div>
@endsection
