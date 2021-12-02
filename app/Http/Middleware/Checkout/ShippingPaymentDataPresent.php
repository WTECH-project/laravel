<?php

namespace App\Http\Middleware\Checkout;

use Closure;
use Illuminate\Http\Request;

class ShippingPaymentDataPresent
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
        $shipping_id = session()->get('shipping');
        $payment_id = session()->get('payment');

        if(empty($shipping_id) || empty($payment_id)) {
            return redirect()->route('checkout.shipping');
        }

        return $next($request);
    }
}
