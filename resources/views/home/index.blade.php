@extends('layouts.app')

@section('content')
<section class="grid grid-cols-1 lg:grid-cols-2 max-w-6xl mx-auto gap-8">
    <?php
    $female_category_id = -1;
    $male_category_id = -1;

    foreach ($sex_categories as $key => $value) {
        if ($value->name == 'Muži') {
            $male_category_id = $value->id;
        } else if ($value->name == 'Ženy') {
            $female_category_id = $value->id;
        }
    }
    ?>
    <a class="col-span-2 lg:col-span-1 shadow-lg relative" href="{{ route('products', $female_category_id )}}">
        <div class="w-full h-full inset-0 top-0 left-0 absolute bg-black opacity-50"></div>
        <div class="w-full h-full absolute flex flex-col top-0 left-0 justify-center items-center">
            <div class="font-bold text-2xl sm:text-4xl md:text-6xl text-white">Ženy</div>
        </div>
        <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topánky">
    </a>
    <a class="col-span-2 lg:col-span-1 shadow-lg relative" href="{{ route('products', $male_category_id )}}">
        <div class="w-full h-full top-0 left-0 absolute bg-black opacity-50"></div>
        <div class="w-full h-full absolute flex flex-col top-0 left-0 justify-center items-center">
            <div class="font-bold text-2xl sm:text-4xl md:text-6xl text-white">Muži</div>
        </div>
        <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topánky">
    </a>
    <a class="col-span-2 relative shadow-md" href="{{ route('home') }}">
        <div class="w-full h-full top-0 left-0 absolute bg-black opacity-50"></div>
        <div class="w-full h-full absolute flex flex-col top-0 left-0 justify-center items-center">
            <div class="font-bold text-2xl sm:text-4xl md:text-6xl text-white">Vitajte vo svete tenisiek</div>
        </div>
        <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topánky">
    </a>
    <div class="col-span-2">
        <h2 class="text-4xl font-medium mb-4">Náš výber topánok</h2>
        <div class="grid grid-cols-1 sm:col-span-2 lg:grid-cols-3 justify-items-center gap-4">
            @foreach($products as $product)
            <a class="relative shadow-md" href="{{ route('products.show', ['sex_category' => $product->sexCategory->id, 'id' => $product->id]) }}">
                <div class="w-full h-full top-0 left-0 absolute bg-black opacity-50"></div>
                <div class="w-full h-full absolute flex flex-col top-0 left-0 justify-center items-center">
                    <div class="font-bold text-xl sm:text-2xl md:text-3xl lg:text-5xl text-white text-center">{{ $product->brand->name }} {{ $product->name }}</div>
                </div>
                <img class="w-full h-full object-cover" src="{{ $product->images->first()->image_path }}" alt="Topánky">
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection