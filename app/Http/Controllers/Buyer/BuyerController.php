<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Order;
use App\Address;
use App\Product;
use Image;
use Hash;
class BuyerController extends Controller
{
    
    public function home(){

        // $orders = Order::where('buyer_id',\Auth::user()->id)->get();
        $orders = Order::where([['buyer_id','=',\Auth::user()->id],['status','=','0']])->with('products')->get();
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('buyer.home',compact('orders','vendors'));
    }



    public function order(){
        $orders = Order::where('buyer_id',\Auth::user()->id)->with('products')->get();
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('buyer.orders',compact('orders','vendors'));
    }


    public function profile(){
        $user = User::where('id',\Auth::user()->id)->first();
        $address = Address::where('user_id',\Auth::user()->id)->first();
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('buyer.profile',compact('user','address','vendors'));
    }
    
    
    public function setting(){
        $user = User::where('id',\Auth::user()->id)->first();
        $address = Address::where('user_id',\Auth::user()->id)->first();
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('buyer.setting',compact('user','address','vendors'));
    }
      


    //POST FUNCTION TO UPDATE USER DETAILS
    public function updateprofile(Request $request)
{

    
    //VALIDATE INPUT FIELDS
    $this->validate($request, [
    'name' => 'sometimes|required',
    'email' => 'sometimes|required|email',
    'phone' => 'nullable',
    'city' => 'nullable',
    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    'state' => 'nullable',
    'country' => 'nullable',
    'zip' => 'nullable',
    // 'status'=>'required'
    ]);


    //find user
    $user = User::find(\Auth::user()->id);

    //CHECK IF USER IMAGE INOUT IS NOT NULL AND UPLOAD IMAGE
    if($request->image != null){

    $profileImage = Str::slug($request['name'], '-'). '.' . $request->image->getClientOriginalExtension();

    $destinationPath = public_path('/app/images/avatars/');

    $resizeImage = Image::make($request->image->getRealPath());

    $resizeImage->resize(150, 150, function($constraint){

    $constraint->aspectRatio();

    })->save($destinationPath . '/' . $profileImage);


    //UPDATE USER DETAILS
    $user->name = $request->name;
    $user->email = $request->email;
    // $user->status = \Auth::user()->status;
    $user->image = $profileImage;

    }else{

    $user->name = $request->name;
    // $user->status = $request->status;
    $user->email = $request->email;
    }
    

    if($user->save()){

    $address = Address::find($user->id);

    if($address != null){
        $address->phone = $request->phone;
        $address->country = $request->country;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->zip = $request->zip;
        $address->save();

    }else{
        $address = new Address();

        $address->phone = $request->phone;
        $address->country = $request->country;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->zip = $request->zip;
        $address->user_id = $user->id;
        $address->save();
    }
   
    

    //REDIRECT USER BACK WITH SUCCESS MESSAGE
    return redirect()->back()->with('success','User profile updated successfully');
    }

    //REDIRECT USER BACK WITH ERROR MESSAGE
    return redirect()->back()->with('error','An Error please try again');

}
    public function password(){
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('buyer.password',compact('vendors'));
    }

    public function updatepassword(Request $request){
    
        //VALIDATE FIELDS
        $this->validate($request, [
            'password' => 'required|confirmed',
        
            ]);
        
            $user = User::find(\Auth::user()->id);
            $user->password = Hash::make($request->password);
        
            if( $user->save()){
            //REDIRECT USER BACK WITH SUCCESS MESSAGE
            return redirect()->back()->with('success','User password updated successfully');
            }
            //REDIRECT USER BACK WITH SUCCESS MESSAGE
            return redirect()->back()->with('success','Error Please tr again');
    }
}
