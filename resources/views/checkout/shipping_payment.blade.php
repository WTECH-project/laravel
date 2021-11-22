@extends('checkout.index')

@section('progressbar')
<ul class="max-w-4xl mx-auto p-4 list-none flex justify-between text-center w-full">
    <x-checkout.progress span="1" label="Košík" completed="true" />
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
<section class="divide-y">
    <h2 class="font-bold text-2xl mb-4">Doprava</h2>
    <x-checkout.checkout-option type="radio" id="gls" name="transport" for="gls" label="GLS" price="3,20 €" />
    <x-checkout.checkout-option type="radio" id="dpd" name="transport" for="dpd" label="DPD" price="4,00 €" />
    <x-checkout.checkout-option type="radio" id="personal" name="transport" for="personal" label="Osobný odber" price="1,00 €" />
    <x-checkout.checkout-option type="radio" id="postOffice" name="transport" for="postOffice" label="Balíček na poštu" price="3,50 €" />
</section>
<section class="divide-y mt-4">
    <h2 class="font-bold text-2xl mb-4">Platba</h2>
    <x-checkout.checkout-option type="radio" id="card" name="payment" for="card" label="Platba kartou" price="Zadarmo" />
    <x-checkout.checkout-option type="radio" id="paypal" name="payment" for="paypal" label="Paypal" price="Zadarmo" />
    <x-checkout.checkout-option type="radio" id="cash" name="payment" for="cash" label="Dobierka" price="1,00 €" />
</section>
<section>
    <div class="grid mt-12 grid-cols-1 md:grid-cols-2 gap-8 text-center">
        <a href="{{ route('checkout.delivery') }}" class="p-3 md:order-2 bg-black border-2 text-white uppercase font-bold transition duration-300 hover:bg-gray-700">Dodacie údaje</a>
        <a href="{{ route('checkout.cart') }}" class="p-3 uppercase border-2 border-black font-bold transition duration-300 hover:text-white hover:bg-gray-700">Späť</a>
    </div>
</section>
@endsection