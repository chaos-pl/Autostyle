@extends('layouts.app')

@section('content')
    <style>
        @font-face {
            font-family: 'Bebas Neue';
            src: url('{{ asset('fonts/bebasneue/BebasNeue-Regular.ttf') }}') format('truetype');
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            font-family: 'Bebas Neue', sans-serif;
        }

        .form-container h2 {
            color: #cc0000;
            text-shadow: 1px 1px 2px #000;
            margin-bottom: 20px;
        }

        label {
            color: #cc0000;
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-danger {
            background-color: #cc0000;
            border-color: #cc0000;
        }

        .btn-danger:hover {
            background-color: #990000;
            border-color: #990000;
        }
    </style>

    <div class="form-container">
        <h2>Editar Categoría</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $categoria->nombre) }}" required>
            </div>

            <button type="submit" class="btn btn-danger">Actualizar</button>
        </form>
    </div>
@endsection
