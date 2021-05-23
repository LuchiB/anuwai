<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order_Product;
use App\Address;
use App\Order;
use Cart;

class OrderController extends Controller
{
   
    public function index()
    {
        //
    }

    
  
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',
            'zip'=>'required',
        ]);

        // dd($request);

        foreach(Cart::content() as $artOrder){
            $order =  new Order();
            $order->product_id = $artOrder->id;
            $order->buyer_id =  Auth::user()->id;
            // $order->buyer_id =  Auth::user()->id;
            $order->qty =  $artOrder->qty;
            $order->status = 0;
            //SAVE ORDER
          
            $product  = Product::find($order->product_id);
            foreach ($product->users as $user) {
            $order->seller_id =  $user->id;
            }

            $order->save();

            $order_product = new Order_Product();
            $order_product->product_id = $artOrder->id;
            $order_product->order_id = $order->id; 
            $order_product->save();

            }

          
            $address = Address::where('user_id',Auth::user()->id)->first();

            if($address == null){

                $address = new Address();

                $address->user_id = Auth::user()->id;
                $address->phone = $request->phone;
                $address->city = $request->city;
                $address->state = $request->state;
                $address->country = $request->country;
                $address->zip = $request->zip;
                $address->save();

            }
            

            // $address->user_id = Auth::user()->id;
            $address->phone = $request->phone;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->country = $request->country;
            $address->zip = $request->zip;
            $address->save();
            
               //CLEAR CART
            Cart::destroy();

            if(Auth::user()->hasRole(['Admin'])){

                return  redirect()->route('admin.home')->with('success','Your order has been recieved');
        
                }
        
                if(Auth::user()->hasRole(['Vendor'])){
        
                 return  redirect()->route('vendor.home')->with('success','Your order has been recieved');
        
                }
                if(Auth::user()->hasRole(['Buyer'])){
        
                    return  redirect()->route('buyer.home')->with('success','Your order has been recieved');
                }
    }

    
    public function show($id)
    {
        //
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
