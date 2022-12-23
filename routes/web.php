<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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

Route::get('/atendente/{errors?}', function($errors=null){
    return view('atendente.main', [
        "errors" => $errors]);
})->name('atendente');

Route::get('/cozinheiro', function(){
    return "não implementado";
})->name('cozinheiro');

Route::get('/caixa', function(){
    return "nao implementado";
})->name('caixa');

Route::get('/atendente-adicionar', function(){
    for($i = 1; $i <= 100; $i++){
        $combo[$i - 1] = new \stdClass();
        $hamburger[$i-1] = new \stdClass();
        $bebida[$i-1] = new \stdClass();
        $acompanhamento[$i - 1] = new \stdClass();
        $combo[$i - 1]->id = $i;
        $combo[$i - 1]->nome = "combo" . $i;
        $hamburger[$i-1]->id = $i;
        $hamburger[$i-1]->nome = "hamburger" . $i;
        $bebida[$i-1]->id = $i;
        $bebida[$i-1]->nome = "bebida". $i;
        $acompanhamento[$i - 1]->id = $i;
        $acompanhamento[$i - 1]->nome = "acompanhamento" . $i;
    }
    return view('atendente.adicionar', [
        "combo" => $combo,
        "hamburger" =>  $hamburger,
        "bebida" => $bebida,
        "acompanhamento" => $acompanhamento
    ]);
})->name('atendente.adicionar');

Route::get('/atendente-editar', function(){
    return "nao implementado";
})->name('atendente.editar');

Route::get('/atendente-excluir', function(){
    return "nao implementado";
})->name('atendente.excluir');

Route::post('/submit-order', [OrderController::class, 'new'])->name('submit-order');
