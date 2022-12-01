<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarImage>
 */
class CarImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'car_id' => $this->faker->numberBetween(1, 10),
            //add faker image and save it in p    
            'image' => $this->faker->imageUrl(640, 480, 'cars', true, 'Faker'),
        ];
    }
}
