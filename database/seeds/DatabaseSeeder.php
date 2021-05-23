<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Product;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(CategoriesSeeder::class);
        // $this->call(ProductSeeder::class); 
        factory(Category::class,5)->create();
        // factory(Product::class,10)->create();     
        $this->call(CouponSeeder::class);      
        $this->call(PermissionTableSeeder::class);      
        $this->call(AdminUserSeeder::class);      
        $this->call(CreateSellerSeeder::class);      
        $this->call(BuyerSeeder::class);      
    }
}
