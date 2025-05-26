<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $categorias = Categoria::with('productos')->get();
        return view('landing_page', compact('categorias'));
    }
}
