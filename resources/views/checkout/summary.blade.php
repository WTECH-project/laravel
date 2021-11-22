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
<section>
    <h2 class="font-bold text-2xl">Vaša objednávka</h2>
    <div class="flex flex-col md:flex-row justify-between mt-4">
        <!-- outside div -->
        <div class="flex flex-col md:flex-row">
            <!-- image with text -->
            <div class="w-full md:w-36 md:h-36">
                <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topanka">
            </div>
            <div class="flex flex-col md:justify-between p-4">
                <span class="text-bold text-2xl">Názov</span>
                <div class="flex flex-row py-2">
                    <span class="text-gray-500">Veľkosť</span>
                    <span class="text-gray-500 ml-4">Cena</span>
                    <span class="text-gray-500 ml-4">Množstvo</span>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between p-4">
            <span class="text-bold text-xl">120€</span>
        </div>
    </div>
</section>
<section class="flex flex-col md:flex-row md:items-center md:justify-between mt-4">
    <div>
        <x-checkout.checkout-info h2="Doprava" label1="GLS" label2="Cena" />
        <x-checkout.checkout-info h2="Platba" label1="Platba kartou" label2="Cena" />
    </div>
    <div>
        <h2 class="font-bold text-2xl mt-4">Dodacie údaje</h2>
        <p class="text-gray-500">Meno Priezvisko</p>
        <p class="text-gray-500">Ulica a číslo domu</p>
        <p class="text-gray-500">PSČ a mesto</p>
        <p class="text-gray-500">Krajina</p>
        <p class="text-gray-500">Telefón</p>
        <p class="text-gray-500">E-mail</p>
    </div>
</section>
<section>
    <div class="flex mt-4 flex-col items-center justify-center mx-auto">
        <h2 class="font-bold text-xl">Celková cena</h2>
    </div>
    <div class="grid mt-12 grid-cols-1 md:grid-cols-2 gap-8 text-center">
        <a href="{{ route('checkout.thankyou') }}" class="p-3 md:order-2 bg-black border-2 text-white uppercase font-bold transition duration-300 hover:bg-gray-700">Objednať</a>
        <a href="{{ route('checkout.delivery') }}" class="p-3 uppercase border-2 border-black font-bold transition duration-300 hover:text-white hover:bg-gray-700">Späť</a>
    </div>
</section>
@endsection