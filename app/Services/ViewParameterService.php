<?php

namespace App\Services;

class ViewParameterService
{
    public static function getOrders(){
        $itens = array("coca loca", "renan combinho", "combo carne velha");
        for($i = 0; $i < rand(10, 100); $i++){
            $pedidos[$i] = new \stdClass();
            for($j = 0; $j < rand(3, 100); $j++){
                $pedidos[$i]->id = $i + 1;
                $pedidos[$i]->item[$j] = new \stdClass();
                $pedidos[$i]->item[$j]->nome = $itens[rand(0,2)];
            }
        }
        return $pedidos;
    }

    public static function getOrderTypes(){
        $orderTypes = new \stdClass();
        for($i = 1; $i <= 100; $i++){
            $orderTypes->combo[$i - 1] = new \stdClass();
            $orderTypes->hamburger[$i-1] = new \stdClass();
            $orderTypes->bebida[$i-1] = new \stdClass();
            $orderTypes->acompanhamento[$i - 1] = new \stdClass();
            $orderTypes->combo[$i - 1]->id = $i;
            $orderTypes->combo[$i - 1]->nome = "combo" . $i;
            $orderTypes->hamburger[$i-1]->id = $i;
            $orderTypes->hamburger[$i-1]->nome = "hamburger" . $i;
            $orderTypes->bebida[$i-1]->id = $i;
            $orderTypes->bebida[$i-1]->nome = "bebida". $i;
            $orderTypes->acompanhamento[$i - 1]->id = $i;
            $orderTypes->acompanhamento[$i - 1]->nome = "acompanhamento" . $i;
        }
        return $orderTypes;
    }

    public static function getAllCombos(){
        $combos = array();
        for($i = 0; $i < 100; $i++){
            $combos[$i] = new \stdClass();
            $combos[$i]->id = $i + 1;
            $combos[$i]->name = "combola" . ($i + 1);
            for($j = 0; $j< rand(1, 5); $j++) {
                $combos[$i]->products[$j] = new \stdClass();
                $combos[$i]->products[$j]->name = "habugue". ($j + 1);
                $combos[$i]->products[$j]->id = $j + 1;
                $combos[$i]->products[$j]->amount = rand(1,4);
            }
        }
        return $combos;
    }

    public static function getAllProducts(){
        $produtos = array();
        for($i = 0; $i < 100; $i++){
            $produtos[$i] = new \stdClass();
            $produtos[$i]->id = $i + 1;
            $produtos[$i]->name = "habugue" . ($i + 1);
            for($j = 0; $j< rand(1, 5); $j++) {
                $produtos[$i]->ingredients[$j] = new \stdClass();
                $produtos[$i]->ingredients[$j]->name = "alface". ($j + 1);
                $produtos[$i]->ingredients[$j]->id = $j + 1;
                $produtos[$i]->ingredients[$j]->amount = rand(1,4);
            }
        }
        return $produtos;
    }

    public static function getAllIngredients(){
        $ingredients = array();
        for($i = 0; $i < 100; $i++){
            $ingredients[$i] = new \stdClass();
            $ingredients[$i]->id = $i + 1;
            $ingredients[$i]->name = "alface" . ($i + 1);
            $ingredients[$i]->amount = 24;
        }
        return $ingredients;
    }
}
