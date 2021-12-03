<?php

namespace App\Http\Middleware\Checkout;

use Closure;
use Illuminate\Http\Request;

class CartDataPresent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $cart = session()->get('cart', []);

        if(empty($cart)) {
            return redirect()->route('checkout.cart');
        }

        return $next($request);
    }
}
