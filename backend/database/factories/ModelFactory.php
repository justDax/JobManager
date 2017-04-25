<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use Carbon\Carbon;


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Worker::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'surname' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
});
