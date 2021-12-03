@extends('layouts.app')

@section('content')
<div class="w-full flex-grow max-w-xl mx-auto pt-8 px-4 my-18 md:pt-12 sm:max-w-2xl md:max-w-3xl lg:flex-row lg:max-w-5xl lg:space-x-4 xl:max-w-7xl">
    <form class="flex flex-row focus:ring-black border-b-2 p-2 drop-shadow-lg lg:ml-4 mb-5" method="get" action="{{ route('products', $sex_category) }}">
        <button class="p-2 rounded-sm uppercase transition duration-300 hover:bg-black hover:text-white" type="submit">Vyhladať</button>
        <input class="border-none w-full focus:ring-0" name="search" type="text" placeHolder="Názov produktu">
    </form>
    <div class="flex flex-row justify-between">
        <h2 class="font-semibold text-3xl">{{ $sex_category->name }}</h2>
    </div>
    <div class="lg:grid grid-cols-12 gap-4 mt-4">
        <aside class="col-span-3">
            <div id="filter" class="flex cursor-pointer lg:cursor-default items-center space-x-1 border-b-2">
                <h2 class="text-2xl mb-2">Filtre</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 lg:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>

            <form id="filter_options" route="{{ route('products', $sex_category) }}" method="GET" class="hidden lg:block text-base rounded-lg pb-1 lg:text-lg xl:text-lg pb-2 lg:w-full">
                <section class="border-b-2 py-4">
                    <h2 class="text-xl mb-2">Kategória</h2>
                    <div class="flex flex-col">
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

                <section class="border-b-2 py-4">
                    <h2 class="text-xl mb-2">Značka</h2>
                    <div class="flex flex-col">
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

                <section class="border-b-2 py-4">
                    <h2 class="text-xl mb-2">Farba</h2>
                    <div class="flex flex-col">
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
                <section class="border-b-2 py-4">
                    <h2 class="text-xl mb-2">Cena</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <input type="number" placeholder="Od" name="price_from" id="price_from" min="0" class="border-2 border-gray-300" onkeyup="controlPriceFields()" @if(isset($_GET['price_from']) && ! empty($_GET['price_from'])) value="{{ $_GET['price_from'] }}" @endif />
                        <input type="number" placeholder="Do" name="price_to" id="price_to" min="0" class="border-2 border-gray-300" onkeyup="controlPriceFields()" @if(isset($_GET['price_to']) && ! empty($_GET['price_to'])) value="{{ $_GET['price_to'] }}" @endif />
                    </div>
                </section>
                <section class="border-b-2 py-4">
                    <h2 class="text-xl mb-2">Usporiadanie</h2>
                    <select class="border-2 border-gray-300 w-full px-4 py-2" id="sort" name="sort">
                        <option disabled hidden value="0" @if(isset($_GET['sort']) && !empty($_GET['sort'])) selected @endif>Preusporiadanie</option>
                        <option value="asc" @if(isset($_GET['sort']) && $_GET['sort']==='asc' ) selected @endif>Cena (vzostupne)</option>
                        <option value="desc" @if(isset($_GET['sort']) && $_GET['sort']==='desc' ) selected @endif>Cena (zostupne)</option>
                        <option value="alphabet" @if(isset($_GET['sort']) && $_GET['sort']==='alphabet' ) selected @endif>Abecedne</option>
                    </select>
                </section>
                <div class="py-4">
                    <x-forms.button text="Filtrovať" type="submit" />
                </div>
            </form>
        </aside>
        <div class="flex col-span-9 flex-col flex-grow items-center">
            <div class="grid grid-cols-1 gap-4 text-sm sm:text-base md:grid-cols-3 pt-2">
                @foreach($products as $product)
                <x-products.product link="{{ route('products.show', ['sex_category' => $sex_category, 'id' => $product->id]) }}" brand="{{ $product->brand->name }}" name="{{ $product->name }}" price="{{ $product->price }}" img="{{ $product->images->first()->image_path }}" />
                @endforeach
            </div>
            <div class="mt-4 text-lg">
                {{ $products->appends($_GET)->links('components.products.pagination') }}</div>
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

    const filter = document.getElementById('filter');
    const filter_options = document.getElementById('filter_options');

    filter.addEventListener('click', () => {
        if (filter_options.classList.contains('hidden')) {
            filter_options.classList.remove('hidden');
        } else {
            filter_options.classList.add('hidden');
        }
    });
</script>
@endpush