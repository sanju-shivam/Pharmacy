<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function leads(){
        return $this->belongsToMany('App\Lead');
    }
}
