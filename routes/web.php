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

/*
Route::get('/aluno', function () {
    return view('aluno.list');
    //return "<h3>Olá mundo Laravel!</h3>";
});
*/
