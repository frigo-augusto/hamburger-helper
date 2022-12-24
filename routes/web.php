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
    $itens = array("coca loca", "renan combinho", "combo carne velha");
    for($i = 0; $i < rand(10, 100); $i++){
        $pedidos[$i] = new \stdClass();
        for($j = 0; $j < rand(3, 100); $j++){
            $pedidos[$i]->id = $i + 1;
            $pedidos[$i]->item[$j] = new \stdClass();
            $pedidos[$i]->item[$j]->nome = $itens[rand(0,2)];
        }
    }
    return view('cozinheiro.main', ["pedidos" => $pedidos]);
})->name('cozinheiro');

Route::get('/caixa/{errors?}', function($errors = null){
    return view('caixa.main', [
        "errors" => $errors
    ]);
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

Route::get('caixa-pagar', function(){
    $categorias = array("combo", "hamburger", "bebida", "acompanhamento");
    $itens = array("coca loca", "renan combinho", "combo carne velha");
    for($i = 0; $i < rand(10, 100); $i++){
        $pedidos[$i] = new \stdClass();
        for($j = 0; $j < rand(3, 100); $j++){
            $pedidos[$i]->id = $i + 1;
            $pedidos[$i]->item[$j] = new \stdClass();
            $pedidos[$i]->item[$j]->tipo = $categorias[rand(0,3)];
            $pedidos[$i]->item[$j]->nome = $itens[rand(0,2)];
        }

    }
    return view('caixa.pagar', ["pedidos" => $pedidos]);
})->name('caixa.pagar');

Route::get('/atendente-excluir', function(){
    $categorias = array("combo", "hamburger", "bebida", "acompanhamento");
    $itens = array("coca loca", "renan combinho", "combo carne velha");
    for($i = 0; $i < rand(10, 100); $i++){
        $pedidos[$i] = new \stdClass();
        for($j = 0; $j < rand(3, 100); $j++){
            $pedidos[$i]->id = $i + 1;
            $pedidos[$i]->item[$j] = new \stdClass();
            $pedidos[$i]->item[$j]->tipo = $categorias[rand(0,3)];
            $pedidos[$i]->item[$j]->nome = $itens[rand(0,2)];
        }

    }
    return view('atendente.excluir', ["pedidos" => $pedidos]);
})->name('atendente.excluir');

Route::get('/caixa-excluir', function(){
    $categorias = array("combo", "hamburger", "bebida", "acompanhamento");
    $itens = array("coca loca", "renan combinho", "combo carne velha");
    for($i = 0; $i < rand(10, 100); $i++){
        $pedidos[$i] = new \stdClass();
        for($j = 0; $j < rand(3, 100); $j++){
            $pedidos[$i]->id = $i + 1;
            $pedidos[$i]->item[$j] = new \stdClass();
            $pedidos[$i]->item[$j]->tipo = $categorias[rand(0,3)];
            $pedidos[$i]->item[$j]->nome = $itens[rand(0,2)];
        }

    }
    return view('caixa.excluir', ["pedidos" => $pedidos]);
})->name('caixa.excluir');

Route::get('/atendente-editar', function(){
    return "nao implementado";
})->name('atendente.editar');

Route::post('/submit-order', [OrderController::class, 'new'])->name('submit-order');
Route::delete('/delete-order', [OrderController::class, 'destroy'])->name('delete-order');
Route::post('/pagar-order', [OrderController::class, 'pagar'])->name('pagar-order');
Route::delete('finalizar-order', [OrderController::class, 'finalizar'])->name('finalizar-order');
