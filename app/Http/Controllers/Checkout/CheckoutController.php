<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = array();
            session()->put('cart', $cart);
        }

        $products = [];

        foreach ($cart as $product_id => $size_data) {
            $product = Cache::remember('product-' . $product_id, 60, 
                function () use ($product_id) {
                    return Product::find($product_id);
                }
            );

            if(!$product) {
                // handle if product was deleted

                if(auth()->user()) {
                    // delete all cart items
                    auth()->user()->deleteCartItems();
                }

                // delete data in session
                session()->put('cart', []);
                session()->flash('error', 'Nastala neočakávaná chyba, Váš košík bol vymazaný.');

                Log::error('Unexpected error, cart of the user must be deleted', ['product_id' => $product_id]);

                return response(view('checkout.cart')->with('cart_products', $products));
            }

            foreach ($size_data as $size_id => $count) {
                $size = Cache::rememberForever('size-' . $size_id, 
                    function () use ($size_id) {
                        return Size::find($size_id);
                    }
                );

                if(!$size) {
                    // handle if size was deleted

                    if (auth()->user()) {
                        // delete all cart items
                        auth()->user()->deleteCartItems();
                    }

                    // delete data in session
                    session()->put('cart', []);
                    session()->flash('error', 'Nastala neočakávaná chyba, Váš košík bol vymazaný.');

                    Log::error('Unexpected error, cart of the user must be deleted', ['size_id' => $size_id]);

                    return response(view('checkout.cart')->with('cart_products', $products));
                }

                $products[] = [
                    'product' => $product,
                    'size' => $size,
                    'quantity' => $count['quantity']
                ];
            }
        }

        return response(view('checkout.cart')->with('cart_products', $products))
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
