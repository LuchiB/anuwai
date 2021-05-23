<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\User;
use App\Address;
use App\Category;
use App\Product_User;
use Hash;
class VendorController extends Controller
{
    
    public function home(){
        $user = User::find(\Auth::user()->id);
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('seller.home',compact('user','vendors'));
    }


    public function create(){
        $categories = Category::all();
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('seller.product.create',compact('categories','vendors'));
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
    return view('seller.product.edit',compact('categories','product','vendors'));
  
}

// POST FUNCTION TO UPDATE PRODUCT
public function update(Request $request,$id)
{
    $request->validate([
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'name' => 'required|max:255|unique:products',
        'price' => 'required|numeric',
        'category' => 'required',
        'description' => 'required|max:255',
    ]);


    $product= Product::find($id);


    if($request->image != null){
        
        $file = public_path("/app/images/arts/$product->image");
        unlink($file);

    $imageName = time().'.'.$request->image->extension();  

    $request->image->move(public_path('/app/images/arts/'), $imageName);

    $product->slug = Str::slug($request['name'], '-');
    $product->name = request('name');
    $product->price = request('price');
    $product->description = request('description');
    $product->category_id = request('category');
    $product->image = $imageName;

    }else{

        $product->slug = Str::slug($request['name'], '-');
        $product->name = request('name');
        $product->price = request('price');
        $product->description = request('description');
        $product->category_id = request('category');
        // $product->image = $imageName;
    }


    if($product->save()){

    return redirect()->back()->with( 'success','Product was updated successfully :)');
    }else{

    return redirect()->back()->with( 'error', 'Error! Please Try Again');
    }
}

public function profile(){

    $vendors = Role::where('name', 'Vendor')->first()->users()->get();
    return view('seller.profile','vendors');
}


public function setting(){
    $user = User::where('id',\Auth::user()->id)->first();
    $address = Address::where('user_id',\Auth::user()->id)->first();
    $vendors = Role::where('name', 'Vendor')->first()->users()->get();
    return view('seller.setting',compact('user','address','vendors'));
}

public function password(){
    $vendors = Role::where('name', 'Vendor')->first()->users()->get();
    return view('seller.password',compact('vendors'));
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
        return redirect()->back()->with('success','Your password updated successfully');
        }
        //REDIRECT USER BACK WITH SUCCESS MESSAGE
        return redirect()->back()->with('success','Error Please tr again');
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
public function destroy($id){

    $product = Product::find($id);
    $product->delete();

    return back()->with('success','Product has been deleted');
}
    }

