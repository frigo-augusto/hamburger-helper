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
}
