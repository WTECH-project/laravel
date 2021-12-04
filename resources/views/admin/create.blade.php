@extends('layouts.app')

@section('content')

<form action="{{ route('admin')}}" method="get">
    @csrf
    <input class="border border-black p-1 mr-3 bg-white cursor-pointer" type="submit" value="< Naspäť" />
</form>
<form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center mt-4">
    <div class="flex flex-col sm:flex-row gap-8 lg:w-9/12">
        <div class="flex flex-col gap-4 w-full sm:w-1/2 md:w-10/12 lg:w-8/12 xl:w-7/12 mt-8 md:px-8">
            @if(isset($newProduct)) 
                <div class="bg-green-400 p-2 border-2 border-green-500 text-center text-lg">{{$newProduct}}</div>
            @endif
            
            <h3 class="font-semibold text-xl lg:text-2xl xl:text-2xl mb-5">Vytvorenie produktu</h3>

            @csrf
            <x-forms.input-field
                label="Názov"
                name="name"
                type="text"
                value=""
            />
            
            <select class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2 @error('brand_id') border-red-500 @enderror" name="brand_id">
                <option value="" selected disabled hidden value="0">Značka</option>
                @foreach($brands as $brand)
                    <option name="{{$brand->id}}" id="{{$brand->id}}" value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
            @error('brand_id')
                <div class='text-red-500 text-sm'>
                    {{ $message }}
                </div>
            @enderror
            
            <x-forms.input-field
                label="Cena (€)"
                name="price"
                type="text"
                value=""
            />

            <div class="flex flex-col">
                <label class="text-gray-500">Popis</label>
                <textarea class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2 @error('description') border-red-500 @enderror" id="description" name="description" rows="4" cols="50" ></textarea>
            </div>
            @error('description')
                <div class='text-red-500 text-sm'>
                    {{ $message }}
                </div>
            @enderror
            
            <select class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2 @error('sex_category_id') border-red-500 @enderror" name="sex_category_id">
                <option value="" selected disabled hidden value="0">Kategória pohlavia</option>
                @foreach($sexCategories as $sexCategory)
                    <option name="{{$sexCategory->id}}" id="{{$sexCategory->id}}" value="{{$sexCategory->id}}">{{$sexCategory->name}}</option>
                @endforeach
            </select>
            @error('sex_category_id')
                <div class='text-red-500 text-sm'>
                    {{ $message }}
                </div>
            @enderror
        
            <select class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2 @error('category_id') border-red-500 @enderror" name="category_id">
                <option value="" selected disabled hidden value="0">Kategória</option>
                @foreach($categories as $category)
                    <option name="{{$category->id}}" id="{{$category->id}}" value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class='text-red-500 text-sm'>
                    {{ $message }}
                </div>
            @enderror
            
            <select class="bg-white border-2 border-gray-600 focus:outline-none transition duration-300 focus:border-black px-4 py-3 mt-2 @error('color_id') border-red-500 @enderror" name="color_id">
                <option value="" selected disabled hidden value="0">Farba</option>
                @foreach($colors as $color_id)
                    <option name="{{$color_id->id}}" id="{{$color_id->id}}" value="{{$color_id->id}}">{{$color_id->color}}</option>
                @endforeach
            </select>
            @error('color_id')
                <div class='text-red-500 text-sm'>
                    {{ $message }}
                </div>
            @enderror
            
        </div>
        
        <div class="flex flex-col gap-4 w-full sm:w-1/2 md:w-10/12 lg:w-8/12 xl:w-7/12 mt-8 md:px-8">
            <label class="text-gray-500">Veľkosti</label>
            <div class="grid grid-cols-7 gap-4">
                @foreach($sizes as $size)
                <div class="flex flex-col">
                    <input type="checkbox" id="{{$size->id}}" name="ids[]" value="{{$size->id}}">
                    <label for="{{$size->id}}">{{$size->size}}</label>
                </div>
                @endforeach
            </div>
            @error('ids')
                <div class='text-red-500 text-sm'>
                    {{ $message }}
                </div>
            @enderror

            Vyberte obrázky:
            <input type="file" name="images[]" multiple accept="image/*">
            @error('images')
                <div class='text-red-500 text-sm'>
                    {{ $message }}
                </div>
            @enderror
            <button class="border border-black p-1 bg-black text-white @error('images') border-red-500 @enderror" type="submit"> Pridať produkt </button>
        </div>
    </div>
</form>

@endsection