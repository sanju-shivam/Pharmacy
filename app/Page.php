<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'keywords',
        'description',
        'body',
    ];

    //Table Names
    protected $table = 'pages';

    // Primary Key
    //$primaryKey = 'slug';
    public function key(){
        return 'slug';
    } 

    // Timestamp
    public $timestamps =  true;
    
}
