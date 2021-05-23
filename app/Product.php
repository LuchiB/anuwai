<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'featured'
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
   
    
    public function scopeMightLike($query, int $num = 4)
    {
        return $query->inRandomOrder()->take($num);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function getPresentPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }

    public function path()
    {
        return route('shop.show', $this->slug);
    }

    public static function featuredProducts(int $take = 6)
    {
        return static::inRandomOrder()
            ->featured()
            ->take($take)
            ->get();
    }

    public function users(){

        return $this->belongsToMany(User::class);
    }


    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
