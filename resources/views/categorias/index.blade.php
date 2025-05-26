@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color:#cc0000; text-shadow: 1px 1px 0 #000;">Lista de Categorías</h2>

        <a href="{{ route('categorias.create') }}" class="btn btn-danger mb-4" style="border-radius: 10px; font-weight: bold;">
            <i class="fa fa-plus me-1"></i> Crear nueva categoría
        </a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody style="color: #000;">
                @forelse($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-warning btn-sm" style="border-radius: 8px;">
                                <i class="fa fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar esta categoría?');">
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
                        <td colspan="3" class="text-center text-muted">No hay categorías registradas.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
