<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::with('persona')->paginate(6);
        return view('clientes.index', compact('clientes'));
    }


    public function create()
    {
        $personas = Persona::all();
        return view('clientes.create', compact('personas'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_persona' => 'required|exists:personas,id',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente creado con éxito.');
    }


    public function show(Cliente $cliente)
    {
        $cliente->load('persona');
        return view('clientes.show', compact('cliente'));
    }


    public function edit(Cliente $cliente)
    {
        $personas = Persona::all();
        return view('clientes.edit', compact('cliente', 'personas'));
    }


    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'id_persona' => 'required|exists:personas,id',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }


    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
