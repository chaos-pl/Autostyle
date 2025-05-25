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
Route::resource('proveedores', App\Http\Controllers\ProveedoresController::class);

