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
        //add fake link car from unsplash 
        $lamborghini =[
            'https://images.unsplash.com/photo-1519245659620-e859806a8d3b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bGFtYm9yZ2hpbml8ZW58MHx8MHx8&auto=format&fit=crop&w=800&q=60',
            'https://images.unsplash.com/photo-1580414057403-c5f451f30e1c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8bGFtYm9yZ2hpbml8ZW58MHx8MHx8&auto=format&fit=crop&w=800&q=60',
            'https://images.unsplash.com/photo-1544829099-b9a0c07fad1a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8bGFtYm9yZ2hpbml8ZW58MHx8MHx8&auto=format&fit=crop&w=800&q=60',
            'https://images.unsplash.com/photo-1593219535889-7873a100874a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8bGFtYm9yZ2hpbml8ZW58MHx8MHx8&auto=format&fit=crop&w=800&q=60',
            'https://images.unsplash.com/photo-1532581140115-3e355d1ed1de?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8bGFtYm9yZ2hpbml8ZW58MHx8MHx8&auto=format&fit=crop&w=800&q=60',
        ];
        $BMW =[
          'https://images.unsplash.com/photo-1607853554439-0069ec0f29b6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8Ym13fGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60',
          'https://images.unsplash.com/photo-1556189250-72ba954cfc2b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8Ym13fGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60',
          'https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8Ym13fGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60',
          'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8Ym13fGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=800&q=60',
          'https://images.unsplash.com/photo-1617531653332-bd46c24f2068?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTR8fGJtd3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60',
          'https://images.unsplash.com/photo-1580273916550-e323be2ae537?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTJ8fGJtd3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60',
        ];

        $AUDI = [
            'https://images.unsplash.com/photo-1503507420689-7b961cc77da5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YXVkaXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60',
            'https://images.unsplash.com/photo-1541348263662-e068662d82af?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8YXVkaXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60',
            'https://images.unsplash.com/photo-1555652736-e92021d28a10?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8YXVkaXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60',
            'https://images.unsplash.com/photo-1517524008697-84bbe3c3fd98?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8YXVkaXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60',
            'https://images.unsplash.com/photo-1540066019607-e5f69323a8dc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8YXVkaXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60',
            'https://images.unsplash.com/photo-1589536672709-a5d34b12466d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8YXVkaXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60'
        ];

        $porsche =[
            'https://images.unsplash.com/photo-1580274455191-1c62238fa333?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cG9yc2NoZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60',
            'https://images.unsplash.com/photo-1584060622420-0673aad46076?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cG9yc2NoZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60',
            'https://images.unsplash.com/photo-1611651338412-8403fa6e3599?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8cG9yc2NoZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60',
            'https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8cG9yc2NoZXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60',
            'https://images.unsplash.com/photo-1614162692292-7ac56d7f7f1e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fHBvcnNjaGV8ZW58MHx8MHx8&auto=format&fit=crop&w=800&q=60',
            'https://images.unsplash.com/photo-1632245889029-e406faaa34cd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTN8fHBvcnNjaGV8ZW58MHx8MHx8&auto=format&fit=crop&w=800&q=60'
        ];

        $ferrari =[
         'https://images.unsplash.com/photo-1592198084033-aade902d1aae?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8ZmVycmFyaXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60',
         'https://images.unsplash.com/photo-1617654112368-307921291f42?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8ZmVycmFyaXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60',
         'https://images.unsplash.com/photo-1583121274602-3e2820c69888?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8ZmVycmFyaXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60',
         'https://images.unsplash.com/photo-1614200187524-dc4b892acf16?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8ZmVycmFyaXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60',
         'https://images.unsplash.com/photo-1597687210367-a4915552d886?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8ZmVycmFyaXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=800&q=60'
        ];



  
        return [
            'car_id' => 5,
            //random bwm or audi or lamborghini for image field
            //car 1 =>  BWm
            //car 2 =>  Lamborghini
            //car 3 =>  Audi
            //car 4 =>  Porsche
            //car 5 =>  Ferrari
            'image' => $this->faker->unique()->randomElement($ferrari),
        ];
    }
}
