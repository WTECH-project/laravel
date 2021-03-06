<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Product;
use App\Models\Image;
use App\Models\ProductSize;
use Database\Seeders\ProductSizeSeeder;
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
            'brand' => 'required|exists:brands,id',
            'color' => 'required|exists:colors,id',
            'sex_category' => 'required|exists:sex_categories,id',
            'category' => 'required|exists:categories,id',
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'ids' => 'required|array',
            'ids.*' => 'exists:sizes,id',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpg,jpeg,png'
        ]);

        try {
            DB::beginTransaction();

            // Creating new Product
            $product = Product::create([
                'brand_id' => $validatedData['brand'],
                'color_id' => $validatedData['color'],
                'sex_category_id' => $validatedData['sex_category'],
                'category_id' => $validatedData['category'],
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price']
            ]);

            if (!$product->exists) {
                Log::error('Error while creating a new product', ['data' => $validatedData]);
                throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
            }

            // Storing images of new Product
            if ($request->hasFile('images')) {
                $files = $request->file('images');
                $this->storeProductImages($files, $product);
            }

            // Storing sizes of new Product to database
            $ids = $validatedData['ids'];

            foreach ($ids as &$value) {
                $productSize = ProductSize::create([
                    'product_id' => $product->id,
                    'size_id' => $value
                ]);

                if (!$productSize) {
                    Log::error('Error while linking image with size', ['product_id' => $product->id, 'size_id' => $value]);
                    throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
                }
            }

            Log::info('Administrator vytvoril novy produkt', ['product' => $product]);

            session()->flash('message', 'Nov?? produkt bol pridan??');

            DB::commit();
        } catch (Throwable $e) {
            Log::error('Nastala chyba pri vytvarani noveho produktu', ['error' => $e]);
            DB::rollBack();

            session()->flash('error', 'Nastala chyba pri vytv??ran?? produktu');
        }

        return back();
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
            'brand' => 'required|exists:brands,id',
            'color' => 'required|exists:colors,id',
            'sex_category' => 'required|exists:sex_categories,id',
            'category' => 'required|exists:categories,id',
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'ids' => 'required|array',
            'ids.*' => 'exists:sizes,id',
            'images' => 'array',
            'images.*' => 'image|mimes:jpg,jpeg,png',
            'delete_images' => 'array',
            'delete_images.*' => 'exists:images,id'
        ]);

        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);
            $oldProduct = $product->replicate();

            $product->brand_id = $validatedData['brand'];
            $product->color_id = $validatedData['color'];
            $product->sex_category_id = $validatedData['sex_category'];
            $product->category_id = $validatedData['category'];
            $product->name = $validatedData['name'];
            $product->description = $validatedData['description'];
            $product->price = $validatedData['price'];

            if (!$product->save()) {
                Log::error('Nepodarilo sa ulozit editovany produkt', ['product' => $product]);
                throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
            }

            if (Cache::has('product-' . $product->id)) {
                Cache::forget('product-' . $product->id);
            }

            if ($request->hasFile('images')) {
                $files = $request->file('images');
                $this->storeProductImages($files, $product);
            }

            if ($request->has('delete_images')) {
                // check if user wants to delete all images and deny it if no image is being uploaded
                $productImages = $product->images()->get();
                $imagesToDelete = $product->images()->whereIn('id', $request->delete_images)->get();

                if ($productImages->diff($imagesToDelete)->isEmpty()) {
                    throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
                }

                $this->deleteProductImages($imagesToDelete, $product->id);
            }

            // handle sizes
            foreach(ProductSize::where('product_id', $product->id)->get() as $size) {
                if(!$size->delete()) {
                    Log::error('Nepodarilo sa vymazat velkost produktu', ['product_id' => $product->id, 'size_id' => $size->id]);
                    throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
                }
            }

            foreach ($request->ids as $size_id) {
                $productSize = ProductSize::create([
                    'product_id' => $product->id,
                    'size_id' => $size_id
                ]);

                if (!$productSize->exists) {
                    Log::error('Nepodarilo sa vytvorit velkost topanky', ['product_id' => $product->id, 'size_id' => $size_id]);
                    throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
                }
            }

            Log::info('Administrator editoval produkt', ['old' => $oldProduct, 'new' => $product]);

            session()->flash('message', 'Edit??cia produktu prebehla ??spe??ne');

            DB::commit();
        } catch (Throwable $e) {
            Log::error('Nepodarilo sa editovat produkt', ['error' => $e]);
            DB::rollBack();

            session()->flash('error', 'Nastala chyba pri editovan?? produktu');
        }

        return back();
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

        DB::transaction(function () use ($images, $id) {
            if (!Product::destroy($id)) {
                Log::error('Nastala chyba pri mazani produktu', ['product_id' => $id]);
                throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
            }

            $this->deleteProductImages($images, $id);
        });

        if (Cache::has('product-' . $id)) {
            Cache::forget('product-' . $id);
        }

        Log::info('Administrator vymazal produkt', ['product_id' => $id]);

        return back();
    }

    private function storeProductImages($images, Product $product)
    {
        foreach ($images as $file) {
            $fileName = $product->id . '-' . md5($file->getClientOriginalName()) . time() . '.' . $file->getClientOriginalExtension();
            $uploadedFile = $file->storeAs(config('app.images_path'), $fileName);

            if ($uploadedFile) {
                $createdImage = Image::create([
                    'product_id' => $product->id,
                    'image_path' => $fileName
                ]);

                if (!$createdImage->exists) {
                    Log::error('Error while creating image', ['product_id' => $product->id, 'image_path' => $fileName]);
                    throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
                }
            }
        }
    }

    private function deleteProductImages($images, $product_id)
    {
        foreach ($images as $image) {
            if (!$image->delete()) {
                Log::error('Nastala chyba pri mazani obrazku produktu', ['product_id' => $product_id, 'image_id' => $image->id]);
                throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
            }
        }

        foreach ($images as $image) {
            $filePath = storage_path(config('app.full_images_path')) . $image->image_path;

            if (!file_exists($filePath)) {
                Log::error('Obrazok nemozno vymazat, pretoze neexistuje', ['path' => $filePath]);
                continue;
            }
            if (!unlink($filePath)) {
                Log::error('Nastala chyba pri mazani obrazku produktu', ['product_id' => $product_id, 'image_path' => $image->image_path]);
            }
        }
    }
}
