<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::query();

        // parse brand filters
        if($request->get('brand')) {
            $products = $products->whereIn('brand_id', $request->get('brand'));
        }

        // parse category filters
        if($request->get('category')) {
            $products = $products->whereIn('category_id', $request->get('category'));
        }

        // parse color filters
        if($request->get('color')) {
            $products = $products->whereIn('color_id', $request->get('color'));
        }

        // parse price filters
        if($request->get('price_from')) {
            $products = $products->where('price', '>=', $request->get('price_from'));
        }

        if($request->get('price_to')) {
            $products = $products->where('price', '<=', $request->get('price_to'));
        }

        // parse sort
        if($request->get('sort')) {
            $sort_type = $request->get('sort');

            if($sort_type === 'asc') {
                $products = $products->orderBy('price', 'asc');
            }
            else if($sort_type === 'desc') {
                $products = $products->orderBy('price', 'desc');
            }
            else if($sort_type === 'alphabet') {
                $products = $products->orderBy('name', 'asc');
            }
        }

        $products = $products->orderBy('created_at', 'desc')->paginate(12);

        $brands = Brand::get();
        $colors = Color::get();
        $categories = Category::get();

        return view('products.index')
            ->with('products', $products)
            ->with('brands', $brands)
            ->with('colors', $colors)
            ->with('categories', $categories);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
}
