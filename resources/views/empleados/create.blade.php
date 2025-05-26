@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color: #cc0000; text-shadow: 1px 1px 0 #000;">Crear Empleado</h2>

        <form action="{{ route('empleados.store') }}" method="POST"
              style="background: #fff; padding: 30px; border-radius: 20px; border: 2px solid #cc0000;">
            @csrf

            <div class="mb-4">
                <label for="persona_id" class="form-label fw-bold" style="color: #cc0000;">Seleccionar Persona:</label>
                <select name="persona_id" id="persona_id" class="form-select" style="border-radius: 10px;" required>
                    <option value="">Seleccione una persona</option>
                    @foreach($personas as $persona)
                        <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
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
