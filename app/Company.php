<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    // public function banner(){
    //     return $this->belongsTo('App\User', 'user_id');
    // }

    // User relation
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
