<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_User extends Model
{
    protected $fillable = ['user_id','product_id'];
    protected $table = "product_user";
}
