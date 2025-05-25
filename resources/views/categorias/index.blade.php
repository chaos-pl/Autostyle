@extends('layouts.app')

@section('content')
    <style>
        @font-face {
            font-family: 'Bebas Neue';
            src: url('{{ asset('fonts/bebasneue/BebasNeue-Regular.ttf') }}') format('truetype');
        }

        .content-wrapper {
            max-width: 1000px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: 'Bebas Neue', sans-serif;
        }

        h2 {
            color: #cc0000;
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px #000;
        }

        .btn-danger {
            background-color: #cc0000;
            border-color: #cc0000;
        }

        .btn-danger:hover {
            background-color: #a60000;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            padding: 12px 16px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .table th {
            background-color: #cc0000;
            color: white;
        }

        .table td {
            color: #333;
        }

        .btn-group {
            display: flex;
            gap: 10px;
        }
    </style>

    <div class="content-wrapper">
        <h2>Categorías</h2>

        <a href="{{ route('categorias.create') }}" class="btn btn-danger mb-3">Crear nueva categoría</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>
                        <div class="btn-group">

                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-outline-primary">Editar</a>

                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

            @if($categorias->isEmpty())
                <tr>
                    <td colspan="3">No hay categorías registradas.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
