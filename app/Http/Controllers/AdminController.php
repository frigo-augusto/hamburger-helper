<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use App\Models\Ingredient;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function criarIngredientes(Request $request){
        $ingredientData = array('name' => $request->name, 'amount' => $request->amount);
        Ingredient::create($ingredientData);
        $teste2 = DB::table('items_ingredients')->get();
        echo $teste2;
    }

    public function editarIngredientes(Request $request){
        $ing = Ingredient::find($request->id);
        $ing->name = $request->name;
        $ing->amount = $request->amount;
        $ing->save();
    }

    public function excluirIngredientes(Request $request){
        Ingredient::destroy($request->id);
    }

    public function  criarProdutos(Request $request){
        if ($request->data != null)
        {
            $item = Item::create(array('name' => $request->name));

            foreach ($request->data as $ingredient)
            {
                $item->ingredient()->attach($ingredient['id'], ['amount' => $ingredient['amount']]);
            }
            $item->save();
        }
    }

    public function editarProdutos(Request $request){
        if ($request->data != null)
        {
            $item = Item::find($request->itemId);

            $item->name = $request->name;
            $item->ingredient()->detach();

            foreach ($request->data as $ingredient)
            {
                $item->ingredient()->attach($ingredient['id'], ['amount' => $ingredient['amount']]);
            }

            $item->save();
        }
    }

    public function excluirProdutos(Request $request){
        Item::destroy($request->id);
    }

    public function criarCombos(Request $request){
        if ($request->data != null)
        {
            $combo = Combo::create(array('name' => $request->name));

            foreach ($request->data as $item)
            {
                $combo->item()->attach($item['id'], ['amount' => $item['amount']]);
            }
            $combo->save();
        }
    }

    public function editarCombos(Request $request){
        if ($request->data != null) {
            $combo = Combo::find($request->itemId);

            $combo->name = $request->name;
            $combo->item()->detach();

            foreach ($request->data as $item) {
                $combo->item()->attach($item['id'], ['amount' => $item['amount']]);
            }
            $combo->save();
        }
    }

    public function excluirCombos(Request $request){
        Combo::destroy($request->id);
    }
}
