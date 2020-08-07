<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //Table Names
    protected $table = 'banners';

    // User relation
    public function user(){
        return $this->belongsTo(User::class);
    }
}
