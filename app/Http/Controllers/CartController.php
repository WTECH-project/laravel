<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $this->validate($request, [
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'size_id' => 'required|numeric',
        ]);

        $cart = session()->get('cart');

        if(!$cart) {
            $cart = array();
            session()->put('cart', $cart);
        }

        if(isset($cart[$request->product_id]) && isset($cart[$request->product_id][$request->size_id])) {
            $cart[$request->product_id][$request->size_id]['quantity'] += intval($request->quantity);

            // update cart item if autheticanted
            if(auth()->user()) {
                $cartItem = auth()->user()->cartItems()->where('product_id', '=', $request->product_id)->where('size_id', '=', $request->size_id)->first();
                $cartItem->quantity += intval($request->quantity);

                $cartItem->save();
            }
        }
        else {
            $cart[$request->product_id][$request->size_id]['quantity'] = intval($request->quantity);

            // create cart item if authenticated
            if(auth()->user()) {
                $product = Product::findOrFail($request->product_id);

                auth()->user()->cartItems()->create([
                    'size_id' => $request->size_id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    'price' => $product->price
                ]);
            }
        }

        session()->put('cart', $cart);

        return back();
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
    public function destroy(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required|numeric',
            'size_id' => 'required|numeric',
        ]);

        $cart = session()->get('cart');

        if (!$cart) {
            $cart = array();
            session()->put('cart', $cart);
        }

        if (isset($cart[$request->product_id]) && isset($cart[$request->product_id][$request->size_id])) {
            unset($cart[$request->product_id][$request->size_id]);

            // delete cart item if authenticated
            auth()->user()->cartItems()->where('product_id', '=',
                $request->product_id
            )->where('size_id', '=', $request->size_id)->first()->delete();

            $cart = array_filter($cart, function($x) {
                return array_filter($x) != array();
            });

            session()->put('cart', $cart);
        }

        return back();
    }
}
