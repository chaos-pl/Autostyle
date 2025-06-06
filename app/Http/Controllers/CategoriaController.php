<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }


    public function create()
    {
        return view('categorias.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:191',
        ]);

        Categoria::create([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoría creada con éxito');
    }


    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }


    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|max:191',
        ]);

        $categoria->update([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente');
    }


    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente');
    }
}
