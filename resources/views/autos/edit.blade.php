@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color: #cc0000; text-shadow: 1px 1px 0 #000;">Editar Auto</h2>

        <form action="{{ route('autos.update', $auto) }}" method="POST"
              style="background: #fff; padding: 30px; border-radius: 20px; border: 2px solid #cc0000;">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="cliente_id" class="form-label fw-bold" style="color: #cc0000;">Cliente ID:</label>
                <input type="number" name="cliente_id" id="cliente_id" value="{{ $auto->cliente_id }}" required class="form-control" style="border-radius: 10px;">
            </div>

            <div class="mb-3">
                <label for="marca" class="form-label fw-bold" style="color: #cc0000;">Marca:</label>
                <input type="text" name="marca" id="marca" value="{{ $auto->marca }}" class="form-control" style="border-radius: 10px;">
            </div>

            <div class="mb-3">
                <label for="modelo" class="form-label fw-bold" style="color: #cc0000;">Modelo:</label>
                <input type="text" name="modelo" id="modelo" value="{{ $auto->modelo }}" class="form-control" style="border-radius: 10px;">
            </div>

            <div class="mb-4">
                <label for="año" class="form-label fw-bold" style="color: #cc0000;">Año:</label>
                <input type="number" name="año" id="año" value="{{ $auto->año }}" class="form-control" style="border-radius: 10px;">
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-danger px-4 py-2" style="border-radius: 10px; font-weight: bold;">
                    <i class="fa fa-save me-1"></i> Actualizar
                </button>
            </div>
        </form>
    </div>
@endsection
