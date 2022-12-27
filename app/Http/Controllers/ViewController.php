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
            "hamburger" =>  $orderTypes->hamburger,
            "bebida" => $orderTypes->bebida,
            "acompanhamento" => $orderTypes->acompanhamento
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

    public function admnistrador(){
        return view('admnistrador.main');
    }

    public function admnistradorProdutos(){
        return view('admnistrador.produtos');
    }
}
