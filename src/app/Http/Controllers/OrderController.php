<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Services\GetOrdersInfo;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * index orders
     */
    public function index(GetOrdersInfo $getOrdersInfo)
    {
        return view('orders', ['orders' => $getOrdersInfo->getOrders(), 'allOrdersTotal' => $getOrdersInfo->getAllOrdersTotal()]);
    }

    /**
     * create order
     */
    public function store(Request $request)
    {
        $order = Order::create([
            'total_price' => $request->totalCount
        ]);

        foreach($request->IDs as $key => $item){
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item,
                'product_count' => $request->count[$key]
            ]);
        }

        return Redirect::route('market.ty');
    }

    /**
     * destroy order
     */
    public function destroy(Request $request)
    {
        Order::where('id', $request->id)->delete();

        return redirect()->route('orders.index');
    }
}
