@extends('checkout.index')

@section('progressbar')
<ul class="max-w-4xl mx-auto p-4 list-none flex justify-between text-center w-full">
    <x-checkout.progress span="1" label="Košík" completed="true" />
    <li class="h-1 relative w-full top-10 rounded-full overflow-hidden">
        <div class="w-full h-full bg-gray-600 absolute"></div>
    </li>
    <x-checkout.progress span="2" label="Doprava a platba" completed="true" />
    <li class="h-1 relative w-full top-10 rounded-full overflow-hidden">
        <div class="w-full h-full bg-gray-600 absolute"></div>
    </li>
    <x-checkout.progress span="3" label="Dodacie údaje" completed="true" />
    <li class="h-1 relative w-full top-10 rounded-full overflow-hidden">
        <div class="w-full h-full bg-gray-600 absolute"></div>
    </li>
    <x-checkout.progress span="4" label="Súhrn" />
</ul>
@endsection

@section('formContent')
<form action="{{ route('checkout.summary') }}" method="POST">
    @csrf
    <h2 class="font-bold text-2xl">Vaša objednávka</h2>
    @foreach($cart_products as $cart_product)
    <div class="flex flex-col md:flex-row justify-between mt-4">
        <!-- outside div -->
        <div class="flex flex-col md:flex-row">
            <!-- image with text -->
            <div class="w-full md:w-36 md:h-36">
                <img src="{{ $cart_product['product']->images->first()->image_path }}" alt="Topanka">
            </div>
            <div class="flex flex-col md:justify-between p-4">
                <span class="text-bold text-2xl">{{ $cart_product['product']->name }}</span>
                <div class="flex flex-row py-2">
                    <span class="text-gray-500">{{ $cart_product['size']->size }}</span>
                    <span class="text-gray-500 ml-4">{{ $cart_product['product']->price }} €</span>
                    <span class="text-gray-500 ml-4">{{ $cart_product['quantity'] }} ks</span>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between p-4">
            <span class="text-bold text-xl">{{ $cart_product['product']->price * $cart_product['quantity'] }} €</span>
        </div>
    </div>
    @endforeach
    </section>
    <section class="flex flex-col md:flex-row md:items-center md:justify-between mt-4">
        <div>
            <x-checkout.checkout-info h2="Doprava" label1="{{ $shippment->name }}" label2="{{ number_format($shippment->price, 2, ',') }} €" />
            <x-checkout.checkout-info h2="Platba" label1="{{ $payment->type }}" label2="{{ number_format($payment->price, 2, ',') }} €" />
        </div>
        <div>
            <h2 class="font-bold text-2xl mt-4">Dodacie údaje</h2>
            <p class="text-gray-500">{{ session()->get('delivery_data')['name'] }} {{ session()->get('delivery_data')['surname'] }}</p>
            <p class="text-gray-500">{{ session()->get('delivery_data')['street'] }}</p>
            <p class="text-gray-500">{{ session()->get('delivery_data')['psc'] }}, {{ session()->get('delivery_data')['city'] }}</p>
            <p class="text-gray-500">{{ session()->get('delivery_data')['country'] }}</p>
            <p class="text-gray-500">{{ session()->get('delivery_data')['phoneNumber'] }}</p>
            <p class="text-gray-500">{{ session()->get('delivery_data')['email'] }}</p>
        </div>
    </section>
    <section>
        <div class="flex mt-4 flex-col items-center justify-center mx-auto">
            <h2 class="font-bold text-xl">{{ array_reduce($cart_products, function($carry, $item) {
                    return $carry + $item['product']->price * $item['quantity'];
                }) }}€</h2>
        </div>
        <div class="grid mt-12 grid-cols-1 md:grid-cols-2 gap-8 text-center">
            <button class="p-3 md:order-2 bg-black border-2 text-white uppercase font-bold transition duration-300 hover:bg-gray-700" type="submit">Objednať</button>
            <a href="{{ route('checkout.delivery') }}" class="p-3 uppercase border-2 border-black font-bold transition duration-300 hover:text-white hover:bg-gray-700">Späť</a>
        </div>
</form>
@endsection