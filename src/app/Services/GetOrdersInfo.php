<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderProduct;

class GetOrdersInfo
{
    public function getAllOrdersTotal(): int
    {
        return $this->allOrdersTotal;
    }

    private int $allOrdersTotal = 0; 

    private function calcOrdersTotal($orderTotal): void
    {
        $this->allOrdersTotal += $orderTotal;
    }

    public function getOrders(): array
    {
        $orders = Order::all()->toArray();
        $ordersResult = [];

        foreach($orders as $order)
        {
            $this->calcOrdersTotal($order['total_price']);

            $order['products'] = [];
            $products = OrderProduct::where('order_id', $order['id'])->with('product')->get();

            foreach($products as $product)
            {
                array_push($order['products'], $product);
            }

            array_push($ordersResult, $order);
        }

        return $ordersResult;
    }
}