<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CitySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1, 10) as $value){
            DB::table('cities')->insert([
             'city_name'=>$faker->city(),
             'country_id'=> $faker->numberBetween(1, 10),
             'user_id'=> $faker->numberBetween(1, 4),
       ]);
   }

        
    }
}
