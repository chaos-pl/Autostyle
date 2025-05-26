<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Landing_page');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('categorias', CategoriaController::class);

Route::resource('autos', App\Http\Controllers\AutoController::class);
Route::resource('proveedores', App\Http\Controllers\ProveedoresController::class)
    ->parameters(['proveedores' => 'proveedor']);

Route::resource('personas', App\Http\Controllers\personaController::class);
Route::resource('empleados', App\Http\Controllers\EmpleadoController::class);
Route::resource('productos', App\Http\Controllers\ProductoController::class);

Route::resource('clientes', App\Http\Controllers\ClienteController::class);
use App\Http\Controllers\ProductoProveedorController;
use App\Http\Controllers\ContactoController;

Route::resource('producto_proveedor', ProductoProveedorController::class);
Route::resource('contactos', ContactoController::class);


