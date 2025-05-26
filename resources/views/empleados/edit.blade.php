@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color: #cc0000; text-shadow: 1px 1px 0 #000;">Editar Empleado</h2>

        <form action="{{ route('empleados.update', $empleado) }}" method="POST"
              style="background: #fff; padding: 30px; border-radius: 20px; border: 2px solid #cc0000;">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="persona_id" class="form-label fw-bold" style="color: #cc0000;">Seleccionar Persona:</label>
                <select name="persona_id" id="persona_id" class="form-select" style="border-radius: 10px;" required>
                    @foreach($personas as $persona)
                        <option value="{{ $persona->id }}" {{ $empleado->persona_id == $persona->id ? 'selected' : '' }}>
                            {{ $persona->nombre }}
                        </option>
                    @endforeach
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
