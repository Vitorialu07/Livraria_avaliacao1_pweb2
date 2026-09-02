<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivrariaController;

Route::get('/', function () {
    return view('main');
});

Route::get('/livraria', [LivrariaController::class, 'index']);
Route::get('/livraria/create', [LivrariaController::class, 'create']);
Route::post(
    '/livraria/store',
    [LivrariaController::class, 'store']
)->name('livraria.store');

Route::get('/livraria/edit/{id}',
    [LivrariaController::class, 'edit'])->name('livraria.edit');
Route::put(
    '/livraria/update/{id}',
    [LivrariaController::class, 'update']
)->name('livraria.update');

Route::delete(
    '/livraria/{id}',
    [LivrariaController::class, 'destroy']
)->name('livraria.destroy');

Route::post(
    '/livraria/search',
    [LivrariaController::class, 'search']
)->name('livraria.search');

Route::post(
    '/usuario/store',
    [UsuarioController::class, 'store']
)->name('usuario.store');

Route::get('/usuario/edit/{id}',
    [UsuarioController::class, 'edit'])->name('usuario.edit');
Route::put(
    '/usuario/update/{id}',
    [UsuarioController::class, 'update']
)->name('usuario.update');

Route::delete(
    '/usuario/{id}',
    [UsuarioController::class, 'destroy']
)->name('usuario.destroy');

Route::post(
    '/usuario/search',
    [UsuarioController::class, 'search']
)->name('usuario.search');
Route::get('/clientes', function () {
    return view('clientes'); 
});
