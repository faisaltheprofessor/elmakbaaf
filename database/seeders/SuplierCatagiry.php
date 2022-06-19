<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SuplierCatagiry extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,4) as $value){
            DB::table('scatagories')->insert([
                'catagory_name'=>$faker->word(),
                'user_id'=> $faker->numberBetween(1, 4),
          ]);
        }
    }
}
