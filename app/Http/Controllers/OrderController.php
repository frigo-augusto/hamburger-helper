<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function new(Request $request){
        Log::info($request->data);
    }

    public function destroy(Request $request){
        dd($request->data);
    }

    public function pagar(Request $request)
    {
        $order = Order::find($request->data->id);
        $order->paid = true;
        $order->save();
    }

    public function finalizar(Request $request){
        Order::find($request->data->id)->delete();
    }
}
