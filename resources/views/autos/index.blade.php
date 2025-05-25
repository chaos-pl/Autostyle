@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color: #cc0000; text-shadow: 1px 1px 0 #000;">Lista de Autos</h2>

        <a href="{{ route('autos.create') }}" class="btn btn-danger mb-4" style="border-radius: 10px; font-weight: bold;">
            <i class="fa fa-plus me-1"></i> Crear nuevo auto
        </a>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($autos as $auto)
                <div class="col">
                    <div class="p-3" style="background-color: #f8f8f8; border: 2px solid #cc0000; border-radius: 20px;">
                        <p><strong>Marca:</strong> {{ $auto->marca }}</p>
                        <p><strong>Modelo:</strong> {{ $auto->modelo }}</p>
                        <p><strong>Año:</strong> {{ $auto->año }}</p>
                        <p><strong>Cliente ID:</strong> {{ $auto->cliente_id }}</p>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('autos.edit', $auto) }}" class="btn btn-warning btn-sm" style="border-radius: 8px;">
                                <i class="fa fa-edit"></i> Editar
                            </a>

                            <form action="{{ route('autos.destroy', $auto) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar este auto?');">
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
