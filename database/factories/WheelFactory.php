<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wheel>
 */
class WheelFactory extends Factory
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
                'name' => $this->faker->name,
                //add type to summary
                'Front_Left' => [
                    'Manufacturer' => $this->faker->name,
                    'Model' => $this->faker->name,
                    'Year' => $this->faker->year,
                    'Size' => $this->faker->name,
                    'Bolt_Pattern' => $this->faker->name,
                ],
                'Front_Right' => [
                    'Manufacturer' => $this->faker->name,
                    'Model' => $this->faker->name,
                    'Year' => $this->faker->year,
                    'Size' => $this->faker->name,
                    'Bolt_Pattern' => $this->faker->name,
                ],
                'Rear_Left' => [
                    'Manufacturer' => $this->faker->name,
                    'Model' => $this->faker->name,
                    'Year' => $this->faker->year,
                    'Size' => $this->faker->name,
                    'Bolt_Pattern' => $this->faker->name,
                ],
                'Rear_Right' => [
                    'Manufacturer' => $this->faker->name,
                    'Model' => $this->faker->name,
                    'Year' => $this->faker->year,
                    'Size' => $this->faker->name,
                    'Bolt_Pattern' => $this->faker->name,
                ],
            ]),
        ];
    }
}
