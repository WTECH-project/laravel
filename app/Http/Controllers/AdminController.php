<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Category;
use App\Models\SexCategory;
use App\Models\Image;
use App\Models\Size;
use App\Models\ProductSize;

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
        
        // Creating new Product
        $product = Product::create([
            'brand_id' => (int)$_POST['brand_id'],
            'color_id' => (int)$_POST['color_id'],
            'sex_category_id' => (int)$_POST['sex_category_id'],
            'category_id' => (int)$_POST['category_id'],
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => (double)$validatedData['price']
        ]);
        
        // Storing images of new Product
        $files = $request->file('images');

        $images = array();

        if($request->hasFile('images'))
        {
            foreach($files as $file) {
                $path = explode('/', $file->store('public'));
                array_push($images, end($path));
            }
        }

        // Storing names of images to database
        foreach($images as $image) {
            error_log('Som tu');
            Image::create([
                'product_id' => (int)$product->id,
                'image_path' => $image
            ]);
        }

        // Storing sizes of new Product to database
        $ids = $_POST['ids'];

        foreach($ids as &$value) {
            ProductSize::create([
                'product_id' => (int)$product->id,
                'size_id' => (int)$value
            ]);
        }

        $newProduct = "Nový produkt bol pridaný";

        $brands = Brand::get();
        $colors = Color::get();
        $categories = Category::get();
        $sexCategories = SexCategory::get();
        $sizes = Size::get();

        return view('admin.create')
            ->with('brands', $brands)
            ->with('colors', $colors)
            ->with('categories', $categories)
            ->with('sexCategories', $sexCategories)
            ->with('sizes', $sizes)
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

        $brands = Brand::get();
        $colors = Color::get();
        $categories = Category::get();
        $sexCategories = SexCategory::get();
        $sizes = Size::get();

        return view('admin.edit')
            ->with('brands', $brands)
            ->with('colors', $colors)
            ->with('categories', $categories)
            ->with('sexCategories', $sexCategories)
            ->with('sizes', $sizes)
            ->with('product', $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCreate()
    {
        $brands = Brand::get();
        $colors = Color::get();
        $categories = Category::get();
        $sexCategories = SexCategory::get();
        $sizes = Size::get();

        return view('admin.create')
            ->with('brands', $brands)
            ->with('colors', $colors)
            ->with('categories', $categories)
            ->with('sexCategories', $sexCategories)
            ->with('sizes', $sizes);
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
        
        $product = Product::find($id);

        $product->brand_id = (int)$_POST['brand_id'];
        $product->color_id = (int)$_POST['color_id'];
        $product->sex_category_id = (int)$_POST['sex_category_id'];
        $product->category_id = (int)$_POST['category_id'];
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = (double)$validatedData['price'];

        $product->save();

        $images = Image::where('product_id', $id)->get();
        
        foreach($images as $image) {
            unlink(storage_path('\app\public\\' . $image->image_path));
        }

        $deletedImages = Image::where('product_id', $id)->delete();

        $deletedSizes = ProductSize::where('product_id', $id)->delete();

        // Storing images of new Product
        $files = $request->file('images');

        $images = array();

        if($request->hasFile('images'))
        {
            foreach($files as $file) {
                $path = explode('/', $file->store('public'));
                array_push($images, end($path));
            }
        }
        
        // Storing names of images to database
        foreach($images as $image) {
            error_log('Som tu');
            Image::create([
                'product_id' => (int)$product->id,
                'image_path' => $image
            ]);
        }

        // Storing sizes of new Product to database
        $ids = $_POST['ids'];

        foreach($ids as &$value) {
            ProductSize::create([
                'product_id' => (int)$product->id,
                'size_id' => (int)$value
            ]);
        }

        $brands = Brand::get();
        $colors = Color::get();
        $categories = Category::get();
        $sexCategories = SexCategory::get();
        $sizes = Size::get();
        
        $editedProduct = "Produkt bol upravený";
        $product = Product::find($id);        

        return view('admin.edit')
            ->with('brands', $brands)
            ->with('colors', $colors)
            ->with('categories', $categories)
            ->with('sexCategories', $sexCategories)
            ->with('sizes', $sizes)
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
        
        foreach($images as $image) {
            unlink(storage_path('\app\public\\' . $image->image_path));
        }

        Product::destroy($id);

        $products = Product::query()->get();
        
        return view('admin.index')
            ->with('products', $products);
    }
}
