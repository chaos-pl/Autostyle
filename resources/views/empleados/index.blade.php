@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color: #cc0000; text-shadow: 1px 1px 0 #000;">Lista de Empleados</h2>

        <a href="{{ route('empleados.create') }}" class="btn btn-danger mb-4" style="border-radius: 10px; font-weight: bold;">
            <i class="fa fa-plus me-1"></i> Crear nuevo empleado
        </a>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($empleados as $empleado)
                <div class="col">
                    <div class="p-3" style="background-color: #f8f8f8; border: 2px solid #cc0000; border-radius: 20px;">

                        {{-- Mostrar la foto de la persona --}}
                        @if($empleado->persona && $empleado->persona->foto)
                            <img src="{{ asset($empleado->persona->foto) }}" alt="Foto de {{ $empleado->persona->nombre }}"
                                 style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 15px; margin-bottom: 15px;">
                        @else
                            <p class="text-muted"><em>Sin foto</em></p>
                        @endif

                        <p><strong>ID:</strong> {{ $empleado->id }}</p>
                        <p><strong>Persona:</strong> {{ $empleado->persona->nombre ?? 'No asignado' }}</p>
                        <p><strong>Correo:</strong> {{ $empleado->persona->correo ?? 'N/A' }}</p>
                        <p><strong>Tipo:</strong> {{ ucfirst($empleado->persona->tipo ?? 'N/A') }}</p>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-warning btn-sm" style="border-radius: 8px;">
                                <i class="fa fa-edit"></i> Editar
                            </a>

                            <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar este empleado?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 8px;">
                                    <i class="fa fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $empleados->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
