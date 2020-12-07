<?php

use App\Http\Controllers\Conexao;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/conexao', [Conexao::class,'view']);
/*Route::get('/problems', function(){
    return '{"a":1,"b":2,"c":3,"d":4,"e":5}';
});*/
Route::get('/problems', [Conexao::class,'decode']);
Route::post('/resolve',[Conexao::class,'resolve']);