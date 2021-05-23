<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Order;
class OrderController extends Controller
{
    public function home(){

        // $orders = Order::where('buyer_id',\Auth::user()->id)->get();
        $orders = Order::where([['seller_id','=',\Auth::user()->id],['status','=','0']])->with('products')->get();
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('seller.order.index',compact('orders','vendors'));
    }

}
