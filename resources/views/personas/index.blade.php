@extends('layouts.dashboard')

@section('dashboard-content')
    <h2 class="fw-bold">Lista de Personas</h2>

    <a href="{{ route('personas.create') }}" class="btn btn-danger mb-3">Crear nueva persona</a>

    @foreach($personas as $persona)
        <div class="auto-card">
            @if($persona->foto)
                <img src="{{ asset($persona->foto) }}" alt="Foto de {{ $persona->nombre }}" style="max-width: 150px; max-height: 150px; object-fit: cover; border-radius: 10px; margin-bottom: 10px;">
            @else
                <p><em>Sin foto</em></p>
            @endif

            <p><strong>Nombre:</strong> {{ $persona->nombre }}</p>
            <p><strong>Apellido Paterno:</strong> {{ $persona->apellido_paterno }}</p>
            <p><strong>Apellido Materno:</strong> {{ $persona->apellido_materno }}</p>
            <p><strong>Correo:</strong> {{ $persona->correo }}</p>
            <p><strong>Tipo:</strong> {{ ucfirst($persona->tipo) }}</p>

            <a href="{{ route('personas.edit', $persona) }}" class="btn btn-sm btn-warning">Editar</a>

            <form action="{{ route('personas.destroy', $persona) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
        </div>
    @endforeach
@endsection

