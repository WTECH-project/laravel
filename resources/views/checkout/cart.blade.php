@extends('checkout.index')

@section('progressbar')
<ul class="max-w-4xl mx-auto p-4 list-none flex justify-between text-center w-full">
    <x-checkout.progress span="1" label="Košík" />
    <li class="h-1 relative w-full top-10 rounded-full overflow-hidden">
        <div class="w-full h-full bg-gray-600 absolute"></div>
    </li>
    <x-checkout.progress span="2" label="Doprava a platba" />
    <li class="h-1 relative w-full top-10 rounded-full overflow-hidden">
        <div class="w-full h-full bg-gray-600 absolute"></div>
    </li>
    <x-checkout.progress span="3" label="Dodacie údaje" />
    <li class="h-1 relative w-full top-10 rounded-full overflow-hidden">
        <div class="w-full h-full bg-gray-600 absolute"></div>
    </li>
    <x-checkout.progress span="4" label="Súhrn" />
</ul>
@endsection


@section('formContent')
@if(count($cart_products) > 0)
<section>
    <h2 class="font-bold text-2xl mb-4">Nákupný košík</h2>
    @foreach($cart_products as $cart_product)
    <div class="flex flex-col md:flex-row justify-between">
        <!-- outside div -->
        <div class="flex flex-col md:flex-row md:flex-grow">
            <!-- image with text -->
            <div class="w-full md:w-36 md:h-36">
                <img src="{{ asset('images/' . $cart_product['product']->images->first()->image_path) }}" alt="Topanka">
            </div>
            <div class="flex flex-col md:justify-between p-4">
                <span class="font-bold text-2xl">{{ $cart_product['product']->name }}</span>
                <div class="flex flex-row py-2">
                    <span class="text-gray-500">{{ $cart_product['size']->size }}</span>
                    <span class="text-gray-500 ml-4">{{ $cart_product['product']->price }}€</span>
                </div>
            </div>
        </div>
        <div class="flex items-center p-4 md:flex-grow">
            <!-- counter -->
            <form action="{{ route('cart') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $cart_product['product']->id }}" />
                <input type="hidden" name="quantity" value="-1" />
                <input type="hidden" name="size_id" value="{{ $cart_product['size']->id }}" />
                <button class="font-bold bg-white hover:bg-gray-100 shadow-md w-12 h-12 text-2xl rounded-full text-center" type="submit" @if( $cart_product['quantity'] <=1 ) disabled @endif>-</button>
            </form>
            <span class="font-bold ml-4">{{ $cart_product['quantity'] }}</span>
            <form action="{{ route('cart') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $cart_product['product']->id }}" />
                <input type="hidden" name="quantity" value="1" />
                <input type="hidden" name="size_id" value="{{ $cart_product['size']->id }}" />
                <button class="font-bold bg-white hover:bg-gray-100 shadow-md w-12 h-12 text-2xl rounded-full ml-4 text-center" type="submit">+</button>
            </form>
        </div>
        <div class="flex items-center justify-between p-4 md:flex-grow">
            <div>
                <!-- price -->
                <span class="font-bold text-xl">{{ $cart_product['product']->price * $cart_product['quantity'] }}€</span>
            </div>
            <!-- delete icon -->
            <form action="{{ route('cart') }}" method="POST">
                <button type="submit">
                    @csrf
                    <input type="hidden" name="_method" value="delete" />
                    <input type="hidden" name="product_id" value="{{ $cart_product['product']->id }}" />
                    <input type="hidden" name="size_id" value="{{ $cart_product['size']->id }}" />
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
    @endforeach
    <div class="flex mt-4 flex-col items-center justify-center mx-auto">
        <h2 class="font-bold text-xl">{{ array_reduce($cart_products, function($carry, $item) {
                    return $carry + $item['product']->price * $item['quantity'];
                }) }}€</h2>
        <a href="{{ route('checkout.shipping') }}" class="p-3 mt-4 md:order-2 bg-black border-2 text-white uppercase font-bold transition duration-300 hover:bg-gray-700 text-center">Výber spôsobu dopravy a platby</a>
    </div>
</section>
@else
<section>
    <h2 class="font-bold text-2xl text-center">Nákupný košík je prázdny</h2>
    <div class="flex flex-col md:items-center mt-8 text-center">
        <a href="{{ route('home') }}" class="p-3 bg-black text-white uppercase font-bold transition duration-300 hover:bg-gray-700 md:w-3/6">Pokračovať v nákupe</a>
    </div>
</section>
@endif
@endsection