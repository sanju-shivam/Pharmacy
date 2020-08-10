<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lead_status extends Model
{
	protected $table = 'lead_status';
    protected $fillable = ['lead_id','status_id','brand_id'];
}
