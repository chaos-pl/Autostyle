@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <h2 class="fw-bold mb-4" style="color: #cc0000; text-shadow: 1px 1px 0 #000;">Lista de Proveedores</h2>

        <a href="{{ route('proveedores.create') }}" class="btn btn-danger mb-4" style="border-radius: 10px; font-weight: bold;">
            <i class="fa fa-plus me-1"></i> Crear nuevo proveedor
        </a>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($proveedores as $proveedor)
                <div class="col">
                    <div class="p-3" style="background-color: #f8f8f8; border: 2px solid #cc0000; border-radius: 20px;">
                        <p><strong>Nombre:</strong> {{ $proveedor->nombre }}</p>
                        <p><strong>Teléfono:</strong> {{ $proveedor->telefono ?? 'N/A' }}</p>
                        <p><strong>Correo:</strong> {{ $proveedor->correo }}</p>
                        <p><strong>Dirección:</strong> {{ $proveedor->direccion }}</p>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('proveedores.edit', $proveedor) }}" class="btn btn-warning btn-sm" style="border-radius: 8px;">
                                <i class="fa fa-edit"></i> Editar
                            </a>

                            <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar este proveedor?');">
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
