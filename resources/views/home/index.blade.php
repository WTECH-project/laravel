@extends('layouts.app')

@section('content')
<section class="grid grid-cols-1 sm:grid-cols-2 place-items-center">
    <a class="w-5/6 h-5/6 max-h-96 shadow-lg relative sm:ml-7 lg:ml-14 xl:ml-20 mt-14 sm:mt-0" href="{{ route('products', $female_category->id )}}">
        <div class="w-full h-full inset-0 top-0 left-0 absolute bg-black opacity-50"></div>
        <div class="w-full h-full absolute flex flex-col top-0 left-0 justify-center items-center">
            <div class="font-bold text-2xl sm:text-4xl md:text-6xl text-white">Ženy</div>
        </div>
        <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topánky">
    </a>
    <a class="w-5/6 h-5/6 max-h-96 shadow-lg relative sm:mr-7 lg:mr-14 xl:mr-20" href="{{ route('products', $male_category->id )}}">
        <div class="w-full h-full top-0 left-0 absolute bg-black opacity-50"></div>
        <div class="w-full h-full absolute flex flex-col top-0 left-0 justify-center items-center">
            <div class="font-bold text-2xl sm:text-4xl md:text-6xl text-white">Muži</div>
        </div>
        <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topánky">
    </a>
    <a class="sm:col-span-2 w-11/12 h-full max-h-96 relative shadow-md" href="{{ route('home') }}">
        <div class="w-full h-full top-0 left-0 absolute bg-black opacity-50"></div>
        <div class="w-full h-full absolute flex flex-col top-0 left-0 justify-center items-center">
            <div class="font-bold text-2xl sm:text-4xl md:text-6xl text-white">Vitajte vo svete tenisiek</div>
        </div>
        <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1112&q=80" alt="Topánky">
    </a>
    <div class="grid grid-cols-1 sm:col-span-2 sm:grid-cols-3 justify-items-center mt-8 gap-4">
        @foreach($products as $product)
        <a class="w-11/12 h-11/12 max-h-80 relative shadow-md sm:ml-5 lg:ml-16" href="{{ route('products.show', ['sex_category' => $product->sexCategory->id, 'product' => $product->id]) }}">
            <div class="w-full h-full top-0 left-0 absolute bg-black opacity-50"></div>
            <div class="w-full h-full absolute flex flex-col top-0 left-0 justify-center items-center">
                <div class="font-bold text-xl sm:text-2xl md:text-3xl lg:text-5xl text-white">{{ $product->name }}</div>
            </div>
            <img class="w-full h-full object-cover" src="{{ $product->images->first()->image_path }}" alt="Topánky">
        </a>
        @endforeach
    </div>
</section>
@endsection