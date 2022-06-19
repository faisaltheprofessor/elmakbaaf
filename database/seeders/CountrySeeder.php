<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;



class CountrySeeder extends Seeder
{
    public function run()
    {
        //creating object for Faker
         $faker = Faker::create();
            foreach(range(1, 10) as $value){
                DB::table('countries')->insert([
                 'country_name'=> $faker->country(),
                 'user_id'=> $faker->numberBetween(1, 4),
           ]);
       }
    }
    

   
}
