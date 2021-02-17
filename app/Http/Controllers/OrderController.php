<?php

namespace App\Http\Controllers;

use App\Addon;
use App\Categorie;
use App\Food;
use App\Foodorder;
use App\Order;
use App\Orderaddon;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::select()->where('etat', 'hold')->get();
        return view('admin.index',[
            'orders' => $orders
        ]);
    }

    public function make(){
        $categories = Categorie::all();
        $foods = Food::all();
        $addons = Addon::all();
        return view('order',[
            'categories' => $categories,
            'foods' => $foods,
            'addons' => $addons
        ]);
    }

    public function confirm(){
        $order = new Order();
        $order->orderer = request('orderer');
        $order->description = request('descorder');
        $order->wheretoeat = request('wte');
        $order->sum = 0;
        $order->etat = 'hold';

        $order->save();

        $food = Food::all();
        $foods = request('food');
        $qtes = request('qte');
        $addons = request('addons');

        $foodorder = new Foodorder();
        for ($i = 0; $i < count($foods); $i++) { 
            $foodorder = new Foodorder();
            foreach($food as $fo) {
                if($foods[$i] == $fo->id) {
                    $order->sum += $fo->price * $qtes[$i];
                }
            }
            $foodorder->orderId = $order->id;
            $foodorder->foodId = $foods[$i];
            $foodorder->qte = $qtes[$i];

            $foodorder->save();
        }
        foreach ($addons as $add) {
            $Orderaddon = new Orderaddon();
            $Orderaddon->orderId = $order->id;
            $Orderaddon->addonId = $add;

            $Orderaddon->save();
        }
        $order->save();

        return redirect('/')->with('mssg', 'Thank you for making your order');
    }

    public function order($id) {
        $order = Order::findOrFail($id);
        $orderFoods = Foodorder::select()->where('orderId', $id)->get();
        $Foods = Food::all();
        $orderAddons = Orderaddon::select()->where('orderId', $id)->get();
        $Addons = Addon::all();
        return view('admin.order',[
            'order' => $order,
            'orderFoods' => $orderFoods,
            'orderAddons' => $orderAddons,
            'foods' => $Foods,
            'addons' => $Addons
        ]);
    }

    public function done(){
        $index = request('order');
        $order = Order::find($index);
        $order->etat = 'done';
        $order->save();

        return redirect('/admin/orders')->with('mssg' , 'Order is done');
    }
}
