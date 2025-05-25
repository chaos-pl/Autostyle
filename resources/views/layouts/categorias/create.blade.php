@extends('layouts.app')

@section('content')
    <h1>Crear Categoría</h1>
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <button type="submit">Guardar</button>
    </form>
@endsection
