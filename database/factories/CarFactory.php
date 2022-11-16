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
            //add summary json json_encode data
            'summary' => json_encode([
                'make' => $this->faker->name,
                'model' => $this->faker->name,
                'year' => $this->faker->year,
                'price' => $this->faker->randomNumber(5),
                'engine' => $this->faker->name,
                'transmission' => $this->faker->name,
                'drive' => $this->faker->name,
                'body_style' => $this->faker->name,
                'fuel_economy' => $this->faker->name,
                'horsepower' => $this->faker->randomNumber(3),
                'torque' => $this->faker->randomNumber(3),
                'zero_to_sixty' => $this->faker->randomNumber(2),
                'top_speed' => $this->faker->randomNumber(3),
                'weight' => $this->faker->randomNumber(4),
                'length' => $this->faker->randomNumber(4),
                'width' => $this->faker->randomNumber(4),
                'height' => $this->faker->randomNumber(4),
                'wheelbase' => $this->faker->randomNumber(4),
                'ground_clearance' => $this->faker->randomNumber(4),
                'cargo_volume' => $this->faker->randomNumber(4),
                'fuel_tank' => $this->faker->randomNumber(4),
                'seating' => $this->faker->randomNumber(2),
                'standard_features' => $this->faker->name,
                'optional_features' => $this->faker->name,
                'warranty' => $this->faker->name,
            ]),

            //add car DNA json json_encode data
            'dna' => json_encode([
                'make' => $this->faker->name,
                'model' => $this->faker->name,
                'year' => $this->faker->year,
                'price' => $this->faker->randomNumber(5),
                'engine' => $this->faker->name,
                'transmission' => $this->faker->name,
                'drive' => $this->faker->name,
                'body_style' => $this->faker->name,
                'fuel_economy' => $this->faker->name,
                'horsepower' => $this->faker->randomNumber(3),
                'torque' => $this->faker->randomNumber(3),
                'zero_to_sixty' => $this->faker->randomNumber(2),
                'top_speed' => $this->faker->randomNumber(3),
                'weight' => $this->faker->randomNumber(4),
                'length' => $this->faker->randomNumber(4),
                'width' => $this->faker->randomNumber(4),
                'height' => $this->faker->randomNumber(4),
                'wheelbase' => $this->faker->randomNumber(4),
                'ground_clearance' => $this->faker->randomNumber(4),
                'cargo_volume' => $this->faker->randomNumber(4),
                'fuel_tank' => $this->faker->randomNumber(4),
                'seating' => $this->faker->randomNumber(2),
                'standard_features' => $this->faker->name,
                'optional_features' => $this->faker->name,
                'warranty' => $this->faker->name,
            ]),

            //add exterior json json_encode data
            'exterior' => json_encode([
                'make' => $this->faker->name,
                'model' => $this->faker->name,
                'year' => $this->faker->year,
                'price' => $this->faker->randomNumber(5),
                'engine' => $this->faker->name,
                'transmission' => $this->faker->name,
                'drive' => $this->faker->name,
                'body_style' => $this->faker->name,
                'fuel_economy' => $this->faker->name,
                'horsepower' => $this->faker->randomNumber(3),
                'torque' => $this->faker->randomNumber(3),
                'zero_to_sixty' => $this->faker->randomNumber(2),
                'top_speed' => $this->faker->randomNumber(3),
                'weight' => $this->faker->randomNumber(4),
                'length' => $this->faker->randomNumber(4),
                'width' => $this->faker->randomNumber(4),
                'height' => $this->faker->randomNumber(4),
                'wheelbase' => $this->faker->randomNumber(4),
                'ground_clearance' => $this->faker->randomNumber(4),
                'cargo_volume' => $this->faker->randomNumber(4),
                'fuel_tank' => $this->faker->randomNumber(4),
                'seating' => $this->faker->randomNumber(2),
                'standard_features' => $this->faker->name,
                'optional_features' => $this->faker->name,
                'warranty' => $this->faker->name,
            ]),
        ];
    }
}
