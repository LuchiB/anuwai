<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Product_User;
use App\User;
use App\Category;
use App\Product;
class ProductController extends Controller
{
    
    public function index(){
        $user = User::find(\Auth::user()->id);
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('admin.product.index',compact('user','vendors'));
    }

    public function create(){
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        $categories = Category::all();
        return view('admin.product.create',compact('vendors','categories'));
    }


        // STORE PRODUCT
public function store(Request $request)
{
    // dd($request);
    $request->validate([
    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    'name' => 'required|max:255|unique:products',
    'price' => 'required|numeric',
    'category' => 'required',
    'description' => 'required|max:255',

    ]);

    $imageName = time().'.'.$request->image->extension();  

     $request->image->move(public_path('/app/images/arts/'), $imageName);

    $product= new Product();
    $product->slug = Str::slug($request['name'], '-');
    $product->name = request('name');
    $product->price = request('price');
    $product->description = request('description');
    $product->category_id = request('category');
    $product->image = $imageName;


    if($product->save()){

    $product_user = new Product_User();
    $product_user->user_id = \Auth::user()->id;
    $product_user->product_id = $product->id;

    $product_user->save();

    return redirect()->back()->with( 'success', $product->name.' was created successfully.');

    }else{

    return redirect()->back()->with( 'error', 'Error! Please Try Again');
    }

    
}

public function edit($product){
   
    $product = Product::find($product)->first();
    $categories = Category::all();
    $vendors = Role::where('name', 'Vendor')->first()->users()->get();
    return view('admin.product.edit',compact('categories','product','vendors'));
  
}

public function destroy($id){

    $product = Product::find($id);
    $product->delete();

    return back()->with('success','Product has been deleted');
}
}
