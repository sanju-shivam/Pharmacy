<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'slug', 'provide_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function hasAnyRoles($roles) 
    {
        if($this->roles()->whereIn('name', $roles)->first()){
            return true;
        }

        return false;
    }

    public function hasRole($role) 
    {
        if($this->roles()->where('name', $role)->first()){
            return true;
        }

        return false;
    }

    // User has many bloga
    public function blogs()
    {
        return $this->hasMany('App\Blog');
    }

    // User has many banners
    public function banners()
    {
        return $this->hasMany(Banner::class);
    }

    // User has many products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // User has many categories 
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    // User has many brand 
    public function brands()
    {
        return $this->hasMany(Brand::class);
    }
}
