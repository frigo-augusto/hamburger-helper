<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function atendente($errors=null){
        return view('atendente.main', [
            "errors" => $errors]);
    }

    public function cozinheiro(){
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
    }

    public function caixa($errors=null){
        return view('caixa.main', [
            "errors" => $errors
        ]);
    }

    public function atendenteAdicionar(){
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
    }

    public function caixaPagar(){
        $itens = array("coca loca", "renan combinho", "combo carne velha");
        for($i = 0; $i < rand(10, 100); $i++){
            $pedidos[$i] = new \stdClass();
            for($j = 0; $j < rand(3, 100); $j++){
                $pedidos[$i]->id = $i + 1;
                $pedidos[$i]->item[$j] = new \stdClass();
                $pedidos[$i]->item[$j]->nome = $itens[rand(0,2)];
            }

        }
        return view('caixa.pagar', ["pedidos" => $pedidos]);
    }

    public function atendenteExcluir(){
        $itens = array("coca loca", "renan combinho", "combo carne velha");
        for($i = 0; $i < rand(10, 100); $i++){
            $pedidos[$i] = new \stdClass();
            for($j = 0; $j < rand(3, 100); $j++){
                $pedidos[$i]->id = $i + 1;
                $pedidos[$i]->item[$j] = new \stdClass();
                $pedidos[$i]->item[$j]->nome = $itens[rand(0,2)];
            }

        }
        return view('atendente.excluir', ["pedidos" => $pedidos]);
    }

    public function caixaExcluir(){
        $itens = array("coca loca", "renan combinho", "combo carne velha");
        for($i = 0; $i < rand(10, 100); $i++){
            $pedidos[$i] = new \stdClass();
            for($j = 0; $j < rand(3, 100); $j++){
                $pedidos[$i]->id = $i + 1;
                $pedidos[$i]->item[$j] = new \stdClass();
                $pedidos[$i]->item[$j]->nome = $itens[rand(0,2)];
            }

        }
        return view('caixa.excluir', ["pedidos" => $pedidos]);
    }
}
