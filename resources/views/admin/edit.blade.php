@extends('layouts.app')

@section('content')
<section>
    <div class="sm:ml-8 mb-4">
        <a class="border border-black w-min p-1 bg-white" href="{{ route('admin')}}">
            Naspäť
        </a>
    </div>
    <h2 class="font-bold w-full text-3xl sm:text-4xl text-center">Editovanie produktu</h2>
    <div class="flex flex-col w-full">
        @if(Session::has('message'))
        <div class="bg-green-400 p-2 border-2 border-green-500 text-center text-lg">{{ Session::get('message') }}</div>
        @endif

        @if(Session::has('error'))
        <div class="bg-red-400 p-2 border-2 border-red-500 text-center text-lg">{{ Session::get('error') }}</div>
        @endif
    </div>
    <form action="{{ route('admin.update', $product) }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
        @csrf
        @method('put')

        <div class="grid grid-cols-1 max-w-xl xl:max-w-6xl xl:grid-cols-2 xl:w-full">
            <section class="flex flex-col gap-4 mt-8 md:px-8">
                <x-forms.input-field label="Názov" name="name" type="text" value="{{ !old('name') ? $product->name : old('name') }}" />

                @php
                $brand_options = [];
                $sex_category_options = [];
                $category_options = [];
                $color_options = [];


                foreach($brands as $brand) {
                $brand_options[$brand->id] = $brand->name;
                }

                foreach($sexCategories as $sexCategory) {
                $sex_category_options[$sexCategory->id] = $sexCategory->name;
                }

                foreach($categories as $category) {
                $category_options[$category->id] = $category->name;
                }

                foreach($colors as $color) {
                $color_options[$color->id] = $color->color;
                }

                @endphp

                <x-forms.select label="Značka" name="brand" placeholder="Značka" :options=$brand_options selected="{{ !old('brand') ? $product->brand_id : old('brand') }}" />

                <x-forms.input-field label="Cena (€)" name="price" type="number" value="{{ !old('price') ? $product->price : old('price') }}" min="0" />

                <x-forms.text-area label="Popis" name="description" value="{{ !old('description') ? $product->description : old('description') }}" />

                <x-forms.select label="Pohlavie" name="sex_category" placeholder="Pohlavie" :options=$sex_category_options selected="{{ old('sex_category') }}" selected="{{ !old('sex_category') ? $product->sex_category_id : old('sex_category') }}" />

                <x-forms.select label="Kategória" name="category" placeholder="Kategória" :options=$category_options selected="{{ old('category') }}" selected="{{ !old('category') ? $product->category_id : old('category') }}" />

                <x-forms.select label="Farba" name="color" placeholder="Farba" :options=$color_options selected="{{ old('color') }}" selected="{{ !old('color') ? $product->color_id : old('color') }}" />
            </section>

            @php
            $product_sizes = $product->sizes->map(function($size) {
            return $size->id;
            })->toArray();
            @endphp

            <section class="flex flex-col gap-4 mt-8 md:px-8">
                <div>
                    <h3 class="text-gray-500">Veľkosti</h3>
                    <div class="grid grid-cols-7 gap-4 mt-2">
                        @foreach($sizes as $size)
                        <div class="flex flex-row items-center">
                            <input type="checkbox" id="{{'size-' . $size->id}}" name="ids[]" value="{{$size->id}}" {{ in_array($size->id, $product_sizes) ? 'checked' : '' }} />
                            <label class="ml-2" for="{{$size->id}}">{{$size->size}}</label>
                        </div>
                        @endforeach
                    </div>

                    @error('ids')
                    <div class='text-red-500 mt-2 text-sm'>
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div>
                    <h3 class="text-gray-500">Odstrániť obrázok</h3>
                    <div class="grid md:grid-cols-2 gap-4 mt-2">
                        @foreach($product->images as $image)
                        <div class="flex flex-col md:flex-row items-center justify-center">
                            <!-- image with text -->
                            <div>
                                <img class="md:w-52 md:h-24" src="{{ asset('storage/' . $image->image_path) }}" alt="Topanka">
                            </div>
                            <div class="flex flex-row p-4 w-full items-center space-x-2 justify-center">
                                <input type="checkbox" id="{{ 'image-' . $image->id }}" name="delete_images[]" value="{{ $image->id }}" />
                                <label for="{{ 'image-' . $image->id }}">Odstrániť</label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <x-forms.input-field label="Nahrať nové obrázky" name="images[]" type="file" multiple accept="image/*" />

                <x-forms.button text="Editovať produkt" type="submit" />
            </section>
        </div>
    </form>
</section>
@endsection