<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Item;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function editarProdutos(Request $request){
        if ($request->data != null)
            {
                print_r($request->itemId);
                $item = Item::find($request->itemId);
                $item->ingredient()->detach();
                $item->ingredient()->attach($request->data);

                //$query = Ingredient::where('id', $request->itemId)
                //    join('item_ingredient', 'ingredient_id', '=', 'id')
                //    ->get();
                //var_dump($request->data);
            }
    }

    public function criarIngredientes(Request $request){
        echo $request;
    }

    public function excluirIngredientes(Request $request){
        echo $request;
    }



    public function excluirCombos(Request $request){
        echo $request;
    }
}
