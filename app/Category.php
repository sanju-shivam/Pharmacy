<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name',
        'slug',
    ];

    // public function user(){
    //     return $this->belogsToMany(User::class);
    // }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
