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
})->name('home');

Route::get('/atendente', function(){
    return view('atendente.main');
})->name('atendente');

Route::get('/cozinheiro', function(){
    return "não implementado";
})->name('cozinheiro');

Route::get('/caixa', function(){
    return "nao implementado";
})->name('caixa');

Route::get('/atendente-adicionar', function(){
    for($i = 1; $i <= 10; $i++){
        $hamburger[$i-1] = new \stdClass();
        $bebida[$i-1] = new \stdClass();
        $hamburger[$i-1]->id = $i;
        $hamburger[$i-1]->nome = "hamburger" . $i;
        $bebida[$i-1]->id = $i;
        $bebida[$i-1]->nome = "bebida". $i;
    }
    return view('atendente.adicionar', [
        "hamburger" =>  $hamburger,
        "bebida" => $bebida
    ]);
})->name('atendente.adicionar');

Route::get('/atendente-editar', function(){
    return "nao implementado";
})->name('atendente.editar');

Route::get('/atendente-excluir', function(){
    return "nao implementado";
})->name('atendente.excluir');
