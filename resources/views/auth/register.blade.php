@extends('layouts.app')

@section('content')
    <x-auth-card>
        <header class="max-w-md mx-auto px-8 text-center">
            <h1 class="font-bold text-4xl">Registrácia</h1>
            <p class="mt-4 text-sm text-gray-500">Ešte nemáš účet v našom vybombenom obchode ? Tak načo čakáš ?</p>
        </header>
        <form method="POST" action="{{ route('register') }}" class="mt-8">
            <x-forms.input-field name="email" type="email" label="E-mail" />
            <x-forms.input-field name="password" type="password" label="Heslo" class="mt-4" />
            <x-forms.input-field name="password_confirmation" type="password" label="Potvrďte heslo" class="mt-4" />

            <x-forms.button text="Registrovať" type="submit" class="mt-4" />
        </form>
    </x-auth-card>
@endsection