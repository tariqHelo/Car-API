<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = ['BWM', 'AUDI' , 'MERCEDES', 'TOYOTA', 'HONDA', 'NISSAN', 'VOLKSWAGEN', 'FORD', 'ASTON MARTIN', 'BENT'];
        return [
            'name' => $this->faker->randomElement($name),
            'general_info' => json_encode([
                'year' => $this->faker->year,
                // 'auction_end' => $this->faker->dateTimeBetween('+1 days', '+2 days')->format('Y-m-d H:i:s'),
                //add Thousand Comma to Decimal Number for seller_price
                'seller_price' => number_format($this->faker->numberBetween(10000, 1000000), 0, '', ','), 
                'max_bid' => number_format($this->faker->numberBetween(10000, 1000000), 0, '', ','), 
                'min_bid' => number_format($this->faker->numberBetween(10000, 1000000), 0, '', ','), 
                'bid_count' => $this->faker->numberBetween(0, 100),
                'bid_end' => $this->faker->dateTimeBetween('+1 days', '+2 days')->format('Y-m-d H:i:s'),
                'auction_status' => $this->faker->randomElement(['live', 'expired']),
                'color' => $this->faker->colorName,
                'millage' => $this->faker->numberBetween(10000, 1000000) . 'km',
                'fuel' => $this->faker->randomElement(['Petrol', 'Diesel', 'Hybrid', 'Electric']),
                'transmission' => $this->faker->randomElement(['Automatic', 'Manual']),
                'body_type' => $this->faker->randomElement(['Sedan', 'Hatchback', 'SUV', 'MPV', 'Coupe', 'Convertible', 'Wagon', 'Van', 'Truck']),
            ]),
            'user_id' => $this->faker->numberBetween(1, 10),
            'engine_transmission_id' => $this->faker->numberBetween(1, 10),
            'interior_electicals_air_conditioner_id' => $this->faker->numberBetween(1, 10),
            'steering_suspension_brake_id' => $this->faker->numberBetween(1, 10),
            'car_space_id' => $this->faker->numberBetween(1, 10),
            'wheel_id' => $this->faker->numberBetween(1, 10),
            //select enum status pending, approved, rejected
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
