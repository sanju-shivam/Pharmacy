<?php

use Illuminate\Database\Seeder;
use App\State;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::insert([
            ['name' => 'Andhra Pradesh',
             'slug' => 'andhra-pradesh'
            ],
            ['name' => 'Arunachal Pradesh',
             'slug' => 'arunachal-pradesh'
            ],
            ['name' => 'Assam',
             'slug' => 'assam'
            ],
            ['name' => 'Bihar',
             'slug' => 'bihar'
            ],
            ['name' => 'Chhatisgarh',
             'slug' => 'chatisgarh'
            ],
            ['name' => 'Delhi',
             'slug' => 'delhi'
            ],
            ['name' => 'Goa',
             'slug' => 'goa'
            ],
            ['name' => 'Gujrat',
             'slug' => 'gujrat'
            ],
            ['name' => 'Haryana',
             'slug' => 'haryana'
            ],
            ['name' => 'Himachal Pradesh',
             'slug' => 'himachal-pradesh'
            ],
            ['name' => 'Jammu And Kashmir',
             'slug' => 'jammu-and-kashmir'
            ],
            ['name' => 'Jharkhand',
             'slug' => 'jharkhand'
            ],
            ['name' => 'Karnataka',
             'slug' => 'karnataka'
            ],
            ['name' => 'Kerla',
             'slug' => 'kerla'
            ],
            ['name' => 'Madhya Pradesh',
             'slug' => 'madhya-pradesh'
            ],
            ['name' => 'Maharashtra',
             'slug' => 'maharashtra'
            ],
            ['name' => 'Manipur',
             'slug' => 'manipur'
            ],
            
            ['name' => 'Meghalaya',
             'slug' => 'meghalaya'
            ],
            
            ['name' => 'Mizoram',
             'slug' => 'mizoram'
            ],
            
            ['name' => 'Nagaland',
             'slug' => 'nagaland'
            ],
            
            ['name' => 'Orissa',
             'slug' => 'orissa'
            ],
            
            ['name' => 'Punjab',
             'slug' => 'punjab'
            ],
            
            ['name' => 'Rajasthan',
             'slug' => 'rajasthan'
            ],
            
            ['name' => 'Sikkim',
             'slug' => 'sikkim'
            ],
            
            ['name' => 'Tamilnadu',
             'slug' => 'tamilnadu'
            ],
            
            ['name' => 'Telangna',
             'slug' => 'telangna'
            ],
            
            ['name' => 'Tripura',
             'slug' => 'tripura'
            ],
            
            ['name' => 'Uttaranchal',
             'slug' => 'uttaranchal'
            ],
            
            ['name' => 'Uttar Pradesh',
             'slug' => 'Uttar-pradesh'
            ],
            
            ['name' => 'West Bengal',
             'slug' => 'west-bengal'
            ],
        ]);

    }
}
