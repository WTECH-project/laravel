<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Product;
use App\Models\Image;
use App\Models\ProductSize;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Throwable;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::query()->get();

        return view('admin.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand_id' => ['required'],
            'color_id' => ['required'],
            'sex_category_id' => ['required'],
            'category_id' => ['required'],
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'price' => ['required', 'regex:/^\d+(.\d{1,2})?$/'],
            'ids' => ['required'],
            'images' => ['required'],
        ]);

        try {
            DB::beginTransaction();

            // Creating new Product
            $product = Product::create([
                'brand_id' => (int)$_POST['brand_id'],
                'color_id' => (int)$_POST['color_id'],
                'sex_category_id' => (int)$_POST['sex_category_id'],
                'category_id' => (int)$_POST['category_id'],
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'price' => (float)$validatedData['price']
            ]);

            if (!$product->exists) {
                throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
            }

            // Storing images of new Product
            $files = $request->file('images');

            $images = array();

            if ($request->hasFile('images')) {
                foreach ($files as $file) {
                    $path = explode('/', $file->store('public'));
                    array_push($images, end($path));
                }
            }

            // Storing names of images to database
            foreach ($images as $image) {
                $createdImage = Image::create([
                    'product_id' => (int)$product->id,
                    'image_path' => $image
                ]);

                if (!$createdImage->exists) {
                    throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
                }
            }

            // Storing sizes of new Product to database
            $ids = $_POST['ids'];

            foreach ($ids as &$value) {
                $productSize = ProductSize::create([
                    'product_id' => (int)$product->id,
                    'size_id' => (int)$value
                ]);

                if (!$productSize) {
                    throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
                }
            }

            DB::commit();
        } catch (Throwable $e) {
            Log::error('Nastala chyba pri vytvarani noveho produktu', ['error' => $e]);
            DB::rollBack();
        }

        $newProduct = "Nový produkt bol pridaný";

        Log::log('Administrator vytvoril novy produkt', ['product' => $product]);

        return view('admin.create')
            ->with('newProduct', $newProduct);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.edit')
            ->with('product', $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCreate()
    {
        return view('admin.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'brand_id' => ['required'],
            'color_id' => ['required'],
            'sex_category_id' => ['required'],
            'category_id' => ['required'],
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'price' => ['required', 'regex:/^\d+(.\d{1,2})?$/'],
            'ids' => ['required'],
        ]);

        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);
            $oldProduct = $product->replicate();

            $product->brand_id = (int)$_POST['brand_id'];
            $product->color_id = (int)$_POST['color_id'];
            $product->sex_category_id = (int)$_POST['sex_category_id'];
            $product->category_id = (int)$_POST['category_id'];
            $product->name = $validatedData['name'];
            $product->description = $validatedData['description'];
            $product->price = (float)$validatedData['price'];

            if(!$product->save()) {
                Log::error('Nepodarilo sa ulozit editovany produkt', ['product' => $product]);
                throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
            }

            if(Cache::has('product-' . $product->id)) {
                Cache::forget('product-' . $product->id);
            }

            if ($request->hasFile('images')) {
                $images = Image::where('product_id', $id)->get();

                foreach ($images as $image) {
                    unlink(storage_path('\app\public\\' . $image->image_path));
                }

                if(!Image::where('product_id', $id)->delete()) {
                    Log::error('Nepodarilo sa vymazat obrazky produktu', ['product_id' => $id]);
                    throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
                }
            }

            if(!ProductSize::where('product_id', $id)->delete()) {
                Log::error('Nepodarilo sa vymazat velkosti topanok produktu', ['product_id' => $id]);
                throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
            }

            // Storing images of new Product
            $files = $request->file('images');

            $images = array();

            if ($request->hasFile('images')) {
                foreach ($files as $file) {
                    $path = explode('/', $file->store('public'));
                    array_push($images, end($path));
                }
            }

            // Storing names of images to database
            foreach ($images as $image) {
                $createdImage = Image::create([
                    'product_id' => (int)$product->id,
                    'image_path' => $image
                ]);

                if(!$createdImage->exists) {
                    Log::error('Nastala chyba pri vytvarani noveho obrazku produktu', ['product_id' => $product->id]);
                    throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
                }
            }

            // Storing sizes of new Product to database
            $ids = $_POST['ids'];

            foreach ($ids as &$value) {
                $productSize = ProductSize::create([
                    'product_id' => (int)$product->id,
                    'size_id' => (int)$value
                ]);

                if(!$productSize->exists) {
                    Log::error('Nastala chyba pri vytvarani velkosti topanok produktu', ['product_id' => $product->id]);
                    throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
                }
            }
            DB::commit();
        } catch (Throwable $e) {
            Log::error('Nepodarilo sa editovat produkt', ['error' => $e]);
            DB::rollBack();
        }

        $editedProduct = "Produkt bol upravený";
        $product = Product::findOrFail($id);

        Log::info('Administrator editoval produkt', ['old' => $oldProduct, 'new' => $product]);

        return view('admin.edit')
            ->with('product', $product)
            ->with('editedProduct', $editedProduct);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = Image::where('product_id', $id)->get();

        foreach ($images as $image) {
            unlink(storage_path('\app\public\\' . $image->image_path));
        }

        if(!Product::destroy($id)) {
            Log::error('Nastala chyba pri mazani produktu', ['product_id' => $id]);
            throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
        }

        if(Cache::has('product-' . $id)) {
            Cache::forget('product-' . $id);
        }

        Log::info('Administrator vymazal produkt', ['product_id' => $id]);

        $products = Product::query()->get();

        return view('admin.index')
            ->with('products', $products);
    }
}
