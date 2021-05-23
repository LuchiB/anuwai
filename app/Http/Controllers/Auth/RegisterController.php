<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Address;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    public function redirectTo()
    {
       
        if(\Auth::user()->hasRole(['Admin'])){

        return 'admin/home';

        }

        if(\Auth::user()->hasRole(['Vendor'])){

        return 'vendor/home';

        }
        if(\Auth::user()->hasRole(['Buyer'])){

        return 'user/home';
        }
    }


    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'role' => ['required', 'string'],
            'zip' => ['required'],
            'state' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if($data['role'] == 'Buyer'){
        //CHECK FOR USER ROLE
        $role = Role::findByName('Buyer');
        //ASSIGN ROLE TO USER
        $user->assignRole([$role->id]);
        }else{
        //CHECK FOR USER ROLE
        $role = Role::findByName('Vendor');
        //ASSIGN ROLE TO USER
        $user->assignRole([$role->id]);
        }

        $address = new Address();
        $address->country = $data['country'];
        $address->state = $data['state'];
        $address->city = $data['city'];
        $address->zip = $data['zip'];
        $address->phone = $data['phone'];
        $address->user_id = $user->id;

        $address->save();

        return $user;
      
    }
}
