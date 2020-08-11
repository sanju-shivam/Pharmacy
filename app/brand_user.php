<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand_user extends Model
{
    protected $table = 'brand_user';

    protected $fillable=['user_id','brand_id'];
}
