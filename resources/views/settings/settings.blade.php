@extends('layouts.app')

@section('content')
<div class="max-w-full flex flex-col items-center">
    <header class="max-w-md mx-auto text-center">
        <h1 class="font-bold w-full text-3xl sm:text-4xl">Nastavenia účtu</h1>
    </header>
    <section class="w-full sm:w-1/2 md:w-10/12 lg:w-8/12 xl:w-7/12 mt-8 md:px-8">
        <h2 class="font-bold w-full text-xl sm:text-2xl">Dodacie údaje</h2>
        <form method="POST" action="{{ route('settings') }}" class="mt-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 justify-items-stretch">
                <x-forms.input-field label="Meno" name="name" type="text" value="{{ auth()->user()->name ? auth()->user()->name : old('name') }}" />

                <x-forms.input-field label="Priezvisko" name="surname" type="text" value="{{ auth()->user()->surname ? auth()->user()->surname : old('surname') }}" />

                <x-forms.input-field label="Telefón" name="phone_number" type="text" value="{{ auth()->user()->phone_number ? auth()->user()->phone_number : old('phone_number') }}" />

                @php
                $country_options = [
                'SK' => 'Slovenská republika',
                'CZ' => 'Česká republika'
                ];
                @endphp

                <x-forms.select label="Krajina" name="country" placeholder="Krajina" :options=$country_options selected="{{ auth()->user()->country ? auth()->user()->country : old('country') }}" />

                <x-forms.input-field label="Mesto / obec" name="city" type="text" value="{{ auth()->user()->city ? auth()->user()->city : old('city') }}" />

                <x-forms.input-field label="Ulica a číslo domu" name="street" type="text" value="{{ auth()->user()->street ? auth()->user()->street : old('street') }}" />

                <x-forms.input-field label="PSČ" name="postcode" type="text" value="{{ auth()->user()->postcode ? auth()->user()->postcode : old('postcode') }}" />
            </div>
            <div class="flex flex-col md:items-center mt-8">
                <button class="p-3 w-full bg-black text-white uppercase font-bold transition duration-300 hover:bg-gray-700 md:w-3/6" type="submit">Uložiť</button>
            </div>
        </form>
    </section>
</div>
@endsection