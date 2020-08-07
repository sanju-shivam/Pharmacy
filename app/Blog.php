<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{
    //Table Names
    protected $table = 'blogs';

    // Primary Key
    //$primaryKey = 'slug';
    public function key(){
        return 'slug';
    } 

    // Timestamp
    public $timestamps =  true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
