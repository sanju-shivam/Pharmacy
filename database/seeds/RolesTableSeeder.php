<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'supplier']);
        Role::create(['name' => 'staff']);
        Role::create(['name' => 'sales']);
        Role::create(['name' => 'leads']);
        Role::create(['name' => 'pages']);
        Role::create(['name' => 'users']);
        Role::create(['name' => 'product']);
        Role::create(['name' => 'categories']);
        Role::create(['name' => 'team']);
    }
}
