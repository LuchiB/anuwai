<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateSellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Jane Joy', 
        	'email' => 'seller@gmail.com',
        	// 'phone' => '08067405876',
        	'password' => bcrypt('seller')
        ]);
  
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign created permissions
       // by chaining
       $role = Role::create(['name' => 'Vendor'])->syncPermissions(['create-product','edit-product','edit-profile']);
       $user->assignRole([$role->id]);
    }
}
