@extends('layouts.app')

@section('content')

<section>
    <div class="sm:ml-8 mb-4">
        <a class="border border-black w-min p-1 bg-white" href="{{ route('admin')}}">
            Naspäť
        </a>
    </div>
    <h2 class="font-bold w-full text-3xl sm:text-4xl text-center">Vytvorenie produktu</h2>
    <div class="flex flex-col w-full">
        @if(Session::has('message'))
        <div class="bg-green-400 p-2 border-2 border-green-500 text-center text-lg">{{ Session::get('message') }}</div>
        @endif

        @if(Session::has('error'))
        <div class="bg-red-400 p-2 border-2 border-red-500 text-center text-lg">{{ Session::get('error') }}</div>
        @endif
    </div>
    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
        <div class="grid grid-cols-1 max-w-xl xl:max-w-6xl xl:grid-cols-2 xl:w-full">
            <section class="flex flex-col gap-4 mt-8 md:px-8">
                @csrf
                <x-forms.input-field label="Názov" name="name" type="text" />

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

                <x-forms.select label="Značka" name="brand" placeholder="Značka" :options=$brand_options selected="{{ old('brand') }}" />

                <x-forms.input-field label="Cena (€)" name="price" type="number" min="0" />

                <x-forms.text-area label="Popis" name="description" />

                <x-forms.select label="Pohlavie" name="sex_category" placeholder="Pohlavie" :options=$sex_category_options selected="{{ old('sex_category') }}" />

                <x-forms.select label="Kategória" name="category" placeholder="Kategória" :options=$category_options selected="{{ old('category') }}" />

                <x-forms.select label="Farba" name="color" placeholder="Farba" :options=$color_options selected="{{ old('color') }}" />
            </section>

            <section class="flex flex-col gap-4 mt-8 md:px-8">
                <div>
                    <h3 class="text-gray-500">Veľkosti</h3>
                    <div class="grid grid-cols-7 gap-4 mt-2">
                        @foreach($sizes as $size)
                        <div class="flex flex-row items-center">
                            <input type="checkbox" id="{{'size-' . $size->id}}" name="ids[]" value="{{$size->id}}">
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

                <x-forms.input-field label="Vyberte obrázky" name="images[]" type="file" multiple accept="image/*" />

                <x-forms.button text="Pridať produkt" type="submit" />
            </section>
        </div>
    </form>
</section>

@endsection