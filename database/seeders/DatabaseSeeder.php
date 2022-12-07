<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    //    \App\Models\User::factory(10)->create();
    //     \App\Models\EngineTransmission::factory(10)->create(); 
    //     \App\Models\InteriorElecticalsAirConditioner::factory(10)->create();
    //     \App\Models\SteeringSuspensionBrakes::factory(10)->create();
    //     \App\Models\CarSpace::factory(10)->create();
         \App\Models\Wheel::factory(10)->create();
    //     \App\Models\Car::factory(10)->create();
      //   \App\Models\CarImage::factory(5)->create();

       //  \App\Models\Bid::factory(10)->create();



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
