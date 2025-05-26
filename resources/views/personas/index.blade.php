@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color: #cc0000; text-shadow: 1px 1px 0 #000;">Lista de Personas</h2>

        <a href="{{ route('personas.create') }}" class="btn btn-danger mb-4" style="border-radius: 10px; font-weight: bold;">
            <i class="fa fa-plus me-1"></i> Crear nueva persona
        </a>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($personas as $persona)
                <div class="col">
                    <div class="p-3" style="background-color: #f8f8f8; border: 2px solid #cc0000; border-radius: 20px; color: #000;">
                        @if($persona->foto)
                            <img src="{{ asset($persona->foto) }}" alt="Foto de {{ $persona->nombre }}"
                                 style="width: 100%; max-height: 180px; object-fit: cover; border-radius: 15px; margin-bottom: 15px;">
                        @else
                            <p class="text-muted"><em>Sin foto</em></p>
                        @endif

                        <p><strong style="color: red" ">Nombre:</strong> {{ $persona->nombre }}</p>
                        <p><strong style="color: red" ">Apellido Paterno:</strong> {{ $persona->apellido_paterno }}</p>
                        <p><strong style="color: red" ">Apellido Materno:</strong> {{ $persona->apellido_materno }}</p>
                        <p><strong style="color: red" ">Correo:</strong> {{ $persona->correo }}</p>
                        <p><strong style="color: red" ">Tipo:</strong> {{ ucfirst($persona->tipo) }}</p>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('personas.edit', $persona) }}" class="btn btn-warning btn-sm" style="border-radius: 8px;">
                                <i class="fa fa-edit"></i> Editar
                            </a>

                            <form action="{{ route('personas.destroy', $persona) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar esta persona?');">
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
    </div>
@endsection
