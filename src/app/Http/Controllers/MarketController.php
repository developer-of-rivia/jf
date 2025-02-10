<?php

namespace App\Http\Controllers;

use App\Actions\StoreProductInCartAction;
use App\Models\Product;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    /**
     * market page
     */
    public function market()
    {
        $products = Product::all();
        return view('market', ['products' => $products]);
    }

    /**
     * success order store page
     */
    public function tyPage()
    {
        return view('ty');
    }

    /**
     * add product to cart
     */
    public function store(Request $request, StoreProductInCartAction $storeProductInCartAction)
    {
        $storeProductInCartAction->handle($request);
        return redirect()->route('market.market');
    }

    /**
     * index products in cart
     */
    public function index()
    {
        $products = session()->get('products');
        $result = 0;

        if($products)
        {
            foreach($products as $product)
            {
                $result += $product[0]['price'] * $product[0]['count'];
            }
        }

        return view('cart', ['products' => $products, 'result' => $result]);
    }

    /**
     * remove product from cart
     */
    public function destroy(Request $request)
    {
        dd();
        session()->forget('products.product-' . $request->id);
    }
}
