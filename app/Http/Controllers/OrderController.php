<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function new(Request $request){
        if ($request->data != null){
            $order = Order::create();

            foreach ($request->data as $toAdd){
                if ($toAdd['origin'] == 'combo'){
                    $order->combo()->attach(
                        $toAdd['id'],
                        ['amount' => $toAdd['quantidade']
                        ]);
                }
                else if ($toAdd['origin'] == 'hamburger') {
                    $order->item()->attach(
                        $toAdd['id'],
                        ['amount' => $toAdd['quantidade']
                        ]);
                }
            }

            $order->save();
        }
    }

    public function destroy(Request $request){
        $ids = array();
        foreach ($request->data as $toDestroy)
        {
            $ids[] = $toDestroy['id'];
        }
        Order::destroy($ids);
    }

    public function pagar(Request $request){
        return $request->data;
    }

    public function finalizar(Request $request){
        return "form de finalizar!!";
    }
}
