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
    <x-checkout.progress span="3" label="Dodacie údaje" />
    <li class="h-1 relative w-full top-10 rounded-full overflow-hidden">
        <div class="w-full h-full bg-gray-600 absolute"></div>
    </li>
    <x-checkout.progress span="4" label="Súhrn" />
</ul>
@endsection

@section('formContent')
<section>
    <h2 class="font-bold text-2xl">Dodacie údaje</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-4">
        <x-forms.input-field name="name" type="text" label="Meno" />
        <x-forms.input-field name="surname" type="text" label="Priezvisko" />
        <x-forms.input-field name="email" type="text" label="E-mail" />
        <x-forms.input-field name="phoneNumber" type="text" label="Telefón" />

        @php
        $country_options = [
        'SK' => 'Slovenská republika',
        'CZ' => 'Česká republika'
        ]
        @endphp

        <x-forms.select label="Krajina" name="country" placeholder="Krajina" :options=$country_options />

        <x-forms.input-field name="city" type="text" label="Mesto / obec" />
        <x-forms.input-field name="street" type="text" label="Ulica a číslo domu" />
        <x-forms.input-field name="psc" type="text" label="Číslo popisné" />
    </div>

    <div class="grid mt-12 grid-cols-1 md:grid-cols-2 gap-8 text-center">
        <a href="{{ route('checkout.summary') }}" class="p-3 md:order-2 bg-black border-2 text-white uppercase font-bold transition duration-300 hover:bg-gray-700">Súhrn</a>
        <a href="{{ route('checkout.shipping') }}" class="p-3 uppercase border-2 border-black font-bold transition duration-300 hover:text-white hover:bg-gray-700">Späť</a>
    </div>
</section>
@endsection