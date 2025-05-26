@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="container">
        <h2 class="mb-4" style="color: #cc0000;">Crear nuevo cliente</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="id_persona" class="form-label">Seleccionar persona</label>
                <select name="id_persona" class="form-control" required>
                    <option value="">-- Selecciona una persona --</option>
                    @foreach($personas as $persona)
                        <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Guardar cliente</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection

