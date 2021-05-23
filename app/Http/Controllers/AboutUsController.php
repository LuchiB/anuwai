<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AboutUsController extends Controller
{
    public function index(){
        $vendors = Role::where('name', 'Vendor')->first()->users()->get();
        return view('about',compact('vendors'));
    }
}
