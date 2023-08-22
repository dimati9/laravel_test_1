<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{
    public function submit(Request $req) {

        $data = $req->validate([
            "count"  => function ($req, $item) { 
                if((int)$item[0] <= 0 && (int)$item[1] <= 0 && (int)$item[2] <= 0) {
                    $error = \Illuminate\Validation\ValidationException::withMessages([
                        'noitems' => ['Нельзя создать заказ без товаров'],
                      ]);
                     throw $error;

                };
               
            }
        ]);

        $items = "";
        $price = 0;
        
        foreach($req->count as $key => $c) {
            if((int)$c > 0) {
                $items .= $req->name[$key] . ":" . $c . ",";
                $price += $req->price[$key]*(int)$c;
            };
        }

       
       
        $order = new Order();
        $order->price = $price;
        $order->items = trim($items, ",");

        $order->save();

        return redirect("/?good");
        
    }


    public function allData() {
        $orders = Order::all();
        $prices = 0;
        if(count($orders) > 0) {
            foreach($orders as $order) {
                $prices += $order['price'];
            }
        }
        return view('orders', ['orders' => $orders, 'prices' => $prices]);

    }

    
}
