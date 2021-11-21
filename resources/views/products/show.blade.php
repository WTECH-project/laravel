@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto w-full flex-grow pt-6 px-8 md:pt-12 my-18">
    <article class="grid grid-cols-1 gap-4 place-items-center sm:grid-cols-2 md:gap-0 lg:grid-cols-2">
        <section class="max-w-lg relative mx-auto">
            <div id="slides">
                @foreach($product->images as $image)
                <div class="hidden">
                    <img class="w-full h-max-lg h-80" src="{{ $image->image_path }}" alt="Topanka">
                </div>
                @endforeach
            </div>


            <div class="flex flex-row items-center justify-between absolute top-0 left-0 w-full h-full px-8">
                <button class="rounded-full bg-white h-12 w-12 shadow-md" onclick="nextSlide(-1)">&#10094;</button>
                <button class="rounded-full bg-white h-12 w-12 shadow-md" onclick="nextSlide(1)">&#10095;</button>
            </div>
        </section>

        <section class="w-64 flex flex-col">
            <div class="text-xl font-bold">
                {{ $product->name }}
            </div>
            <div>
                {{ $product->sexCategory->name }}, {{ $product->category->name }}
            </div>
            <div>
                {{ $product->color->color }}
            </div>
            <div class="text-lg font-semibold pb-2">
                {{ $product->price }}€
            </div>
            <div class="pb-2">
                {{ $product->description }}
            </div>
            <div class="pb-2">
                <select class="border-2 rounded-md w-10/12" id="sizes">
                    <option selected disabled hidden value="0">Veľkosti</option>
                    @foreach($product->sizes as $size)
                    <option value="{{ $size->size }}">{{ $size->size }}</option>
                    @endforeach
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
    const selectSizes = document.getElementById('sizes');
    let shoeSize = false;

    selectSizes.addEventListener('change', (event) => {
        shoeSize = event.target.value;
        console.log(shoeSize);
    });

    let countBasketItems = 1;
    const btnAdd = document.getElementById('btnAdd');

    btnAdd.addEventListener('click', () => {
        if (shoeSize) {
            document.getElementById('numBasketItems').innerHTML = countBasketItems++;
            console.log(shoeSize);
        }
    });

    var slideIndex = 0;

    showSlides(slideIndex)

    function showSlides(n) {
        var slides = document.querySelectorAll('#slides div')

        if (n >= slides.length) {
            slideIndex = 0
        } else if (n < 0) {
            slideIndex = slides.length - 1
        }

        for (let i = 0; i < slides.length; i++) {
            if (!slides[i].classList.contains('hidden'))
                slides[i].classList.add('hidden')
        }

        slides[slideIndex].classList.remove('hidden')
    }

    function nextSlide(n) {
        showSlides(slideIndex += n)
    }
</script>
@endsection