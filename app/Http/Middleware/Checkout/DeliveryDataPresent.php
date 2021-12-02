<?php

namespace App\Http\Middleware\Checkout;

use Closure;
use Illuminate\Http\Request;

class DeliveryDataPresent
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
        $delivery_data = session()->get('delivery_data', []);

        if(empty($delivery_data)) {
            return redirect()->route('checkout.delivery');
        }

        return $next($request);
    }
}
