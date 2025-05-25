<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Controllers\Controller;
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

    }

    public function store(Request $request)
    {

    }

    public function edit(Categoria $categoria)
    {

    }

    public function update(Request $request, Categoria $categoria)
    {

    }

    public function destroy(Categoria $categoria)
    {

    }
}

