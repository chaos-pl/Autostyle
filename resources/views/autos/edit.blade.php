@extends('layouts.app')

@section('content')
    <h1>Editar Auto</h1>

    <form action="{{ route('autos.update', $auto) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Cliente ID:</label>
        <input type="number" name="cliente_id" value="{{ $auto->cliente_id }}" required>

        <label>Marca:</label>
        <input type="text" name="marca" value="{{ $auto->marca }}">

        <label>Modelo:</label>
        <input type="text" name="modelo" value="{{ $auto->modelo }}">

        <label>Año:</label>
        <input type="number" name="año" value="{{ $auto->año }}">

        <button type="submit">Actualizar</button>
    </form>
@endsection
