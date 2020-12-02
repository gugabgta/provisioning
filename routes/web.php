<?php

use App\Http\Controllers\Conexao;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/conexao', [Conexao::class,'decode']);