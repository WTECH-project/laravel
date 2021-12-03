@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto w-full flex-grow pt-6 px-2 md:px-8 md:pt-12">
    <article class="grid grid-cols-1 gap-4 place-items-center md:grid-cols-2 md:gap-0">
        <section class="max-w-lg relative mx-auto">
            <div id="slides">
                @foreach($product->images as $image)
                <div class="hidden">
                    <img class="w-full h-max-lg" src="{{ $image->image_path }}" alt="Topánka">
                </div>
                @endforeach
            </div>

            <div class="flex flex-row items-center justify-between absolute top-0 left-0 w-full h-full px-8">
                <button class="rounded-full bg-white h-12 w-12 shadow-md" onclick="nextSlide(-1)">&#10094;</button>
                <button class="rounded-full bg-white h-12 w-12 shadow-md" onclick="nextSlide(1)">&#10095;</button>
            </div>
        </section>

        <section class="flex flex-col w-full max-w-lg md:w-64">
            <div class="text-xl font-bold">
                {{ $product->brand->name }} {{ $product->name }}
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
            <form action="{{ route('cart') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}" />
                <input type="hidden" name="quantity" value="1" />

                @php
                $product_sizes = [];

                foreach($product->sizes as $size) {
                $product_sizes[strval($size->id)] = $size->size;
                }
                @endphp

                <x-forms.select name="size_id" placeholder="Veľkosti" label="" :options=$product_sizes />

                <div class="flex flex-col py-2">
                    <button class="p-3 bg-black text-white uppercase font-bold transition duration-300 hover:bg-gray-700 text-sm" type="submit" id="btnAdd">
                        Pridať do košíka
                    </button>
                </div>
            </form>
        </section>
    </article>
</div>
@endsection

@push('scripts')
<script>
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
@endpush