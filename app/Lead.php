<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'phone',
        'requirement',
    ];

    protected $table = 'leads';

    // Primary Key
    public $primaryKey = 'id';

    // public function statuses()
    // {
    //     return $this->belongsToMany('App\Status');
    // }
}
