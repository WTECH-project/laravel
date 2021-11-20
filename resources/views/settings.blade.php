@extends('layouts.app')

@section('content')
    <header class="max-w-md mx-auto px-8 text-center">
        <h1 class="font-bold text-4xl">Nastavenia účtu</h1>
    </header>
    <section class="mt-8 md:px-8">
        <h2 class="font-bold text-2xl">Dodacie údaje</h2>
        <form method="POST" action="#" class="mt-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <x-forms.input-field label="Meno" name="name" type="text" />

                <x-forms.input-field label="Priezvisko" name="surname" type="text" />

                <x-forms.input-field label="Telefón" name="phoneNumber" type="text" />

                @php
                $country_options = [
                'SK' => 'Slovenská republika',
                'CZ' => 'Česká republika'
                ]
                @endphp

                <x-forms.select label="Krajina" name="country" placeholder="Krajina" :options=$country_options />

                <x-forms.input-field label="Krajina" name="name" type="text" />

                <x-forms.input-field label="Mesto / obec" name="city" type="text" />

                <x-forms.input-field label="Ulica a číslo domu" name="street" type="text" />

                <x-forms.input-field label="Číslo popisné" name="psc" type="text" />
            </div>
            <div class="flex flex-col md:items-center mt-8">
                <button class="p-3 bg-black text-white uppercase font-bold transition duration-300 hover:bg-gray-700 md:w-3/6" type="submit">Uložiť</button>
            </div>
        </form>
    </section>

@endsection