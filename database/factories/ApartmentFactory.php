<?php

namespace Database\Factories;

use App\Models\Apartment;
use App\Models\LandLord;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Apartment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' =>$this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'price' =>$this->faker->price,
            'landlord_id' =>function () {
                  return factory(LandLord::class)->create()->id
            }
            
        ];
            
    }
}


// $factory->define(Apartment::class, function (Faker $faker) {
//     return [
//         'name' => $faker->word,
//         'description' => $faker->paragraph,
//         'price' => $faker->numberBetween(1000, 20000),
//         'user_id' => function() {
//             return User::all()->random();
//      

