<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class StreetSeeder extends Seeder
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
            DB::table('streets')->insert([
            'street_name'=>$faker->streetName(),
             'city_id'=> $faker->numberBetween(1, 10),
             'user_id'=> $faker->numberBetween(1, 4),
          ]);
        }
    }
}
