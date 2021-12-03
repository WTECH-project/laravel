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
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

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
            $product = Cache::remember(
                'product-' . $product_id,
                60,
                function () use ($product_id) {
                    return Product::findOrFail($product_id);
                }
            );

            foreach ($size_data as $size_id => $count) {
                $size = Cache::rememberForever(
                    'size-' . $size_id,
                    function () use ($size_id) {
                        return Size::findOrFail($size_id);
                    }
                );

                $products[] = [
                    'product' => $product,
                    'size' => $size,
                    'quantity' => $count['quantity']
                ];
            }
        }

        $payment = Payment::findOrFail($payment_id);
        $shippment = Delivery::findOrFail($shipping_id);

        return response(view('checkout.summary')
            ->with('cart_products', $products)
            ->with('payment', $payment)
            ->with('shippment', $shippment))
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
        $cart = session()->get('cart', []);
        $delivery_data = session()->get('delivery_data', []);
        $payment_id = session()->get('payment', -1);
        $shipment_id = session()->get('shipping', -1);

        $user_id = null;

        if (auth()->user()) {
            $user_id = auth()->user()->id;
        }

        try {
            DB::beginTransaction();
            
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

            if (!$order_data->exists) {
                throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
            }

            // create order items
            foreach ($cart as $product_id => $size_data) {
                $product = Cache::remember(
                    'product-' . $product_id,
                    60,
                    function () use ($product_id) {
                        return Product::findOrFail($product_id);
                    }
                );;

                foreach ($size_data as $size_id => $count) {
                    $orderItem = OrderItem::create([
                        'order_id' => $order_data->id,
                        'product_id' => $product_id,
                        'size_id' => $size_id,
                        'price' => $product->price,
                        'quantity' => $count['quantity']
                    ]);

                    if (!$orderItem->exists) {
                        throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
                    }
                }
            }

            DB::commit();
        } catch (Throwable $e) {
            Log::error('Nastala chyba pri vytvarani novej objednavky', ['error' => $e]);
            DB::rollBack();
        }

        Log::info('Pouzivatel vytvoril objednavku', ['order' => $order_data]);

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
