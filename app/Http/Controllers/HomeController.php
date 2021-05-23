<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *  
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
        return view('index');
    }
    public function home(){
        
        $products = Product::with('users')->paginate(5);
        $categories = Category::get();

         //Get users with vendor role
    $vendors = Role::where('name', 'Vendor')->first()->users()->get();
   
        return view('home', compact('products','vendors'));
    }

    public function artist($id){
        $user = User::where('id',$id)->first();
               //Get users with vendor role
    $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('artist',compact('user','vendors'));
    }
}
