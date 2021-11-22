<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function show()
    {
        $products=Product::paginate(9);
        return view('products.index', ['products'=>$products]);
    }
}
