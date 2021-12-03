<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Models\Delivery;
use App\Models\Payment;

class ShippingPaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['cart.data']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Cache::rememberForever('payments', function () {
            return Payment::get();
        });
        $deliveries = Cache::rememberForever('deliveries', function () {
            return Delivery::get();
        });

        $shipping_id = session()->get('shipping');
        $payment_id = session()->get('payment');

        return view('checkout.shipping_payment')
            ->with('payments', $payments)
            ->with('deliveries', $deliveries)
            ->with('shipping_id', $shipping_id)
            ->with('payment_id', $payment_id);
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
            'shipping' => 'required|numeric',
            'payment' => 'required|numeric'
        ]);

        session()->put('shipping', $request->shipping);
        session()->put('payment', $request->payment);

        return redirect('/checkout/delivery');
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
