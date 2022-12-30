<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function editarProdutos(Request $request){
        if ($request->data != null)
        {
            $item = Item::find($request->itemId);
            $item->ingredient()->detach();

            foreach ($request->data as $ingredient)
            {
                $item->ingredient()->attach($ingredient);
            }
        }
    }

    public function criarIngredientes(Request $request){
        echo $request;
    }

    public function editarIngredientes(Request $request){
        echo $request;
    }

    public function excluirIngredientes(Request $request){
        $ingredient = Ingredient::find($request->id);
        if ($ingredient)
        {
            $ingredient->delete();
        }
        $a = DB::table('ingredients')->select('*')->get();
        echo $a;
    }

    public function  criarProdutos(Request $request){
        echo $request;
    }

    public function excluirProdutos(Request $request){
        $item = Item::find($request->id);
        if($item)
        {
            $item->delete();
        }
    }

    public function excluirCombos(Request $request){
        $combo = Item::find($request->id);
        if($combo)
        {
            $combo->delete();
        }
    }
}
