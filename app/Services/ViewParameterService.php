<?php

namespace App\Services;

use App\Models\Combo;
use App\Models\Ingredient;
use App\Models\Item;
use App\Models\Order;

class ViewParameterService
{
    public static function getUnpaidOrders(){
        $pedidos = array();
        $pedidosDB = Order::where('paid', false)->get();

        for($i = 0; $i < $pedidosDB->count(); $i++){
            $pedidos[$i] = new \stdClass();
            $pedidos[$i]->id = $pedidosDB[$i]->id;
            for($j = 0; $j < $pedidosDB[$i]->item->count(); $j++){
                $pedidos[$i]->item[$j] = new \stdClass();
                $pedidos[$i]->item[$j]->nome = $pedidosDB[$i]->item[$j]->name;
                $pedidos[$i]->item[$j]->quantidade = $pedidosDB[$i]->item[$j]->pivot->amount;
            }
            for($j = 0; $j < $pedidosDB[$i]->combo->count(); $j++){
                $pedidos[$i]->combo[$j] = new \stdClass();
                $pedidos[$i]->combo[$j]->nome = $pedidosDB[$i]->combo[$j]->name;
                $pedidos[$i]->combo[$j]->quantidade = $pedidosDB[$i]->combo[$j]->pivot->amount;
            }
        }
        return $pedidos;
    }

    public static function getPaidOrders(){
        $pedidos = array();
        $pedidosDB = Order::where('paid', true)->get();

        for($i = 0; $i < $pedidosDB->count(); $i++){
            $pedidos[$i] = new \stdClass();
            $pedidos[$i]->id = $pedidosDB[$i]->id;
            for($j = 0; $j < $pedidosDB[$i]->item->count(); $j++){
                $pedidos[$i]->item[$j] = new \stdClass();
                $pedidos[$i]->item[$j]->nome = $pedidosDB[$i]->item[$j]->name;
                $pedidos[$i]->item[$j]->quantidade = $pedidosDB[$i]->item[$j]->pivot->amount;
            }
            for($j = 0; $j < $pedidosDB[$i]->combo->count(); $j++){
                $pedidos[$i]->combo[$j] = new \stdClass();
                $pedidos[$i]->combo[$j]->nome = $pedidosDB[$i]->combo[$j]->name;
                $pedidos[$i]->combo[$j]->quantidade = $pedidosDB[$i]->combo[$j]->pivot->amount;
            }
        }

        return $pedidos;
    }

    public static function getOrderTypes(){
        $orderTypes = new \stdClass();
        $orderTypes->combo = Combo::all();
        $orderTypes->item = Item::all();

        return $orderTypes;
    }

    public static function getAllCombos(){
        $combos = array();
        $combosDB = Combo::all();

        for($i = 0; $i < $combosDB->count(); $i++){
            $combos[$i] = new \stdClass();
            $combos[$i]->id = $combosDB[$i]->id;
            $combos[$i]->name = $combosDB[$i]->name;

            $products = array();
            for ($j = 0; $j < $combosDB[$i]->item->count(); $j++){
                $products[$j] = new \stdClass();
                $products[$j]->name = $combosDB[$i]->item[$j]->name;
                $products[$j]->id = $combosDB[$i]->item[$j]->id;
                $products[$j]->amount = $combosDB[$i]->item[$j]->pivot->amount;
            }
            $combos[$i]->products = $products;
        }
        return $combos;
    }

    public static function getAllProducts(){
        $produtos = array();
        $prodBD = Item::all();

        for($i = 0; $i < $prodBD->count(); $i++){
            $produtos[$i] = new \stdClass();
            $produtos[$i]->id = $prodBD[$i]->id;
            $produtos[$i]->name = $prodBD[$i]->name;

            $ings = array();
            for ($j = 0; $j < $prodBD[$i]->ingredient->count(); $j++){
                $ings[$j] = new \stdClass();
                $ings[$j]->name = $prodBD[$i]->ingredient[$j]->name;
                $ings[$j]->id = $prodBD[$i]->ingredient[$j]->id;
                $ings[$j]->amount = $prodBD[$i]->ingredient[$j]->pivot->amount;
            }

            $produtos[$i]->ingredients = $ings;
        }
        return $produtos;
    }

    public static function getAllIngredients(){
        $ingredients = array();
        $ingBD = Ingredient::all();

        for($i = 0; $i < $ingBD->count(); $i++){
            $ingredients[$i] = new \stdClass();
            $ingredients[$i]->id = $ingBD[$i]->id;
            $ingredients[$i]->name = $ingBD[$i]->name;
            $ingredients[$i]->amount = $ingBD[$i]->amount;
        }
        return $ingredients;
    }
}
