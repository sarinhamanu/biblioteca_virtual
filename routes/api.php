<?php

use App\Http\Controllers\livrosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Routas da Biblioteca
Route::post('livro/cadastro',[livrosController::class,'store']);
Route::get('livro/find/{id}',[livrosController::class,'pesquisaPorId']);
Route::get('livro/retornarTodos',[livrosController::class,'retornarTodos']);
Route::post('livro/procurarNome',[livrosController::class, 'pesquisarPorTitulo']);
Route::delete('livro/excluir/{id}',[livrosController::class, 'excluir']);
Route::put('livro/update', [livrosController::class, 'update']);