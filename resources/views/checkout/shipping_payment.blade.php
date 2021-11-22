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
<form action="{{ route('checkout.shipping') }}" method="POST">
    @csrf
    <section class="divide-y">
        <h2 class="font-bold text-2xl mb-4">Doprava</h2>
        @foreach($deliveries as $delivery)
        @if($shipping_id == $delivery->id)
        <x-checkout.checkout-option type="radio" checked name="shipping" label="{{ $delivery->name }}" price="{{ number_format($delivery->price, 2, ',') }} €" value="{{ $delivery->id }}" />
        @else
        <x-checkout.checkout-option type="radio" name="shipping" label="{{ $delivery->name }}" price="{{ number_format($delivery->price, 2, ',') }} €" value="{{ $delivery->id }}" />
        @endif
        @endforeach
    </section>
    <section class="divide-y mt-4">
        <h2 class="font-bold text-2xl mb-4">Platba</h2>
        @foreach($payments as $payment)
        @if($payment_id == $payment->id)
        <x-checkout.checkout-option type="radio" checked name="payment" label="{{ $payment->type }}" price="{{ number_format($payment->price, 2, ',') }} €" value="{{ $payment->id }}" />
        @else
        <x-checkout.checkout-option type="radio" name="payment" label="{{ $payment->type }}" price="{{ number_format($payment->price, 2, ',') }} €" value="{{ $payment->id }}" />
        @endif
        @endforeach
    </section>
    <section>
        <div class="grid mt-12 grid-cols-1 md:grid-cols-2 gap-8 text-center">
            <button class="p-3 md:order-2 bg-black border-2 text-white uppercase font-bold transition duration-300 hover:bg-gray-700" type="submit">Dodacie údaje</button>
            <a href="{{ route('checkout.cart') }}" class="p-3 uppercase border-2 border-black font-bold transition duration-300 hover:text-white hover:bg-gray-700">Späť</a>
        </div>
    </section>
</form>
@endsection