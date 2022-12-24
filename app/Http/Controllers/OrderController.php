<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function new(Request $request){
        throw new \Exception();
    }

    public function destroy(Request $request){
        dd($request->data);
    }
}
