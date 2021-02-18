<?php

namespace Database\Factories;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use App\User;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'review' => $faker->paragraph,
        'rating' => $faker->numberBetween(0, 5),
        'user_id' => function() {
            return User::all()->random();
        },
    ];
});












// use App\Models\review;
// use Illuminate\Database\Eloquent\Factories\Factory;

// class ReviewFactory extends Factory
// {
//     /**
//      * The name of the factory's corresponding model.
//      *
//      * @var string
//      */
//     protected $model = review::class;

//     /**
//      * Define the model's default state.
//      *
//      * @return array
//      */
//     public function definition()
//     {
//         return [
//             //
//         ];
//     }
// }
