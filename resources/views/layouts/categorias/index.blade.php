@extends('layouts.app')

@section('content')
    <h1>Categorías</h1>
    <a href="{{ route('categorias.create') }}">Crear nueva</a>
    <ul>
        @foreach($categorias as $categoria)
            <li>{{ $categoria->nombre }}
                <a href="{{ route('categorias.edit', $categoria) }}">Editar</a>
                <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
