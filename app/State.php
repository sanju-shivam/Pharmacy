<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name','slug'];
    protected $table = 'states';



    public function product()
    {
        return $this->belongsToMany('App\Product');
    }
}
