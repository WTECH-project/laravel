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
<form action="{{ route('checkout.delivery') }}" method="POST">
    @csrf
    <h2 class="font-bold text-2xl">Dodacie údaje</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-4">
        <x-forms.input-field name="name" type="text" label="Meno" value="{{ isset(session()->get('delivery_data', [])['name']) ? session()->get('delivery_data')['name'] : old('name') }}" />
        <x-forms.input-field name="surname" type="text" label="Priezvisko" value="{{ isset(session()->get('delivery_data', [])['surname']) ? session()->get('delivery_data')['surname'] : old('surname') }}" />
        <x-forms.input-field name="email" type="text" label="E-mail" value="{{ isset(session()->get('delivery_data', [])['email']) ? session()->get('delivery_data')['email'] : old('email') }}" />
        <x-forms.input-field name="phoneNumber" type="text" label="Telefón" value="{{ isset(session()->get('delivery_data', [])['phoneNumber']) ? session()->get('delivery_data')['phoneNumber'] : old('phoneNumber') }}" />

        @php
        $country_options = [
        'SK' => 'Slovenská republika',
        'CZ' => 'Česká republika'
        ]
        @endphp

        <x-forms.select label="Krajina" name="country" placeholder="Krajina" :options=$country_options selected="{{ isset(session()->get('delivery_data', [])['country']) ? session()->get('delivery_data')['coutry'] : old('country') }}" />

        <x-forms.input-field name="city" type="text" label="Mesto / obec" value="{{ isset(session()->get('delivery_data', [])['city']) ? session()->get('delivery_data')['city'] : old('city') }}" />
        <x-forms.input-field name="street" type="text" label="Ulica a číslo domu" value="{{ isset(session()->get('delivery_data', [])['street']) ? session()->get('delivery_data')['street'] : old('street') }}" />
        <x-forms.input-field name="psc" type="text" label="Číslo popisné" value="{{ isset(session()->get('delivery_data', [])['psc']) ? session()->get('delivery_data')['psc'] : old('psc') }}" />
    </div>

    <div class="grid mt-12 grid-cols-1 md:grid-cols-2 gap-8 text-center">
        <button class="p-3 md:order-2 bg-black border-2 text-white uppercase font-bold transition duration-300 hover:bg-gray-700" type="submit">Súhrn</button>
        <a href="{{ route('checkout.shipping') }}" class="p-3 uppercase border-2 border-black font-bold transition duration-300 hover:text-white hover:bg-gray-700">Späť</a>
    </div>
</form>
@endsection