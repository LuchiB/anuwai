<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Product;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::with('users')->paginate(5);
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('shop', compact('products','vendors'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $mightLike = Product::where('slug', '!=', $product->slug)->mightLike()->get();
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('product', compact('product', 'mightLike','vendors'));
    }
}
