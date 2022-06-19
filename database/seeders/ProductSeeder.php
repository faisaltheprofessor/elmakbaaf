<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,10) as $value){
            DB::table('products')->insert([
                'design'=>$faker->word(),
                'lenght'=>$faker->latitude(),
                'width'=>$faker->latitude(),
                'color'=>$faker->colorName(),
                'price'=>$faker->latitude(),
                'img'=>$faker->image(),
                'status'=>$faker->numberBetween(0, 1),
                'user_id'=> $faker->numberBetween(1, 4),
                'catagory_id'=> $faker->numberBetween(1, 4),
          ]);
        }
    }
}
