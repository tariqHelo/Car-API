<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SteeringSuspensionBrakes>
 */
class SteeringSuspensionBrakesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'data' => json_encode([
                ['Brake_Pads' => $this->faker->randomElement(['Good', 'Needs Attention'])],
                ['Parking_Brake_Operations' => $this->faker->randomElement(['Good', 'Needs Attention'])],
                ['Shock_Absorber_Operation' => $this->faker->randomElement(['Good', 'Needs Attention'])],
                ['Steering_Alignment' => $this->faker->randomElement(['Good', 'Needs Attention'])],
                ['Brake_Discs_Or_Lining' => $this->faker->randomElement(['Good', 'Needs Attention'])],
                ['Suspension' => $this->faker->randomElement(['Good', 'Needs Attention'])],
                ['Steering_Operation' => $this->faker->randomElement(['Good', 'Needs Attention'])],
                ['Wheel_Alignment' => $this->faker->randomElement(['Good', 'Needs Attention'])],
                // ['Comments' => $this->faker->text],
            ]),
        ];
    }
}
