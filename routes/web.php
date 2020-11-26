<?php


use App\Http\Controllers\Conexao;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/conexao/{id_solicitacao}', [Conexao::class,'whatever']);
Route::get('/conexao', [Conexao::class,'view']);
Route::get('/xmldecode', [Conexao::class,'decode']);