@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto w-full flex-grow pt-6 px-8 md:pt-12 my-18">
        <article class="grid grid-cols-1 gap-4 place-items-center sm:grid-cols-2 md:gap-0 lg:grid-cols-2">
            <section class="max-w-lg relative mx-auto">
                <div id="slides">
                    <div class="hidden">
                        <img class="w-full h-max-lg h-80" src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topanka">
                    </div>
                    <div class="hidden">
                        <img class="w-full h-max-lg h-80" src="https://images.unsplash.com/photo-1622920883841-5bf72e392d8f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=694&q=80" alt="Topanka">
                    </div> 
                </div>
                

                <div class="flex flex-row items-center justify-between absolute top-0 left-0 w-full h-full px-8">
                    <button class="rounded-full bg-white h-12 w-12 shadow-md" onclick="nextSlide(-1)">&#10094;</button>         
                    <button class="rounded-full bg-white h-12 w-12 shadow-md" onclick="nextSlide(1)">&#10095;</button>         
                </div>
            </section>

            <section class="w-64 flex flex-col">
                <div class="text-xl font-bold">
                    Jordan 4 Retro
                </div>
                <div>
                    Kategória, Podkategória
                </div>
                <div>
                    Farba
                </div>
                <div class="text-lg font-semibold pb-2">
                    1099€
                </div>
                <div class="pb-2">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum semper ex lorem, vel imperdiet turpis placerat ut. Aenean sodales leo non gravida egestas. Proin sed velit vehicula, placerat metus in, eleifend dolor. Class aptent taciti efficitur.
                </div>
                <div class="pb-2">
                    <select class="border-2 rounded-md w-10/12" id="sizes">
                        <option selected disabled hidden value="0">Veľkosti</option>
                        <option value="36">36</option>
                        <option value="36,5">36,5</option>
                        <option value="37">37</option>
                    </select>
                </div>
                <div class="flex flex-col py-2">
                    <button class="p-3 bg-black text-white uppercase font-bold transition duration-300 hover:bg-gray-700 text-sm w-10/12" type="submit" id="btnAdd">
                        Pridať do košíka
                    </button>
                </div>
            </section>
        </article>
    </div>

    <script>
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

        const selectSizes = document.getElementById('sizes');
        let shoeSize = false;

        selectSizes.addEventListener('change', (event) => {
            shoeSize = event.target.value;
            console.log(shoeSize);
        });

        let countBasketItems = 1;
        const btnAdd = document.getElementById('btnAdd');

        btnAdd.addEventListener('click', () => {
            if(shoeSize){
                document.getElementById('numBasketItems').innerHTML = countBasketItems++;
                console.log(shoeSize);
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

        var slideIndex = 0;

        showSlides(slideIndex)

        function showSlides(n) {
            var slides = document.querySelectorAll('#slides div')

            if(n >= slides.length) {
                slideIndex = 0
            }
            else if(n < 0) {
                slideIndex = slides.length - 1
            }

            for(let i = 0; i < slides.length; i ++) {
                if(!slides[i].classList.contains('hidden'))
                    slides[i].classList.add('hidden')
            }

            slides[slideIndex].classList.remove('hidden')
        }

        function nextSlide(n) {
            showSlides(slideIndex += n)
        }
    </script>
@endsection