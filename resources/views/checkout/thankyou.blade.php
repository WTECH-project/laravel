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
    <x-checkout.progress span="4" label="Súhrn" completed="true" />
</ul>
@endsection

@section('formContent')
<section>
    <div class="flex flex-col items-center text-center">
        <h1 class="text-4xl text-bold mb-4">Ďakujeme za Vašu objednávku</h1>
        <h2 class="text-2xl text-bold mb-10">Číslo objednávky</h2>
        <p class="text-xl text-bold">Súhrn Vašej objednávky sme Vám poslali na e-mail</p>
    </div>
    <div class="grid mt-12 grid-cols-1 md:grid-cols-2 gap-8 text-center">
        <a href="{{ route('register') }}" class="p-3 md:order-2 bg-black border-2 text-white uppercase font-bold transition duration-300 hover:bg-gray-700">Chcete si založiť účet?</a>
        <a href="{{ route('home') }}" class="p-3 uppercase border-2 border-black font-bold transition duration-300 hover:text-white hover:bg-gray-700">Späť na domovskú stránku</a>
    </div>
</section>
@endsection