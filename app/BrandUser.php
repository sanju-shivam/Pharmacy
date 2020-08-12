<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandUser extends Model
{
    protected $table = 'brand_user';

    protected $fillable=['user_id','brand_id'];
}
