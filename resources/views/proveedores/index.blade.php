@extends('layouts.dashboard')
@section('dashboard-content')
       
            <h2 class="fw-bold">Lista de Proveedores</h2>

            <a href="{{ route('proveedores.create') }}" class="btn btn-danger mb-3">Crear nuevo proveedor</a>

            @foreach($proveedores as $proveedor)
                <div class="proveedor-card">
                    <p><strong>Nombre:</strong> {{ $proveedor->nombre }}</p>
                    <p><strong>Teléfono:</strong> {{ $proveedor->telefono ?? 'N/A' }}</p>
                    <p><strong>Correo:</strong> {{ $proveedor->correo }}</p>
                    <p><strong>Dirección:</strong> {{ $proveedor->direccion }}</p>

                    <a href="{{ route('proveedores.edit', $proveedor) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </div>
            @endforeach
@endsection
