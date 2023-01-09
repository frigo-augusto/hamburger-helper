<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Order;
use Exception;
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
                else if ($toAdd['origin'] == 'item') {
                    $order->item()->attach(
                        $toAdd['id'],
                        ['amount' => $toAdd['quantidade']
                        ]);
                }
            }

            $this->removeEstoque($order);
        }
    }

    public function destroy(Request $request){
        $ids = array();
        foreach ($request->data as $toDestroy)
        {
            $ids[] = $toDestroy['id'];
        }

        $orders = Order::find($ids);
        foreach ($orders as $order)
        {
            $this->restauraEstoque($order);
        }

        Order::destroy($ids);
    }

    public function pagar(Request $request)
    {
        foreach ($request->data as $data){
            $order = Order::find($data)->first();
            $order->paid = true;
            $order->save();
        }
    }

    public function finalizar(Request $request){
        $ids = array();
        $i = 0;

        foreach($request->data as $data){
            $ids[$i] = $data["id"];
            $i++;
        }
        Order::destroy($ids);

    }

    private function removeEstoque(Order $order)
    {
        $valueChange = array();

        foreach ($order->combo as $combo){
            foreach ($combo->item as $item){
                foreach ($item->ingredient as $ing){
                    $valueChange[$ing->id] = ($valueChange[$ing->id] ?? 0) + $combo->pivot->amount * $item->pivot->amount * $ing->pivot->amount;
                    if ($ing->amount < $valueChange[$ing->id])
                    {
                        Order::destroy($order->id);
                        throw new Exception('Insufficient ingredients in stock.');
                    }
                }
            }
        }

        foreach ($order->item as $item){
            foreach ($item->ingredient as $ing){
                $valueChange[$ing->id] = ($valueChange[$ing->id] ?? 0) + $item->pivot->amount * $ing->pivot->amount;
                if ($ing->amount < $valueChange[$ing->id])
                {
                    Order::destroy($order->id);
                    throw new Exception('Insufficient ingredients in stock.');
                }
            }
        }

        $ings = Ingredient::find(array_keys($valueChange));
        foreach ($ings as $ing)
        {
            $ing->amount -= $valueChange[$ing->id];
            $ing->save();
        }

        $order->save();
    }

    private function restauraEstoque(Order $order)
    {
        foreach ($order->combo as $combo){
            foreach ($combo->item as $item){
                foreach ($item->ingredient as $ing){
                    $ing->amount += $combo->pivot->amount * $item->pivot->amount * $ing->pivot->amount;
                    $ing->save();
                }
            }
        }

        foreach ($order->item as $item){
            foreach ($item->ingredient as $ing){
                $ing->amount += $item->pivot->amount * $ing->pivot->amount;
                $ing->save();
            }
        }
    }
}
