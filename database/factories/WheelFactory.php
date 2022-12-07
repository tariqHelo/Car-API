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
                // ['name' => $this->faker->name],
                //add type to summary
                'Front_Left' => $this->faker->name,
                'Front_Right' => $this->faker->name,
                'Rear_Left' => $this->faker->name,
                'Rear_Right' => $this->faker->name,
                'Spare' => $this->faker->name,
            ]),
        ];
    }
}
