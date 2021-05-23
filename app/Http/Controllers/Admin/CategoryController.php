<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\Product;
class CategoryController extends Controller
{
    

public function index(){

    $categories = Category::all();
    $vendors = Role::where('name', 'Vendor')->first()->users()->get();
    return view('admin.category.index',compact('categories','vendors'));
}

    public function create(){
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('admin.category.create',compact('vendors'));
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required'
        ]);

        $category = new Category();

        $category->name = $request->name;
        $category->slug = Str::slug($request['name'], '-');

        if($category->save()){
          
            return back()->with('success',"Category created successfully");
        }else{
            return back()->with('error','An error occurred, please tr again');
        }    
    }

    public function edit(Category $category){
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('admin.category.edit',compact('category','vendors'));
    }

    public function update(Request $request, $category){

        $request->validate([
            'name'=>'required'
        ]);

        $category = Category::find($category);

        $category->name = $request->name;
        $category->slug = Str::slug($request['name'], '-');

        if($category->save()){
          
            return back()->with('success',"Category updated successfully");
        }else{
            return back()->with('error','An error occurred, please tr again');
        }
    }


    public function destroy($id){

        $category = Category::find($id);
        
        $product = Product::where('category_id',$category->id)->first();

        if($product != null){

            return back()->with('error','Category is associated to a product');
        }

        $category->delete();

        return back()->with('success','Category deleted');

    }
}


