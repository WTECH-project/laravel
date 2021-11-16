@extends('layouts.app')

@section('content')
    <x-auth-card>
        <section>
            <x-forms.header
                title="Registrácia"
                description="Ešte nemáš účet v našom vybombenom obchode? Tak načo čakáš ?"
            />
            <form method="POST" action="{{ route('register') }}" class="mt-8">
                @csrf
                <x-forms.input-field name="email" type="email" label="E-mail" />
                <x-forms.input-field name="password" type="password" label="Heslo" class="mt-4" />
                <x-forms.input-field name="password_confirmation" type="password" label="Potvrďte heslo" class="mt-4" />

                <x-forms.button text="Registrovať" type="submit" class="mt-4" />
            </form>
        </section>
        
        <section>
            <div class="max-w-md mx-auto text-center mt-8">                   
                <h2 class="font-bold text-2xl pb-6">Už máš účet ?</h2>
                <a class="block py-3 bg-white border-2 border-gray-400 
                hover:border-black transition duration-200" href="{{ route('login') }}">Prihlásiť sa</a>
            </div>
        </section>
    </x-auth-card>
@endsection