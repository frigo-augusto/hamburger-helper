<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ViewParameterService;
use Illuminate\View\View;

class ViewController extends Controller
{
    public function atendente($errors=null){
        return view('atendente.main', [
            "errors" => $errors]);
    }

    public function cozinheiro(){
        $pedidos = ViewParameterService::getOrders();
        return view('cozinheiro.main', ["pedidos" => $pedidos]);
    }

    public function caixa($errors=null){
        return view('caixa.main', [
            "errors" => $errors
        ]);
    }

    public function atendenteAdicionar(){
        $orderTypes = ViewParameterService::getOrderTypes();
        return view('atendente.adicionar', [
            "combo" => $orderTypes->combo,
            "order" =>  $orderTypes->order,
        ]);
    }

    public function caixaPagar(){
        $pedidos = ViewParameterService::getOrders();
        return view('caixa.pagar', ["pedidos" => $pedidos]);
    }

    public function atendenteExcluir(){
        $pedidos = ViewParameterService::getOrders();
        return view('atendente.excluir', ["pedidos" => $pedidos]);
    }

    public function caixaExcluir(){
        $pedidos = ViewParameterService::getOrders();
        return view('caixa.excluir', ["pedidos" => $pedidos]);
    }

    public function administrador($errors=null){
        return view('administrador.main', ["errors" => $errors]);
    }

    public function administradorProdutos(){
        //$produtos = Produto::all();
        $produtos = ViewParameterService::getAllProducts();
        $ingredientes = ViewParameterService::getAllIngredients();
        return view('administrador.produtos', [
            "produtos" => $produtos,
            "ingredientes" => $ingredientes]);
    }

    public function administradorCombos(){
        $combos = ViewParameterService::getAllCombos();
        $produtos = ViewParameterService::getAllProducts();
        return view('administrador.combos', [
            "combos" => $combos,
            "produtos" => $produtos]);
    }

    public function administradorIngredientes(){
        $ingredientes = ViewParameterService::getAllIngredients();
        return view('administrador.ingredientes', [
            "ingredientes" => $ingredientes]);
    }
}
