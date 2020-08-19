<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subscription;

class BookSubcription extends Model
{
    protected $fillable= [ 'subcription_id' , 'user_id' ] ;

    public function subscription_name($id)
    {
    	$name = Subscription::where('id','=',$id)->first()->name;
    	return($name);
    }
    public function subscription_price($id)
    {
    	$price = Subscription::where('id','=',$id)->first()->price;
    	return($price);
    }

}
