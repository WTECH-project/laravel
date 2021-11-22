@extends('layouts.app')

@section('content')
    <div class="w-full flex-grow max-w-xl mx-auto pt-8 px-4 my-18 md:pt-12 sm:max-w-2xl md:max-w-3xl lg:flex-row lg:max-w-5xl lg:space-x-4 xl:max-w-7xl">
        <div class="flex flex-row justify-between lg:ml-4">
            <h3 class="font-semibold text-xl lg:text-2xl xl:text-2xl">Ženy</h3>
            <select class="border-2 rounded-md" id="rearrangement">
                <option selected disabled hidden value="0">Preusporiadanie</option>
                <option value="vzostupne">Cena (vzostupne)</option>
                <option value="zostupne">Cena (zostupne)</option>
                <option value="abecedne">Abecedne</option>
            </select>
        </div>
        <div class="lg:flex flex-row justify-between gap-4">
            <aside class="w-full sm:w-1/2">
                <div id="filter"
                    class="flex cursor-pointer lg:cursor-default items-center space-x-1 text-lg lg:text-xl xl:text-xl">
                    <span>Filtre</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 lg:hidden" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
        
                <div id="filter_options"
                    class="hidden lg:block text-base bg-gray-100 border rounded-lg pb-1 lg:text-lg xl:text-lg pb-2 w-3/5 lg:w-full">
                    <section>
                        <h2 class="ml-2 font-semibold">Kategória</h2>
                        <div class="flex flex-col text-sm ml-3 lg:text-base xl:text-base">
                            <x-products.product-option type="checkbox" id="tenisky" name="tenisky" for="tenisky" label="Tenisky"/>
                            <x-products.product-option type="checkbox" id="sportova_obuv" name="sportova_obuv" for="sportova_obuv" label="Športová obuv"/>
                            <x-products.product-option type="checkbox" id="slapky" name="slapky" for="slapky" label="Šlapky"/>
                        </div>
                    </section>

                    <section>
                        <h2 class="ml-2 font-semibold">Značka</h2>
                        <div class="flex flex-col text-sm ml-3 lg:text-base xl:text-base">
                            <x-products.product-option type="checkbox" id="adidas" name="adidas" for="adidas" label="Adidas"/>
                            <x-products.product-option type="checkbox" id="nike" name="nike" for="nike" label="Nike"/>
                            <x-products.product-option type="checkbox" id="jordan" name="jordan" for="jordan" label="Jordan"/>
                        </div>
                    </section>
        
                    <section>
                        <h2 class="ml-2 font-semibold">Farba</h2>
                        <div class="flex flex-col text-sm ml-3 lg:text-base xl:text-base">
                            <x-products.product-option type="checkbox" id="biela" name="biela" for="biela" label="Biela"/>
                            <x-products.product-option type="checkbox" id="cierna" name="cierna" for="cierna" label="Čierna"/>
                            <x-products.product-option type="checkbox" id="hneda" name="hneda" for="hneda" label="Hnedá"/>
                        </div>
                    </section>
        
                    <section>
                        <h2 class="ml-2 font-semibold">Cena</h2>
                        <div class="flex flex-row text-sm ml-3 space-x-1 lg:text-base">
                            <p>Od</p>
                            <input type="text" id="price_from" class="w-10 h-6 text-sm sm:text-base sm:w-14 sm:h-6 border rounded-lg">
                            <p>Do</p>
                            <input type="text" id="price_to" class="w-10 h-6 text-sm sm:text-base sm:w-14 sm:h-6 border rounded-lg">
                        </div>
                    </section>
                </div>
            </aside>
            <div class="flex flex-col items-center">
                <div class="grid grid-cols-1 gap-4 text-sm sm:text-base md:grid-cols-3 pt-2">
                    @foreach($products as $product)
                        <x-products.product  name="{{$product['name']}}" price="{{$product['price']}} €" img="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80"/>
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