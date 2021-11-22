@extends('layouts.app')

@section('content')
<div class="w-full flex-grow max-w-xl mx-auto pt-8 px-4 my-18 md:pt-12 sm:max-w-2xl md:max-w-3xl lg:flex-row lg:max-w-5xl lg:space-x-4 xl:max-w-7xl">
    <div class="flex flex-row justify-between lg:ml-4">
        <h3 class="font-semibold text-xl lg:text-2xl xl:text-2xl">Ženy</h3>
    </div>
    <div class="lg:flex flex-row justify-between gap-4">
        <aside class="w-full sm:w-1/2">
            <div id="filter" class="flex cursor-pointer lg:cursor-default items-center space-x-1 text-lg lg:text-xl xl:text-xl">
                <span>Filtre</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 lg:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>

            <form id="filter_options" route="{{ route('products') }}" method="GET" class="hidden lg:block text-base bg-gray-100 border rounded-lg pb-1 lg:text-lg xl:text-lg pb-2 w-3/5 lg:w-full">
                <section>
                    <h2 class="ml-2 font-semibold">Kategória</h2>
                    <div class="flex flex-col text-sm ml-3 lg:text-base xl:text-base">
                        @php
                        $checked_categories = [];
                        if(isset($_GET['category'])) {
                        $checked_categories = $_GET['category'];
                        }
                        @endphp

                        @foreach($categories as $category)
                        @if(in_array($category->id, $checked_categories))
                        <x-products.product-option type="checkbox" name="category[]" value="{{ $category->id }}" label="{{ $category->name }}" checked />
                        @else
                        <x-products.product-option type="checkbox" name="category[]" value="{{ $category->id }}" label="{{ $category->name }}" />
                        @endif
                        @endforeach
                    </div>
                </section>

                <section>
                    <h2 class="ml-2 font-semibold">Značka</h2>
                    <div class="flex flex-col text-sm ml-3 lg:text-base xl:text-base">
                        @php
                        $checked_brand = [];
                        if(isset($_GET['brand'])) {
                        $checked_brand = $_GET['brand'];
                        }
                        @endphp

                        @foreach($brands as $brand)
                        @if(in_array($brand->id, $checked_brand))
                        <x-products.product-option type="checkbox" name="brand[]" value="{{ $brand->id }}" label="{{ $brand->name }}" checked />
                        @else
                        <x-products.product-option type="checkbox" name="brand[]" value="{{ $brand->id }}" label="{{ $brand->name }}" />
                        @endif
                        @endforeach
                    </div>
                </section>

                <section>
                    <h2 class="ml-2 font-semibold">Farba</h2>
                    <div class="flex flex-col text-sm ml-3 lg:text-base xl:text-base">
                        @php
                        $checked_colors = [];
                        if(isset($_GET['color'])) {
                        $checked_colors = $_GET['color'];
                        }
                        @endphp

                        @foreach($colors as $color)
                        @if(in_array($color->id, $checked_colors))
                        <x-products.product-option type="checkbox" name="color[]" value="{{ $color->id }}" label="{{ $color->color }}" checked />
                        @else
                        <x-products.product-option type="checkbox" name="color[]" value="{{ $color->id }}" label="{{ $color->color }}" />
                        @endif
                        @endforeach
                    </div>
                </section>

                <section>
                    <h2 class="ml-2 font-semibold">Cena</h2>
                    <div class="flex flex-row text-sm ml-3 space-x-1 lg:text-base">
                        <p>Od</p>
                        <input type="text" name="price_from" id="price_from" min="0" class="w-10 h-6 text-sm sm:text-base sm:w-14 sm:h-6 border rounded-lg" onkeyup="controlPriceFields()" @if(isset($_GET['price_from']) && ! empty($_GET['price_from'])) value="{{ $_GET['price_from'] }}" @endif>
                        <p>Do</p>
                        <input type="text" name="price_to" id="price_to" min="0" class="w-10 h-6 text-sm sm:text-base sm:w-14 sm:h-6 border rounded-lg" onkeyup="controlPriceFields()" @if(isset($_GET['price_to']) && ! empty($_GET['price_to'])) value="{{ $_GET['price_to'] }}" @endif>
                    </div>
                </section>
                <section>
                    <select class="border-2 rounded-md" id="sort" name="sort">
                        <option disabled hidden value="0" @if(isset($_GET['sort']) && !empty($_GET['sort'])) selected @endif>Preusporiadanie</option>
                        <option value="asc" @if(isset($_GET['sort']) && $_GET['sort']==='asc' ) selected @endif>Cena (vzostupne)</option>
                        <option value="desc" @if(isset($_GET['sort']) && $_GET['sort']==='desc' ) selected @endif>Cena (zostupne)</option>
                        <option value="alphabet" @if(isset($_GET['sort']) && $_GET['sort']==='alphabet' ) selected @endif>Abecedne</option>
                    </select>
                </section>
                <button type="submit">
                    Filtrovať
                </button>
            </form>
        </aside>
        <div class="flex flex-col items-center">
            <div class="grid grid-cols-1 gap-4 text-sm sm:text-base md:grid-cols-3 pt-2">
                @foreach($products as $product)
                <x-products.product link="{{ route('products.show', $product->id) }}" name="{{ $product->name }}" price="{{ $product->price }}" img="{{ $product->images->first()->image_path }}" />
                @endforeach
            </div>
            <div class="flex items-center space-x-3 text-lg col-span-2 md:col-span-3 place-self-center mt-4">
                <a href="#" class="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const priceFromInput = document.getElementById('price_from');
    const priceToInput = document.getElementById('price_to');

    let lastPriceFromValue = undefined;
    let lastPriceToValue = undefined;

    function controlPriceFields() {
        const priceFromValue = parseInt(priceFromInput.value);
        const priceToValue = parseInt(priceToInput.value);

        console.log(priceFromValue, lastPriceFromValue, priceToValue, lastPriceToValue);

        if (priceFromValue > priceToValue) {
            if (priceFromValue !== lastPriceFromValue) {
                priceToInput.value = priceFromValue;
            } else if (priceToValue !== lastPriceToValue) {
                priceFromInput.value = priceToValue;
            }
        }

        lastPriceFromValue = parseInt(priceFromInput.value)
        lastPriceToValue = parseInt(priceToInput.value)
    }
</script>
@endpush