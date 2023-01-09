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
Route::get('/cozinheiro/{errors?}', [ViewController::class, 'cozinheiro'])->name('cozinheiro');
Route::get('/caixa/{errors?}', [ViewController::class, 'caixa'])->name('caixa');
Route::get('/atendente-adicionar', [ViewController::class, 'atendenteAdicionar'])->name('atendente.adicionar');
Route::get('/caixa-pagar', [ViewController::class, 'caixaPagar'])->name('caixa.pagar');
Route::get('/atendente-excluir', [ViewController::class, 'atendenteExcluir'])->name('atendente.excluir');
Route::get('/caixa-excluir', [ViewController::class, 'caixaExcluir'])->name('caixa.excluir');

Route::post('/submit-order', [OrderController::class, 'new'])->name('submit-order');
Route::delete('/delete-order', [OrderController::class, 'destroy'])->name('delete-order');
Route::post('/pagar-order', [OrderController::class, 'pagar'])->name('pagar-order');
Route::delete('/finalizar-order', [OrderController::class, 'finalizar'])->name('finalizar-order');

Route::get('/administrador/{errors?}', [ViewController::class, 'administrador'])->name('administrador');
Route::get('/administrador-produtos', [ViewController::class, 'administradorProdutos'])->name('administrador.produtos');
Route::post('/administrador-criar-produtos', [AdminController::class, 'criarProdutos'])->name('administrador.criar-produtos');
Route::put('/administrador-editar-produtos', [AdminController::class, 'editarProdutos'])->name('administrador.editar-produtos');
Route::delete('/administrador-editar-produtos', [AdminController::class, 'excluirProdutos'])->name('administrador.excluir-produtos');
Route::get('/administrador-combos', [ViewController::class, 'administradorCombos'])->name('administrador.combos');
Route::post('/administrador-criar-combos', [AdminController::class, 'criarCombos'])->name('administrador.criar-combos');
Route::put('/administrador-editar-combos', [AdminController::class, 'editarCombos'])->name('administrador.editar-combos');
Route::delete('/administrador-excluir-combos', [AdminController::class, 'excluirCombos'])->name('administrador.excluir-combos');
Route::get('/administrador-ingredientes', [ViewController::class, 'administradorIngredientes'])->name('administrador.ingredientes');
Route::post('/administrador-criar-ingredientes', [AdminController::class, 'criarIngredientes'])->name('administrador.criar-ingredientes');
Route::put('/administrador-editar-ingredientes', [AdminController::class, 'editarIngredientes'])->name('administrador.editar-ingredientes');
Route::delete('/administrador-excluir-ingredientes', [AdminController::class, 'excluirIngredientes'])->name('administrador.excluir-ingredientes');
