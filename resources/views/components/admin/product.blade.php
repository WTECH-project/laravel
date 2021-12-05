@props([
'link' => $link,
'name' => $name,
'description' => $description,
'price' => $price,
'img' => $img,
'productId' => $productId
])

<div class="flex flex-col md:flex-row justify-between my-4">
    <!-- outside div -->
    <div class="flex flex-col md:flex-row md:flex-grow">
        <!-- image with text -->
        <div class="">
            <img class="md:w-52 md:h-36" src="{{ $img }}" alt="Topanka">
        </div>
        <div class="flex flex-col md:justify-between p-4 w-full">
            <span class="font-bold text-2xl">{{ $name }}</span>
            <div class="flex flex-row py-2">
                <span class="text-gray-500 ml-4">{{ $price }}€</span>
            </div>
        </div>
    </div>
    <div class="flex flex-col items-center justify-between p-4 text-center">
        <!-- update button -->
        <a class="block py-3 bg-white border-2 border-gray-400 
                    hover:border-black transition duration-200 w-full px-4" href="{{ $link }}">Editovať</a>
        <!-- delete button -->
        <form class="w-full mt-4 md:mt-0" action="{{ route('admin.delete', $productId) }}" method="post">
            @method('DELETE')
            @csrf
            <button class="py-3 bg-white border-2 border-gray-400 
                    hover:border-black transition duration-200 w-full cursor-pointer px-4" type="submit">Vymazať</button>
        </form>
    </div>
</div>