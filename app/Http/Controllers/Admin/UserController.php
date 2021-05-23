<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Address;
use Image;
use Hash;

class UserController extends Controller
{
    
    public function edituser($id){
        $user = User::where('id',$id)->first();
        $address = Address::where('user_id',$user->id)->first();
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('admin.users.edit',compact('user','address','vendors'));
    }

    public function resetuserpass($id){
        $user = User::where('id',$id)->first();
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('admin.users.password',compact('user','vendors'));
    }



    //POST FUNCTION TO UPDATE USER DETAILS
    public function updateuser(Request $request,$id)
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
    'status'=>'required'
    ]);


    //find user
    $user = User::find($id);

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
    $user->status = $request->status;
    $user->image = $profileImage;

    }else{

    $user->name = $request->name;
    $user->status = $request->status;
    $user->email = $request->email;
    }
    

    $user->save();

    $address = Address::where('user_id',$id)->first();

    if($address){
        $address->phone = $request->phone;
        $address->country = $request->country;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->zip = $request->zip;
        $address->save();

    }
        $address = new Address();

        $address->phone = $request->phone;
        $address->country = $request->country;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->zip = $request->zip;
        $address->user_id = $user->id;
        $address->save();
    
   
    

    //REDIRECT USER BACK WITH SUCCESS MESSAGE
    return redirect()->back()->with('success','User updated successfully');
    

    //REDIRECT USER BACK WITH ERROR MESSAGE
    return redirect()->back()->with('error','An Error please try again');

}


public function updatepassword(Request $request,$id){
    
    //VALIDATE FIELDS
    $this->validate($request, [
        'password' => 'required|confirmed',
    
        ]);
    
        $user = User::find($id);
        $user->password = Hash::make($request->password);
    
        if( $user->save()){
        //REDIRECT USER BACK WITH SUCCESS MESSAGE
        return redirect()->back()->with('success','User password updated successfully');
        }
        //REDIRECT USER BACK WITH SUCCESS MESSAGE
        return redirect()->back()->with('success','Error Please tr again');
}


public function destroy($id){

    $user = User::where('id',$id)->first();

    // CHECK IF USER IS A SUPER ADMIN AND REDIRECT WITH ERROR
    if($user->hasrole('Admin')){
    return redirect()->back()->with('error','Super Admin Cannot Be Deleted');
    }
    // REMOVE USE ROLE WITH THE CACHE
    $user->roles()->detach();
    $user->forgetCachedPermissions();
    // DELETE USER AND REDIRECT BACK
    $user->delete();
    return redirect()->back()->with('success','User deleted successfully');
}
 
}
