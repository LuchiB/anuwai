<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    
    public function show(Product $product)
    {
        $mightLike = Product::where('slug', '!=', $product->slug)->mightLike()->get();

        return view('product', compact('product', 'mightLike'));
    }

}
