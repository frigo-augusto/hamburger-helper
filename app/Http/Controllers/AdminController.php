<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function editarProdutos(Request $request){
        echo $request;
        foreach(\App\Models\Ingredient::all() as $ing) {
            echo $ing->name;
        }
    }

    public function criarIngredientes(Request $request){
        echo $request;
    }

    public function excluirIngredientes(Request $request){
        echo $request;
    }

    public function excluirProdutos(Request $request){
        echo $request;
    }

    public function excluirCombos(Request $request){
        echo $request;
    }
}
