<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivrariaController;
use App\Http\Controllers\UsuarioController; 
use App\Http\Controllers\AvaliacaoController;

Route::get('/', function () {
    return view('main');
});

// Rotas de Livraria
Route::get('/livraria',[LivrariaController::class, 'index']);
Route::get('/livraria/create', [LivrariaController::class, 'create']);
Route::post('/livraria/store', [LivrariaController::class, 'store'])->name('livraria.store');
Route::get('/livraria/edit/{id}', [LivrariaController::class, 'edit'])->name('livraria.edit');
Route::put('/livraria/update/{id}', [LivrariaController::class, 'update'])->name('livraria.update');
Route::delete('/livraria/{id}', [LivrariaController::class, 'destroy'])->name('livraria.destroy');
Route::post('/livraria/search', [LivrariaController::class, 'search'])->name('livraria.search'); // Alterado para GET se for busca por URL

// Rotas de Usuário
Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario.index'); // 2. ROTA GET ADICIONADA
Route::get('/usuario/create', [UsuarioController::class, 'create'])->name('usuario.create'); // 2. ROTA GET ADICIONADA
Route::post('/usuario/store', [UsuarioController::class, 'store'])->name('usuario.store');
Route::get('/usuario/edit/{id}', [UsuarioController::class, 'edit'])->name('usuario.edit');
Route::put('/usuario/update/{id}', [UsuarioController::class, 'update'])->name('usuario.update');
Route::delete('/usuario/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');
Route::post('/usuario/search', [UsuarioController::class, 'search'])->name('usuario.search'); // Alterado para GET se for busca por URL

Route::get('/clientes', function () {
    return view('clientes'); 
});

// Rotas de Avaliação 
Route::get('/avaliacao', [AvaliacaoController::class, 'index'])->name('avaliacao.index'); // 2. ROTA GET ADICIONADA
Route::get('/avaliacao/create', [AvaliacaoController::class, 'create'])->name('avaliacao.create'); 
Route::post('/avaliacao/store', [AvaliacaoController::class, 'store'])->name('avaliacao.store');
Route::get('/avaliacao/edit/{id}', [AvaliacaoController::class, 'edit'])->name('avaliacao.edit');
Route::put('/avaliacao/update/{id}', [AvaliacaoController::class, 'update'])->name('avaliacao.update');
Route::delete('/avaliacao/{id}', [AvaliacaoController::class, 'destroy'])->name('avaliacao.destroy');
Route::post('/avaliacao/search', [AvaliacaoController::class, 'search'])->name('avaliacao.search'); 