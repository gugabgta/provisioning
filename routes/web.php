<?php

use App\Http\Controllers\Conexao;
use Illuminate\Support\Facades\Route;

Route::get('/conexao', [Conexao::class,'view']);

// solicitacoes
Route::get('/problems', [Conexao::class,'decode']);
Route::post('/resolve',[Conexao::class,'resolve']);
