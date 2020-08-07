<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('edit-users', function($user){
            return $user->hasRole('admin');
        });

        Gate::define('delete-users', function($user){
            return $user->hasRole('admin');
        });

        // Gate for blog restriction
        Gate::define('blogs', function($user){
            return $user->hasAnyRoles(['admin', 'staff']);
        });

        //Gate for team members management
        Gate::define('team', function($user){
            return $user->hasAnyRoles(['admin', 'team']);
        });

        //Gate for suppliers management
        Gate::define('user', function($user){
            return $user->hasAnyRoles(['admin', 'user']);
        });

        //Gate for sales management
        Gate::define('sales', function($user){
            return $user->hasAnyRoles(['admin', 'sales']);
        });

        //Gate for categories management
        Gate::define('categories', function($user){
            return $user->hasAnyRoles(['admin', 'categories']);
        });


        //Gate for products management
        Gate::define('products', function($user){
            return $user->hasAnyRoles(['admin', 'product']);
        });

        // Admin staff users
        Gate::define('staff', function($user){
            return $user->hasAnyRoles(['admin', 'staff']);
        });

        // Universal Restriction
        Gate::define('access-control', function($user){
            return $user->hasAnyRoles(['admin', 'staff', 'sales', 'pages', 'user', 'product', 'categories', 'team', 'lead']);
        });

        // Supplier dashbord link
        Gate::define('supplier', function($user){
            return $user->hasRole('supplier');
        });

    }
}
