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
        return [
            'name' => $this->faker->name,
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
