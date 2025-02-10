<?php

namespace App\Actions;

class StoreProductInCartAction
{
    public function handle($request): void
    {
        if(session()->get('products.product-' . $request->id) == null)
        {
            session()->push('products.product-' . $request->id, [
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'count' => $request->counter
            ]);
        } 
        else
        {
            $existProduct = session()->get('products.product-' . $request->id);
            $existProductCount = $existProduct[0]['count'];
            (int)$existProductCount += $request->counter;

            session()->forget('products.product-' . $request->id);

            session()->push('products.product-' . $request->id, [
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'count' => $existProductCount
            ]);
        }
    }
}