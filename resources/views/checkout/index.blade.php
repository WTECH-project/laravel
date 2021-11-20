@extends('layouts.app')

@section('content')
    <section>
        <ul id="progressbar" class="max-w-4xl mx-auto p-4 list-none flex justify-between text-center w-full">
            <x-checkout.progress span="1" label="Košík" />
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
    </section>

    <main id="form" class="flex-grow w-full">
        <article class="max-w-4xl mx-auto pt-6 px-8 md:pt-12 my-16 md:my-8">
            <section>
                <h2 class="font-bold text-2xl mb-4">Nákupný košík</h2>
                <div class="flex flex-col md:flex-row justify-between"> <!-- outside div -->
                    <div class="flex flex-col md:flex-row md:flex-grow">
                        <!-- image with text -->
                        <div class="w-full md:w-36 md:h-36">
                            <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topanka vyjebana">
                        </div>
                        <div class="flex flex-col md:justify-between p-4">
                            <span class="text-bold text-2xl">Názov</span>
                            <div class="flex flex-row py-2">
                                <span class="text-gray-500">Veľkosť</span>
                                <span class="text-gray-500 ml-4">Cena</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center p-4 md:flex-grow">
                        <!-- counter -->
                        <button class="font-bold bg-white hover:bg-gray-100 shadow-md w-12 h-12 text-2xl rounded-full text-center">-</button>
                        <span class="font-bold ml-4">2</span>
                        <button class="font-bold bg-white hover:bg-gray-100 shadow-md w-12 h-12 text-2xl rounded-full ml-4 text-center">+</button>
                    </div>
                    <div class="flex items-center justify-between p-4 md:flex-grow">
                        <div>
                            <!-- price -->
                            <span class="text-bold text-xl">120€</span>
                        </div>
                        <div>
                            <!-- delete icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="flex mt-4 flex-col items-center justify-center mx-auto">
                    <h2 class="font-bold text-xl">Celková cena</h2>
                    <button class="p-3 mt-4 md:order-2 bg-black border-2 text-white uppercase font-bold transition duration-300 hover:bg-gray-700" onclick="next()">Výber spôsobu dopravy a platby</button>
                </div>
            </section>
        </article>
        <article class="max-w-4xl mx-auto pt-6 px-8 md:pt-12 my-16 md:my-8 hidden">
            <section class="divide-y">
                <h2 class="font-bold text-2xl mb-4">Doprava</h2>
                <x-checkout.checkout-option type="radio" id="gls" name="transport" for="gls" label="GLS" price="3,20 €"/>
                <x-checkout.checkout-option type="radio" id="dpd" name="transport" for="dpd" label="DPD" price="4,00 €"/>
                <x-checkout.checkout-option type="radio" id="personal" name="transport" for="personal" label="Osobný odber" price="1,00 €"/>
                <x-checkout.checkout-option type="radio" id="postOffice" name="transport" for="postOffice" label="Balíček na poštu" price="3,50 €"/>
            </section>
            <section class="divide-y mt-4">
                <h2 class="font-bold text-2xl mb-4">Platba</h2>
                <x-checkout.checkout-option type="radio" id="card" name="payment" for="card" label="Platba kartou" price="Zadarmo"/>
                <x-checkout.checkout-option type="radio" id="paypal" name="payment" for="paypal" label="Paypal" price="Zadarmo"/>
                <x-checkout.checkout-option type="radio" id="cash" name="payment" for="cash" label="Dobierka" price="1,00 €"/>
            </section>
            <section>
                <div class="grid mt-12 grid-cols-1 md:grid-cols-2 gap-8">
                    <button class="p-3 md:order-2 bg-black border-2 text-white uppercase font-bold transition duration-300 hover:bg-gray-700" onclick="next()">Dodacie údaje</button>
                    <button class="p-3 uppercase border-2 border-black font-bold transition duration-300 hover:text-white hover:bg-gray-700" onclick="back()">Späť</button>
                </div>
            </section>
        </article>
        <article class="max-w-4xl mx-auto pt-6 px-8 md:pt-12 my-16 md:my-8 hidden">
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

                    <x-forms.select
                        label="Krajina"
                        name="country"
                        placeholder="Krajina"
                        :options=$country_options
                    />
                    
                    <x-forms.input-field name="city" type="text" label="Mesto / obec" />
                    <x-forms.input-field name="street" type="text" label="Ulica a číslo domu" />
                    <x-forms.input-field name="psc" type="text" label="Číslo popisné" />
                </div>

                <div class="grid mt-12 grid-cols-1 md:grid-cols-2 gap-8">
                    <button class="p-3 md:order-2 bg-black border-2 text-white uppercase font-bold transition duration-300 hover:bg-gray-700" onclick="next()">Súhrn</button>
                    <button class="p-3 uppercase border-2 border-black font-bold transition duration-300 hover:text-white hover:bg-gray-700" onclick="back()">Späť</button>
                </div>
            </section>
        </article>
        <article class="max-w-4xl mx-auto pt-6 px-8 md:pt-12 my-16 md:my-8 hidden">
            <section>
                <h2 class="font-bold text-2xl">Vaša objednávka</h2>
                <div class="flex flex-col md:flex-row justify-between mt-4"> <!-- outside div -->
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
                <div class="grid mt-12 grid-cols-1 md:grid-cols-2 gap-8">
                    <button class="p-3 md:order-2 bg-black border-2 text-white uppercase font-bold transition duration-300 hover:bg-gray-700" onclick="next()">Objednať</button>
                    <button class="p-3 uppercase border-2 border-black font-bold transition duration-300 hover:text-white hover:bg-gray-700" onclick="back()">Späť</button>
                </div>
            </section>
        </article>
        <article class="max-w-4xl mx-auto pt-6 px-8 md:pt-12 my-16 md:my-8 hidden">
            <section>
                <div class="flex flex-col items-center text-center">
                    <h1 class="text-4xl text-bold mb-4">Ďakujeme za Vašu objednávku</h1>
                    <h2 class="text-2xl text-bold mb-10">Číslo objednávky</h2>
                    <p class="text-xl text-bold">Súhrn Vašej objednávky sme Vám poslali na e-mail</p>
                </div>
                <div class="grid mt-12 grid-cols-1 md:grid-cols-2 gap-8">
                    <button class="p-3 md:order-2 bg-black border-2 text-white uppercase font-bold transition duration-300 hover:bg-gray-700">Chcete si založiť účet?</button>
                    <button class="p-3 uppercase border-2 border-black font-bold transition duration-300 hover:text-white hover:bg-gray-700">Späť na domovskú stránku</button>
                </div>
            </section>
        </article>
    </main>

    <script>
        const form = document.getElementById('form');
        const progressbarLinks = document.querySelectorAll('#progressbar li > div.flex');

        var currentPage = 0;

        function hideChildren(element) {
            for(const child of element.children) {
                if(!child.classList.contains("hidden"))
                    child.classList.add('hidden')
            }
        }

        function next() {
            currentPage ++;

            hideChildren(form);
            hideChildren(progressbarLinks[currentPage - 1])

            form.children[currentPage].classList.remove('hidden')

            progressbarLinks[currentPage - 1].children[1].classList.remove('hidden')
        }

        function back() {
            currentPage --;

            hideChildren(form)
            hideChildren(progressbarLinks[currentPage])

            form.children[currentPage].classList.remove('hidden')

            progressbarLinks[currentPage].children[0].classList.remove('hidden')
        }



        const hamburgerIcon = document.getElementById('hamburger');
        const menu = document.getElementById('menu');

        hamburgerIcon.addEventListener('click', () => {
            if(menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            }
            else {
               menu.classList.add('hidden');
            }
        });

        const searchIcon = document.getElementById('search');
        const search = document.getElementById('searchMenu');

        searchIcon.addEventListener('click', () => {
            if(search.classList.contains('hidden')) {
                search.classList.remove('hidden');
            }
            else {
                search.classList.add('hidden');
            }
        });


        const profileIcon = document.getElementById('profile');
        const profileMenu = document.getElementById('profileMenu');

        profileIcon.addEventListener('click', () => {
            if(profileMenu.classList.contains('hidden')) {
                profileMenu.classList.remove('hidden');
            }
            else {
                profileMenu.classList.add('hidden');
            }
        });
    </script>
@endsection