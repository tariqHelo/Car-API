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
                'make' => $this->faker->name,
                'model' => $this->faker->name,
                'year' => $this->faker->year,
                'price' => $this->faker->randomNumber(5),
                'engine' => $this->faker->name,
                'transmission' => $this->faker->name,
                'drive' => $this->faker->name,
                'body_style' => $this->faker->name,
                'fuel_economy' => $this->faker->name,
                'ground_clearance' => $this->faker->randomNumber(4),
                'cargo_volume' => $this->faker->randomNumber(4),
                'fuel_tank' => $this->faker->randomNumber(4),
                'seating' => $this->faker->randomNumber(2),
                'standard_features' => $this->faker->name,
                'optional_features' => $this->faker->name,
                'warranty' => $this->faker->name,
                //add type to summary
                'type' => [
                    'make' => $this->faker->name,
                    'model' => $this->faker->name,
                    'year' => $this->faker->year
                ],
                'wheels' => [
                    'front' => $this->faker->name,
                    'rear' => $this->faker->name,
                ],
            ]),
        ];
    }
}
