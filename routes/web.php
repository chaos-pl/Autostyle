<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Landing_page');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
