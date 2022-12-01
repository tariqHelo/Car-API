<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EngineTransmission>
 */
class EngineTransmissionFactory extends Factory
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
                'Radiator_Condition' => $this->faker->randomElement(['Good','No Visible Faults','Needs Attention']),
                'Engine_Noise' => $this->faker->randomElement(['Good', 'Tappet Noise']),
                'Engine_Belts' => $this->faker->randomElement(['Good', 'No Visible Fault']),
                'Engine_Idling' => $this->faker->randomElement(['Good', 'No Visible Fault']),
                'Engine_Oil' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Engine_Oil_Level' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Engine_Oil_Pressure' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Battery_Condition' => $this->faker->randomElement(['Good', 'Weak']),
                'Engine_Smoke' => $this->faker->randomElement(['Black', 'Needs Attention']),
                'Gear_Lever' => $this->faker->randomElement(['Good', 'Needs Attention']),
                '4WD_System_Condition' => $this->faker->randomElement(['Good', 'N/A']),
                'Radiator_Fan' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Coolant' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Coolant_Level' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Gear_Shifting' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Silencer' => $this->faker->randomElement(['Good', 'Needs Attention']),
                'Comments' => $this->faker->text,
            ]),
        ];
    }
}
