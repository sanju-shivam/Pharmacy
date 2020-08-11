<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    protected $fillable = [
        'name',
        'slug',
    ];

    //Table Names
    protected $table = 'brands';

    // public function users(){
    //     return $this->belongsToMany(User::class);
    // }

    // public function products(){
    //     return $this->belongsToMany(Product::class);
    // }
}
