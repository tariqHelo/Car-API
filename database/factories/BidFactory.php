<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bid>
 */
class BidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'car_id' => $this->faker->numberBetween(1, 10),
            'bid' => $this->faker->numberBetween(1000, 100000),
            // 'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}
