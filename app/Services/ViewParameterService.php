<?php

namespace App\Services;

use App\Models\Combo;
use App\Models\Ingredient;
use App\Models\Item;
use App\Models\Order;

class ViewParameterService
{
    public static function getOrders(){
        $pedidos = array();
        $pedidosDB = Order::all();

        for($i = 0; $i < $pedidosDB->count(); $i++){
            $pedidos[$i] = new \stdClass();
            $pedidos[$i]->id = $i + 1;
            for($j = 0; $j < $pedidosDB[$i]->item->count(); $j++){
                $pedidos[$i]->item[$j] = new \stdClass();
                $pedidos[$i]->item[$j]->nome = $pedidosDB[$i]->item[$j]->nome;
            }
        }
        return $pedidos;
    }

    public static function getOrderTypes(){
        $orderTypes = new \stdClass();
        for($i = 1; $i <= 100; $i++){
            $orderTypes->combo[$i - 1] = new \stdClass();
            $orderTypes->order[$i-1] = new \stdClass();
            $orderTypes->combo[$i - 1]->id = $i;
            $orderTypes->combo[$i - 1]->nome = "combo" . $i;
            $orderTypes->order[$i-1]->id = $i;
            $orderTypes->order[$i-1]->nome = "hamburger" . $i;
        }
        return $orderTypes;
    }

    public static function getAllCombos(){
        $combos = array();
        $combosDB = Combo::all();

        for($i = 0; $i < $combosDB->count(); $i++){
            $combos[$i] = new \stdClass();
            $combos[$i]->id = $i + 1;
            $combos[$i]->name = $combosDB[$i]->name;
        }
        return $combos;
    }

    public static function getAllProducts(){
        $produtos = array();
        $prodBD = Item::all();

        for($i = 0; $i < $prodBD->count(); $i++){
            $produtos[$i] = new \stdClass();
            $produtos[$i]->id = $i + 1;
            $produtos[$i]->name = $prodBD[$i]->name;
        }
        return $produtos;
    }

    public static function getAllIngredients(){
        $ingredients = array();
        $ingBD = Ingredient::all();

        for($i = 0; $i < $ingBD->count(); $i++){
            $ingredients[$i] = new \stdClass();
            $ingredients[$i]->id = $i + 1;
            $ingredients[$i]->name = $ingBD[$i]->name;
        }
        return $ingredients;
    }
}
