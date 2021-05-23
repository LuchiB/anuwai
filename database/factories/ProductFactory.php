<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $title = $faker->sentence();

    return [
        
        'name'=>$title,
        'slug'=>Str::slug($title),
        'price' => rand(149999, 249999),
        'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
        'details'=>'15inch 1 TB SSD, 32GB RAM',
        'category_id'=>function(){ 
            return Category::all()->random();
        }
        
    ];
  
    

});
