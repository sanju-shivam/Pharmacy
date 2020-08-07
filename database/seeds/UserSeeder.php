<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = User::create([
            'name' => 'Nargesh Rana',
            'slug' => 'nargesh-rana',
            'email' => 'nargesh.rana.04@gmail.com',
            'phone' => '8587906587',
            'address' => ' 5090/ 1D Some address will be here 110057',
            'about' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat distinctio laborum recusandae, labore voluptatem quos veritatis ratione quod incidunt, illo, cumque veniam? Non, dolorem eius modi id facilis sed quasi, libero alias recusandae consequatur, sunt quibusdam sapiente eligendi nesciunt quo a atque totam sint impedit itaque. Tempore fuga consequatur incidunt.',
            'password' => Hash::make('123456789')
        ]);
    
        $supplier = User::create([
        'name' => 'Supplier User',
        'slug' => 'supplier-user',
        'email' => 'supplier@supplier.com',
        'phone' => '5874693254',
        'address' => ' 5090/ 1D Some address will be here 110057',
        'about' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat distinctio laborum recusandae, labore voluptatem quos veritatis ratione quod incidunt, illo, cumque veniam? Non, dolorem eius modi id facilis sed quasi, libero alias recusandae consequatur, sunt quibusdam sapiente eligendi nesciunt quo a atque totam sint impedit itaque. Tempore fuga consequatur incidunt.',
        'password' => Hash::make('123456789')
        ]);
        

        $staff = User::create([
            'name' => 'Staff User',
            'slug' => 'staff-user',
            'email' => 'staff@staff.com',
            'phone' => '5487965235',
            'address' => ' 5090/ 1D Some address will be here 110057',
            'about' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat distinctio laborum recusandae, labore voluptatem quos veritatis ratione quod incidunt, illo, cumque veniam? Non, dolorem eius modi id facilis sed quasi, libero alias recusandae consequatur, sunt quibusdam sapiente eligendi nesciunt quo a atque totam sint impedit itaque. Tempore fuga consequatur incidunt.',
            'password' => Hash::make('123456789')
        ]);

        $sales = User::create([
            'name' => 'Sales User',
            'slug' => 'sales',
            'email' => 'sales@sales.com',
            'phone' => '5489651254',
            'address' => ' 5090/ 1D Some address will be here 110057',
            'about' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat distinctio laborum recusandae, labore voluptatem quos veritatis ratione quod incidunt, illo, cumque veniam? Non, dolorem eius modi id facilis sed quasi, libero alias recusandae consequatur, sunt quibusdam sapiente eligendi nesciunt quo a atque totam sint impedit itaque. Tempore fuga consequatur incidunt.',
            'password' => Hash::make('123456789')
        ]);

        $user = User::create([
            'name' => 'Generic User',
            'slug' => 'user',
            'email' => 'user@user.com',
            'phone' => '5469853265',
            'address' => ' 5090/ 1D Some address will be here 110057',
            'about' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat distinctio laborum recusandae, labore voluptatem quos veritatis ratione quod incidunt, illo, cumque veniam? Non, dolorem eius modi id facilis sed quasi, libero alias recusandae consequatur, sunt quibusdam sapiente eligendi nesciunt quo a atque totam sint impedit itaque. Tempore fuga consequatur incidunt.',
            'password' => Hash::make('123456789')
        ]);

        $team = User::create([
            'name' => 'Team User',
            'slug' => 'team-manager',
            'email' => 'team@team.com',
            'phone' => '4125789653',
            'address' => ' 5090/ 1D Some address will be here 110057',
            'about' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat distinctio laborum recusandae, labore voluptatem quos veritatis ratione quod incidunt, illo, cumque veniam? Non, dolorem eius modi id facilis sed quasi, libero alias recusandae consequatur, sunt quibusdam sapiente eligendi nesciunt quo a atque totam sint impedit itaque. Tempore fuga consequatur incidunt.',
            'password' => Hash::make('123456789')
        ]);

        $lead = User::create([
            'name' => 'Lead User',
            'slug' => 'lead-manager',
            'email' => 'lead@lead.com',
            'phone' => '4521365897',
            'address' => ' 5090/ 1D Some address will be here 110057',
            'about' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat distinctio laborum recusandae, labore voluptatem quos veritatis ratione quod incidunt, illo, cumque veniam? Non, dolorem eius modi id facilis sed quasi, libero alias recusandae consequatur, sunt quibusdam sapiente eligendi nesciunt quo a atque totam sint impedit itaque. Tempore fuga consequatur incidunt.',
            'password' => Hash::make('123456789')
        ]);

        
        DB::table('role_user');

        // $adminRole = Role::where('name', 'admin')->first($columns);
        // $vendorRole = Role::where('name', 'vendor')->first($columns);
        // $staffRole = Role::where('name', 'staff')->first($columns);
        // $salesRole = Role::where('name', 'sales')->first($columns);
        // $userRole = Role::where('name', 'user')->first($columns);

        $admin->roles()->attach($admin);
        $supplier->roles()->attach($supplier);
        $staff->roles()->attach($staff);
        $sales->roles()->attach($sales);
        $user->roles()->attach($user);
        $lead->roles()->attach($lead);
        $team->roles()->attach($team);

    }
}

