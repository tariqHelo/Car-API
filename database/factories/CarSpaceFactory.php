<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarSpace>
 */
class CarSpaceFactory extends Factory
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
                ['Fog_Lights' => $this->faker->boolean],
                ['Rear_Spoiler' => $this->faker->boolean],
                ['Roof_Rails' => $this->faker->boolean],
                ['Roof_Rack' => $this->faker->boolean],
                ['Sunroof' => $this->faker->boolean],
                ['TowBar' => $this->faker->boolean],
                ['Tinted_Windows' => $this->faker->boolean],
                ['Rear_Wiper' => $this->faker->boolean],
                ['Rear_Window_Defroster' => $this->faker->boolean],
                ['Rear_Window_Washer' => $this->faker->boolean],
                ['Rear_Window_Wiper' => $this->faker->boolean],
                ['Rear_Window_Wiper' => $this->faker->boolean],
                ['Spoiler' => $this->faker->boolean],
                ['Sunroof_Moonroof' => $this->faker->boolean],
                ['Tinted_Glass' => $this->faker->boolean],
                ['Tow_Package' => $this->faker->boolean],
                ['Tow_Hitch' => $this->faker->boolean],
                ['Tow_Hooks' => $this->faker->boolean],
                ['Tow_Package_Hitch' => $this->faker->boolean],
                ['Tow_Package_Hitch_Hooks' => $this->faker->boolean],
                ['Tow_Package_Hooks' => $this->faker->boolean],
                ['Tow_Package_Hitch_Tow_Hooks' => $this->faker->boolean],
                ['Premium_Sound_System' => $this->faker->boolean],
                ["Heads_Up_Display" => $this->faker->boolean],
                ["Aux_Audio_In" => $this->faker->boolean],
                ["Bluetooth_System" => $this->faker->boolean],
                ["Climate_Control "=> $this->faker->boolean],
                ["Climate_Control" => $this->faker->boolean],
                ["Keyless_Entry" => $this->faker->boolean],
                ["Keyless_Start" => $this->faker->boolean],
                ["Leather_Seats" => $this->faker->boolean],
                ["Racing_Seats" => $this->faker->boolean],
                ["Cooled_Seats" => $this->faker->boolean],
                ["HeatedSeats" => $this->faker->boolean], 
                ["Power_Seats" => $this->faker->boolean],
                ["Power_Locks" => $this->faker->boolean],
                ["Power_Mirrors" => $this->faker->boolean],
                ["Power_Windows" => $this->faker->boolean],
                ["Memory_Seats" => $this->faker->boolean],
                ["View_Camera" => $this->faker->boolean],
                ["Blind_Spot_Indicator" => $this->faker->boolean],
                ["Anti_Lock_Brakes_ABS" => $this->faker->boolean],
                ["Cruise_Control" => $this->faker->boolean],
                ["Adaptive_Cruise_Control" => $this->faker->boolean],
                ["Power_Steering" => $this->faker->boolean],
                ["Front_Airbags" => $this->faker->boolean],
                ["Side_Airbags" => $this->faker->boolean],
                ["Triptonic_Gears" => $this->faker->boolean],
                ["Night_Vision" => $this->faker->boolean],
                ["Carbon_Fiber_Interior" => $this->faker->boolean],
                ["Lane_Change_Assist" => $this->faker->boolean],
                ["Headlamp_Washer" => $this->faker->boolean],
                ["Ceramic_Brakes" => $this->faker->boolean],
                ["Lift_Kit" => $this->faker->boolean],
                ["Park_Assist" => $this->faker->boolean],
                ["Adaptive_Suspension" => $this->faker->boolean],
                ["Height_Control" => $this->faker->boolean],
                ["Navigation_System" => $this->faker->boolean],
                ["Drive" => $this->faker->randomElement(['4WD', 'AWD', 'FWD', 'RWD'])],
                ["Sunroof_Type" => $this->faker->randomElement(['Panoramic', 'Power', 'Tilt/Slide', 'Tilt/Slide, Power'])],
                ["N2O_System"=> $this->faker->boolean],
                ["Wheels_Type" => $this->faker->randomElement(['Alloys','steel'])],
                ["Side_Steps" => $this->faker->boolean],
                ["Convertible" => $this->faker->boolean],
                


            ]),
        ];
    }
}
