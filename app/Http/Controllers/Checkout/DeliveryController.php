<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['cart.data', 'shippingPayment.data']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // check if user is logged in and if so, fill session with his delivery data
        $user = auth()->user();
        $delivery_data = session()->get('delivery_data', []);

        if($user && empty($delivery_data)) {
            session()->put('delivery_data', [
                'name' => $user->name,
                'surname' => $user->surname,
                'street' => $user->street,
                'psc' => $user->psc,
                'city' => $user->city,
                'country' => $user->country,
                'phoneNumber' => $user->phoneNumber,
                'email' => $user->email
            ]);
        }

        return view('checkout.delivery');
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
            'name' => ['required', 'max:255', 'regex:/^[a-zA-Z]+$/'],
            'surname' => ['required', 'max:255', 'regex:/^[a-zA-Z]+$/'],
            'email' => ['required', 'email', 'max:255'],
            'phoneNumber' => ['required', 'digits:10'],
            'country' => ['required'],
            'city' => ['required', 'max:255', 'regex:/^[a-zA-Z]+$/'],
            'street' => ['required', 'max:255', 'regex:/^[A-Z][a-z]*[ ][0-9]+$/'],
            'psc' => ['required', 'digits:5'],
        ]);

        $delivery_data = [
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
            'country' => $request->country,
            'city' => $request->city,
            'street' => $request->street,
            'psc' => $request->psc
        ];

        session()->put('delivery_data', $delivery_data);

        return redirect('/checkout/summary');
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
