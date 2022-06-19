<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SuplierCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1, 10) as $value){
            DB::table('scountries')->insert([
             'country_name'=> $faker->country(),
             'user_id'=> $faker->numberBetween(1, 4),
       ]);
   }
    }
}
