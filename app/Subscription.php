<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BookSubcription;
class Subscription extends Model
{
    protected $fillable=[
    	'name', 'price', 'desc1','desc2','desc3','desc4','desc5'
    ];


    public function booked_or_not($userid, $subcription_id)
    {
    	
    	$booked = BookSubcription::where('subcription_id','=',$subcription_id)->where('user_id','=',$userid)->first();
    	return ($booked);
    }
}
