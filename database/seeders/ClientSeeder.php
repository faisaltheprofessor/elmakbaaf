<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{
    
    public function run()
    {
    
        $faker = Faker::create();
        foreach(range(1, 10) as $value){
            DB::table('clients')->insert([
                'first_name'=>$faker->name(),
                'last_name'=>$faker->lastName(),
                'company_name'=>$faker->company(),
                'joining_date'=>$faker->date(),
                'contact_num'=>$faker->phoneNumber(),
                'email'=>$faker->email(),          
                'country_id'=> $faker->numberBetween(1, 10),
                'city_id'=> $faker->numberBetween(1, 10),
                'street_id'=> $faker->numberBetween(1, 10),
                'zip'=>$faker->postcode(),
                'user_id'=> $faker->numberBetween(1, 4),
          ]);
        }    
    }
}
