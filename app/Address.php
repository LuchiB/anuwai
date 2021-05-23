<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{ 
    protected $fillable =['user_id','city','country','state','phone','zip'];

    protected $table = 'address';
    
    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }


}
