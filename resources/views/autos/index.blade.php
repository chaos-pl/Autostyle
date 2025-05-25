@extends('layouts.dashboard')

@section('dashboard-content')
    <h2 class="fw-bold">Lista de Autos</h2>

    <a href="{{ route('autos.create') }}" class="btn btn-danger mb-3">Crear nuevo auto</a>

    @foreach($autos as $auto)
        <div class="auto-card">
            <p><strong>Marca:</strong> {{ $auto->marca }}</p>
            <p><strong>Modelo:</strong> {{ $auto->modelo }}</p>
            <p><strong>Año:</strong> {{ $auto->año }}</p>
            <p><strong>Cliente ID:</strong> {{ $auto->cliente_id }}</p>

            <a href="{{ route('autos.edit', $auto) }}" class="btn btn-sm btn-warning">Editar</a>

            <form action="{{ route('autos.destroy', $auto) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
        </div>
    @endforeach
@endsection
