@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color:#cc0000; text-shadow:1px 1px 0 #000;">
            Relación Producto - Proveedor
        </h2>

        <a href="{{ route('producto_proveedor.create') }}" class="btn btn-danger mb-4"
           style="border-radius: 10px; font-weight: bold;">
            <i class="fa fa-plus me-1"></i> Crear nueva relación
        </a>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle text-center">
                <thead class="table-dark">
                <tr>
                    <th>Producto</th>
                    <th>Proveedor</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse($relaciones as $relacion)
                    <tr>
                        <td>{{ $relacion->producto->nombre ?? 'Sin nombre' }}</td>
                        <td>{{ $relacion->proveedor->nombre ?? 'Sin nombre' }}</td>
                        <td class="d-flex justify-content-center gap-2">
                            <a href="{{ route('producto_proveedor.edit', ['producto_proveedor' => $relacion->id]) }}"
                               class="btn btn-warning btn-sm" style="border-radius: 8px;">
                                <i class="fa fa-edit"></i> Editar
                            </a>

                            <form action="{{ route('producto_proveedor.destroy', ['producto_proveedor' => $relacion->id]) }}"
                                  method="POST"
                                  onsubmit="return confirm('¿Deseas eliminar esta relación?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 8px;">
                                    <i class="fa fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No hay relaciones registradas.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
