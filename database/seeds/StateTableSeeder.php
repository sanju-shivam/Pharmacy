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
    	$states = ['andrapradesh','arunachalpradesh','assam','bihar','chhattisgarh','chandigarh','delhi','goa','gujarat','haryana','himachalpradesh','jammuandkashmir','jharkhand','karnataka','kerala','madhyapradesh','maharashtra','manipur','meghalaya','mizoram','magaland','orissa','punjab','rajasthan','sikkim','tamilnadu','telagana','tripura','uttaranchal','uttarpradesh','westbengal'];
    	$states_slug = ['andra-pradesh','arunachal-pradesh','assam','bihar','chhattisgarh','chandigarh','delhi','goa','gujarat','haryana','himachal-pradesh','jammu-and-kashmir','jharkhand','karnataka','kerala','madhya-pradesh','maharashtra','manipur','meghalaya','mizoram','magaland','orissa','punjab','rajasthan','sikkim','tamilnadu','telagana','tripura','uttaranchal','uttar-pradesh','west-bengal'];
        for ($i = 0; $i < count($states); $i++) {
            State::create([
                'name' => $states[$i],
                'slug' => $states_slug[$i],
            ]);


        }
    }
}
