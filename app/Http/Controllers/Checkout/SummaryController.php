<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\Payment;
use App\Models\Delivery;
use App\Models\OrderItem;
use App\Models\Order;

class SummaryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['cart.data', 'shippingPayment.data', 'delivery.data']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        $payment_id = session()->get('payment');
        $shipping_id = session()->get('shipping');

        $products = [];

        foreach ($cart as $product_id => $size_data) {
            $product = Product::findOrFail($product_id);

            foreach ($size_data as $size_id => $count) {
                $size = Size::findOrFail($size_id);

                $products[] = [
                    'product' => $product,
                    'size' => $size,
                    'quantity' => $count['quantity']
                ];
            }
        }

        $payment = Payment::find($payment_id);
        $shippment = Delivery::find($shipping_id);

        return view('checkout.summary')
            ->with('cart_products', $products)
            ->with('payment', $payment)
            ->with('shippment', $shippment);
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
        $cart = session()->get('cart', []);
        $delivery_data = session()->get('delivery_data', []);
        $payment_id = session()->get('payment', -1);
        $shipment_id = session()->get('shipping', -1);

        $user_id = null;

        if(auth()->user()) {
            $user_id = auth()->user()->id;
        }

        // create order
        $order_data = Order::create([
            'user_id' => $user_id,
            'payment_id' => $payment_id,
            'delivery_id' => $shipment_id,
            'ordered_at' => now(),
            'name' => $delivery_data['name'],
            'surname' => $delivery_data['surname'],
            'email' => $delivery_data['email'],
            'phone_number' => $delivery_data['phoneNumber'],
            'country' => $delivery_data['country'],
            'city' => $delivery_data['city'],
            'street' => $delivery_data['street'],
            'postcode' => $delivery_data['psc']
        ]);

        // create order items
        foreach ($cart as $product_id => $size_data) {
            $product = Product::findOrFail($product_id);

            foreach ($size_data as $size_id => $count) {
                OrderItem::create([
                    'order_id' => $order_data->id,
                    'product_id' => $product_id,
                    'size_id' => $size_id,
                    'price' => $product->price,
                    'quantity' => $count['quantity']
                ]);
            }
        }

        // clear session data
        session()->forget('cart');
        session()->forget('delivery_data');
        session()->forget('payment');
        session()->forget('shipping');

        return redirect('/checkout/thankyou');
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
