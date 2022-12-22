<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/atendente', function(){
    return view('atendente');
})->name('atendente');

Route::get('/cozinheiro', function(){
    return "não implementado";
})->name('cozinheiro');

Route::get('/caixa', function(){
    return "nao implementado";
})->name('caixa');

Route::get('/atendente-adicionar', function(){
    return "nao implementado";
})->name('atendente.adicionar');

Route::get('/atendente-editar', function(){
    return "nao implementado";
})->name('atendente.editar');

Route::get('/atendente-excluir', function(){
    return "nao implementado";
})->name('atendente.excluir');
