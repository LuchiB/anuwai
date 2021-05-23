<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use App\Address;
use Image;

class AdminController extends Controller
{
    
    public function home(){
        $users = User::paginate(10);
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('admin.home',compact('users','vendors'));

    }



    public function profile(){
        $user = User::where('id',\Auth::user()->id)->first();
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('admin.profile',compact('vendors'));
    }

    public function setting(){
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('admin.setting',compact('vendors'));
    }
}
