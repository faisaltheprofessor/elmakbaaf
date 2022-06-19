<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            CountrySeeder::class,
            CitySeeder::class,
            StreetSeeder::class,
            ClientSeeder::class,
            CatagorySeeder::class,
            ProductSeeder::class,
            SuplierCountrySeeder::class,
            SuplierCitySeeder::class,
            SuplierStreetSeeder::class,
            SuplierCatagiry::class,
            SuplierSeeder::class
           

        ]);
    }
}
