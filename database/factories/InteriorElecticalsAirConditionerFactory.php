<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InteriorElecticalsAirConditioner>
 */
class InteriorElecticalsAirConditionerFactory extends Factory
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
               'Dashboard_Condition' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Air_Conditioner' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Center_Console_Box' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Door_Trim_Panels' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Seat_Controls' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Central_Lock_Operation' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Navigation_Control' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Tail_Lights' => $this->faker->randomElement(['Good', 'Needs Attention']), 
                'Windows_Controls_Condition' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Push_Stop_Button' => $this->faker->randomElement(['Good', 'N/A']),
                'Convertible_Operations' => $this->faker->randomElement(['Good', 'N/A']), 
                
                'Steering_Mounted_Controls' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Speedometer_Cluster' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Head_Lining' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Boot_Trunk_Area' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Music_Multimedia_System' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Headlights' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Sunroof_Condition' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Cruise_Control' => $this->faker->randomElement(['Good', 'Needs Attention']), 
                'AC_Cooling' => $this->faker->randomElement(['Good', 'Needs Attention']),

                'Comments' => $this->faker->text,

            ]),
        ];
    }
}
