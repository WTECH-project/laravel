@extends('layouts.app')

@section('content')
<?php
use Illuminate\Support\Facades\Storage;
?>

<div class="flex flex-col sm:flex-row">
    <form action="{{ route('admin')}}" method="get">
        @csrf
        <input class="border border-black p-1 mr-3 bg-white cursor-pointer" type="submit" value="< Naspäť" />
    </form>
    <div class="flex flex-col gap-4 w-full sm:w-1/2 md:w-10/12 lg:w-10/12 xl:w-8/12 mt-8 md:px-8">
        <h3 class="font-semibold text-xl lg:text-2xl xl:text-2xl mb-5">Aktuálny produkt</h3>
        <article class="grid grid-cols-1 place-items-center lg:grid-cols-3">
            <section class="max-w-lg col-span-2 relative mx-auto">
                <div id="slides">
                    @foreach($product->images as $image)
                    <div class="hidden">
                        <img class="w-full h-max-lg h-80" src="{{ asset('storage/' . $image->image_path) }}" alt="Topánka">
                    </div>
                    @endforeach
                </div>
                <div class="flex flex-row items-center justify-between absolute top-0 left-0 w-full h-full px-8">
                    <button class="rounded-full bg-white h-12 w-12 shadow-md" onclick="nextSlide(-1)">&#10094;</button>
                    <button class="rounded-full bg-white h-12 w-12 shadow-md" onclick="nextSlide(1)">&#10095;</button>
                </div>
            </section>

            <section class="flex flex-col lg:w-1/2 items-center sm:items-start">
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
                </form>
            </section>
        </article>
    </div>
    <div class="flex sm:w-1/2 flex-row gap-8 justify-center"> 
        <form action="{{ route('admin.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 w-full sm:w-1/2 md:w-10/12 lg:w-10/12 xl:w-10/12 mt-8 md:px-8">
            @if(isset($editedProduct)) 
                <div class="bg-green-400 p-2 border-2 border-green-500 text-center text-lg">{{$editedProduct}}</div>
            @endif
            
            @csrf
            <h3 class="font-semibold text-xl lg:text-2xl xl:text-2xl sm:mb-5">Úpravy produktu</h3>
            
            <x-forms.input-field
                label="Názov"
                name="name"
                type="text"
                value="{{ $product->name }}"
            />

            <div class="flex flex-col">
                <label class="text-gray-500">Značka</label>
                <select class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2 @error('brand_id') border-red-500 @enderror" name="brand_id">
                    <option selected disabled hidden value="0">Značka</option>
                    @foreach($brands as $brand)
                        <?php if($product->brand_id == $brand->id) {
                            echo "<option selected name=\"{$brand->id}\" id=\"{$brand->id}\" value=\"{$brand->id}\">{$brand->name}</option>";
                        } else {
                            echo "<option name=\"{$brand->id}\" id=\"{$brand->id}\" value=\"{$brand->id}\">{$brand->name}</option>";
                        } 
                        ?>
                    @endforeach
                </select>
                @error('brand_id')
                    <div class='text-red-500 text-sm'>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <x-forms.input-field
                label="Cena (€)"
                name="price"
                type="text"
                value="{{ $product->price }}"
            />

            <div class="flex flex-col">
                <label class="text-gray-500">Popis</label>
                <textarea class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2" id="description" name="description" rows="4" cols="50">{{ $product->description }}</textarea>
            </div>
            @error('description')
                <div class='text-red-500 text-sm'>
                    {{ $message }}
                </div>
            @enderror

            <div class="flex flex-col">
                <label class="text-gray-500">Kategória pohlavia</label>
                <select class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2 @error('sex_category_id') border-red-500 @enderror" name="sex_category_id">
                    <option selected disabled hidden value="0">Kategória pohlavia</option>
                    @foreach($sexCategories as $sexCategory)
                        <?php if($product->sex_category_id == $sexCategory->id) {
                            echo "<option selected name=\"{$sexCategory->id}\" id=\"{$sexCategory->id}\" value=\"{$sexCategory->id}\">{$sexCategory->name}</option>";
                        } else {
                            echo "<option name=\"{$sexCategory->id}\" id=\"{$sexCategory->id}\" value=\"{$sexCategory->id}\">{$sexCategory->name}</option>";
                        } 
                        ?>
                    @endforeach
                </select>
                @error('sex_category_id')
                    <div class='text-red-500 text-sm'>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex flex-col">
                <label class="text-gray-500">Kategória</label>
                <select class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2 @error('category_id') border-red-500 @enderror"  name="category_id">
                    <option selected disabled hidden value="0">Kategória</option>
                    @foreach($categories as $category)
                        <?php if($product->category_id == $category->id) {
                            echo "<option selected name=\"{$category->id}\" id=\"{$category->id}\" value=\"{$category->id}\">{$category->name}</option>";
                        } else {
                            echo "<option name=\"{$category->id}\" id=\"{$category->id}\" value=\"{$category->id}\">{$category->name}</option>";
                        } 
                        ?>
                    @endforeach
                </select>
                @error('category_id')
                    <div class='text-red-500 text-sm'>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex flex-col">
                <label class="text-gray-500">Farba</label>
                <select class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2 @error('color_id') border-red-500 @enderror" name="color_id">
                    <option selected disabled hidden value="0">Farba</option>
                    @foreach($colors as $color)
                        <?php if($product->color_id == $color->id) {
                            echo "<option selected name=\"{$color->id}\" id=\"{$color->id}\" value=\"{$color->id}\">{$color->color}</option>";
                        } else {
                            echo "<option name=\"{$color->id}\" id=\"{$color->id}\" value=\"{$color->id}\">{$color->color}</option>";
                        } 
                        ?>
                    @endforeach
                </select>
                @error('color_id')
                    <div class='text-red-500 text-sm'>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <label class="text-gray-500">Veľkosti</label>
            <div class="grid grid-cols-7">
                <?php
                    $productSizes = array();
                    foreach($product->sizes as $size) {
                        array_push($productSizes, $size->id);
                    }
                ?>
                @foreach($sizes as $size)
                    <?php
                        if (in_array($size->id, $productSizes)) {
                            echo "<div>
                                    <input checked type=\"checkbox\" id=\"{$size->id}\" name=\"ids[]\" value=\"{$size->id}\">
                                    <label for=\"{$size->id}\">{$size->size}</label>
                                </div>";
                        } else {
                            echo "<div>
                                    <input type=\"checkbox\" id=\"{$size->id}\" name=\"ids[]\" value=\"{$size->id}\">
                                    <label for=\"{$size->id}\">{$size->size}</label>
                                </div>";
                        }
                    ?>
                @endforeach
            </div>
            @error('ids')
                <div class='text-red-500 text-sm'>
                    {{ $message }}
                </div>
            @enderror

            <?php
                $num = 1;
            ?>
            @foreach($product->images as $image)
                <x-forms.input-field
                    label="Názov obrázku {{$num}}"
                    name="image{{$num}}"
                    type="text"
                    value="{{$image->image_path}}"
                />
                <?php
                    $num++;
                ?>
            @endforeach
            Vyberte nové obrázky:
            <input type="file" name="images[]" multiple >
            @error('images')
                <div class='text-red-500 text-sm'>
                    {{ $message }}
                </div>
            @enderror
            <button class="border border-black p-1 bg-black text-white" type="submit"> Uložiť úpravy </button> 
        </form>
    </div>
</div>

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
@endsection