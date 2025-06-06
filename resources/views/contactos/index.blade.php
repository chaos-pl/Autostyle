@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="content">
        <style>
            .text-black-only {
                color: #000;
            }
        </style>

        <h2 class="fw-bold mb-4" style="color: #cc0000; text-shadow: 1px 1px 0 #000;">Lista de Contactos</h2>

       

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($contactos as $contacto)
                <div class="col">
                    <div class="p-3" style="background-color: #f8f8f8; border: 2px solid #cc0000; border-radius: 20px;">
                        <p><strong>Nombre:</strong> <span class="text-black-only">{{ $contacto->nombre }}</span></p>
                        <p><strong>Email:</strong> <span class="text-black-only">{{ $contacto->email }}</span></p>
                        <p><strong>Teléfono:</strong> <span class="text-black-only">{{ $contacto->telefono ?? 'N/A' }}</span></p>
                        <p><strong>Mensaje:</strong> <span class="text-black-only">{{ $contacto->mensaje }}</span></p>
                        <p><strong>Fecha:</strong> 
                            <span class="text-black-only">
                                {{ \Carbon\Carbon::parse($contacto->fecha)->format('d/m/Y H:i') }}
                            </span>
                        </p>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('contactos.edit', $contacto) }}" class="btn btn-warning btn-sm" style="border-radius: 8px;">
                                <i class="fa fa-edit"></i> Editar
                            </a>

                            <form action="{{ route('contactos.destroy', $contacto) }}" method="POST" onsubmit="return confirm('¿Deseas eliminar este contacto?');">
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
