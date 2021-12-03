@extends('layouts.app')

@section('content')
    <x-auth-card>
        <section> 
            <x-forms.header 
                title="Prihlásenie" 
                description="Už máš účet v našom vybombenom obchode? Tak sa prihlás."
            />
            <form method="POST" action="{{ route('login') }}" class="mt-8">
                @csrf
                <x-forms.input-field name="email" type="email" label="E-mail" />
                <x-forms.input-field name="password" type="password" label="Heslo" class="mt-4"/>

                <x-forms.button text="Prihlásiť" type="submit" class="my-4" />
            </form>
        </section>
        <section>
            <div class="max-w-md mx-auto text-center">
                <a class="hover:underline" href="{{ route('password.email') }}">Zabudol si heslo?</a>
            
                <div class="mt-8">
                    <h2 class="font-bold text-2xl pb-6">Nový zákazník?</h2>
                    <a class="block py-3 bg-white border-2 border-gray-400 
                    hover:border-black transition duration-200" href="{{ route('register') }}">Vytvoriť účet</a>
                </div>
            </div>
        </section>
    </x-auth-card>
@endsection