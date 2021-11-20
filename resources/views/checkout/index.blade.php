@extends('layouts.app')

@section('content')
    <section>
        <ul id="progressbar" class="max-w-4xl mx-auto p-4 list-none flex justify-between text-center w-full">
            <li class="w-1/6 p-4">
                <div class="flex items-center justify-start flex-col">
                    <div class="rounded-full h-12 w-12 flex items-center justify-center border-2 border-gray-600">
                        <span>1</span>
                    </div>
                    <div class="rounded-full h-12 w-12 bg-black flex items-center justify-center border-2 border-gray-600 hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    Košík
                </div>
            </li>
            <li class="h-1 relative w-full top-10 rounded-full overflow-hidden">
                <div class="w-full h-full bg-gray-600 absolute"></div>
            </li>
            <li class="w-1/6 p-4">
                <div class="flex items-center justify-start flex-col">
                    <div class="rounded-full h-12 w-12 flex items-center justify-center border-2 border-gray-600">
                        <span>2</span>
                    </div>
                    <div class="rounded-full h-12 w-12 bg-black flex items-center justify-center border-2 border-gray-600 hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    Doprava a platba
                </div>
            </li>
            <li class="h-1 relative w-full top-10 rounded-full overflow-hidden">
                <div class="w-full h-full bg-gray-600 absolute"></div>
            </li>
            <li class="w-1/6 p-4">
                <div class="flex items-center justify-start flex-col">
                    <div class="rounded-full h-12 w-12 flex items-center justify-center border-2 border-gray-600">
                        <span>3</span>
                    </div>
                    <div class="rounded-full h-12 w-12 bg-black flex items-center justify-center border-2 border-gray-600 hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    Dodacie údaje
                </div>
            </li>
            <li class="h-1 relative w-full top-10 rounded-full overflow-hidden">
                <div class="w-full h-full bg-gray-600 absolute"></div>
            </li>
            <li class="w-1/6 p-4">
                <div class="flex items-center justify-start flex-col">
                    <div class="rounded-full h-12 w-12 flex items-center justify-center border-2 border-gray-600">
                        <span>4</span>
                    </div>
                    <div class="rounded-full h-12 w-12 bg-black flex items-center justify-center border-2 border-gray-600 hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    Súhrn
                </div>
            </li>
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
                <div class="flex p-4 flex-row items-center justify-between">
                    <div>
                        <input type="radio" name="transport" id="gls">
                        <label for="gls">GLS</label>
                    </div>
                    <span>3,20€</span>
                </div>
                <div class="flex p-4 flex-row items-center justify-between">
                    <div>
                        <input type="radio" name="transport" id="dpd">
                        <label for="dpd">DPD</label>
                    </div>
                    <span>4,00€</span>
                </div>
                <div class="flex p-4 flex-row items-center justify-between">
                    <div>
                        <input type="radio" name="transport" id="personal">
                        <label for="personal">Osobný odber</label>
                    </div>
                    <span>1,00€</span>
                </div>
                <div class="flex p-4 flex-row items-center justify-between">
                    <div>
                        <input type="radio" name="transport" id="postOffice">
                        <label for="postOffice">Balíček na poštu</label>
                    </div>
                    <span>3,50€</span>
                </div>
                <div></div>
            </section>
            <section class="divide-y mt-4">
                <h2 class="font-bold text-2xl mb-4">Platba</h2>
                <div class="flex p-4 flex-row items-center justify-between">
                    <div>
                        <input type="radio" name="payment" id="card">
                        <label for="card">Platba kartou</label>
                    </div>
                    <span>Zadarmo</span>
                </div>
                <div class="flex p-4 flex-row items-center justify-between">
                    <div>
                        <input type="radio" name="payment" id="paypal">
                        <label for="paypal">Paypal</label>
                    </div>
                    <span>Zadarmo</span>
                </div>
                <div class="flex p-4 flex-row items-center justify-between">
                    <div>
                        <input type="radio" name="payment" id="cash">
                        <label for="cash">Dobierka</label>
                    </div>
                    <span>1,00€</span>
                </div>
                <div></div>
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
                    <div class="flex flex-col">
                        <label class="text-left text-gray-500" for="name">Meno</label>
                        <input class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2" type="text" id="name" name="name">
                        <span class="text-red-500 hidden" id="nameError">Povinné pole</span>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-left text-gray-500" for="surname">Priezvisko</label>
                        <input class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2" type="text" id="surname" name="surname">
                        <span class="text-red-500 hidden" id="surnameError">Povinné pole</span>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-left text-gray-500" for="email">E-mail</label>
                        <input class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2" type="text" id="email" name="surname">
                        <span class="text-red-500 hidden" id="emailError">Povinné pole</span>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-left text-gray-500" for="phoneNumber">Telefón</label>
                        <input class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2" type="text" id="phoneNumber" name="phoneNumber">
                        <span class="text-red-500 hidden" id="phoneNumberError">Povinné pole</span>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-left text-gray-500" for="country">Krajina</label>
                        <input class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2" type="text" id="country" name="country">
                        <span class="text-red-500 hidden" id="countryError">Povinné pole</span>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-left text-gray-500" for="city">Mesto / obec</label>
                        <input class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2" type="text" id="city" name="city">
                        <span class="text-red-500 hidden" id="cityError">Povinné pole</span>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-left text-gray-500" for="street">Ulica a číslo domu</label>
                        <input class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2" type="text" id="street" name="street">
                        <span class="text-red-500 hidden" id="streetError">Povinné pole</span>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-left text-gray-500" for="psc">Číslo popisné</label>
                        <input class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2" type="text" id="psc" name="psc">
                        <span class="text-red-500 hidden" id="pscError">Povinné pole</span>
                    </div>
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
                    <div>
                        <h2 class="font-bold text-2xl mt-4">Doprava</h2>
                        <div>
                            <span class="text-gray-500">GLS</span>
                            <span class="text-gray-500 ml-4">Cena</span>
                        </div> 
                    </div>
                    <div>
                        <h2 class="font-bold text-2xl mt-4">Platba</h2>
                        <div>
                            <span class="text-gray-500">Platba kartou</span>
                            <span class="text-gray-500 ml-4">Cena</span>
                        </div>
                    </div>
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