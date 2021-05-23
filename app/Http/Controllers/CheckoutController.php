<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Cart;
use App\Address;

class CheckoutController extends Controller
{
    
    public function index()
    {

        
        // CHECK IF USER IS LOGGED IN
    if (!Auth::check()) {

        return redirect()->route('login')->with('error','Please login or create account to continue.');
    
        } 
    
        if (Cart::instance('default')->count() == 0) {
            $vendors = Role::where('name', 'Vendor')->first()->users()->get();
            return redirect()->route('shop.index','vendors');
        }
    
        $address = Address::where('id',\Auth::user()->id)->first();
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('checkout',compact('address','vendors'));
    }

    
}
