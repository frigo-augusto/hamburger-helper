<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AdminController;

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

Route::get('/atendente/{errors?}', [ViewController::class, 'atendente'])->name('atendente');
Route::get('/cozinheiro', [ViewController::class, 'cozinheiro'])->name('cozinheiro');
Route::get('/caixa/{errors?}', [ViewController::class, 'caixa'])->name('caixa');
Route::get('/atendente-adicionar', [ViewController::class, 'atendenteAdicionar'])->name('atendente.adicionar');
Route::get('caixa-pagar', [ViewController::class, 'caixaPagar'])->name('caixa.pagar');
Route::get('/atendente-excluir', [ViewController::class, 'atendenteExcluir'])->name('atendente.excluir');
Route::get('/caixa-excluir', [ViewController::class, 'caixaExcluir'])->name('caixa.excluir');

Route::post('/submit-order', [OrderController::class, 'new'])->name('submit-order');
Route::delete('/delete-order', [OrderController::class, 'destroy'])->name('delete-order');
Route::post('/pagar-order', [OrderController::class, 'pagar'])->name('pagar-order');
Route::delete('finalizar-order', [OrderController::class, 'finalizar'])->name('finalizar-order');

Route::get('/admnistrador', [ViewController::class, 'admnistrador'])->name('admnistrador');
Route::get('/admnistrador-produtos', [ViewController::class, 'admnistradorProdutos'])->name('admnistrador.produtos');
