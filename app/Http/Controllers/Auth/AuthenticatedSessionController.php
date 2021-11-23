<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Models\Product;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        // store cart items to database
        $cart = session()->get('cart', []);

        foreach ($cart as $product_id => $size_data) {
            $product = Product::findOrFail($product_id);

            foreach ($size_data as $size_id => $count) {
                $cartItem = auth()->user()->cartItems()->where('product_id', '=', $product_id)->where('size_id', '=', $size_id)->first();

                if ($cartItem) {
                    $cartItem->quantity += intval($count['quantity']);

                    $cartItem->save();
                } else {
                    auth()->user()->cartItems()->create([
                        'size_id' => $size_id,
                        'product_id' => $product_id,
                        'quantity' => $count['quantity'],
                        'price' => $product->price
                    ]);
                }
            }
        }

        $request->session()->regenerate();

        // load cart items into session
        $cartItems = auth()->user()->cartItems()->get();

        $cart = [];

        foreach ($cartItems as $cartItem) {
            if (isset($cart[$cartItem->product_id]) && isset($cart[$cartItem->product_id][$cartItem->size_id])) {
                $cart[$cartItem->product_id][$cartItem->size_id]['quantity'] += intval($cartItem->quantity);
            } else {
                $cart[$cartItem->product_id][$cartItem->size_id]['quantity'] = intval($cartItem->quantity);
            }
        }

        session()->put('cart', $cart);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
