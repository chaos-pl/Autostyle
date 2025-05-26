@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color: #cc0000; text-shadow: 1px 1px 0 #000;">Lista de Clientes</h2>

        <a href="{{ route('clientes.create') }}" class="btn btn-danger mb-4" style="border-radius: 10px; font-weight: bold;">
            <i class="fa fa-plus me-1"></i> Crear nuevo cliente
        </a>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($clientes as $cliente)
                <div class="col">
                    <div class="p-3" style="background-color: #f8f8f8; border: 2px solid #cc0000; border-radius: 20px; color: #000;">

                        @if($cliente->persona && $cliente->persona->foto)
                            <img src="{{ asset($cliente->persona->foto) }}" alt="Foto de {{ $cliente->persona->nombre }}"
                                 style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 15px; margin-bottom: 15px;">
                        @else
                            <p class="text-muted"><em>Sin foto</em></p>
                        @endif

                        <p><strong style="color: red">ID:</strong> {{ $cliente->id }}</p>
                        <p><strong style="color: red">Persona:</strong> {{ $cliente->persona->nombre ?? 'No asignado' }}</p>
                        <p><strong style="color: red">Correo:</strong> {{ $cliente->persona->correo ?? 'N/A' }}</p>
                        <p><strong style="color: red">Dirección:</strong> {{ $cliente->direccion ?? 'N/A' }}</p>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning btn-sm" style="border-radius: 8px;">
                                <i class="fa fa-edit"></i> Editar
                            </a>

                            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar este cliente?');">
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
            {{ $clientes->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
