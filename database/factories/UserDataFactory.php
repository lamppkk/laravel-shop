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

$factory->define(App\UserData::class, function (Faker\Generator $faker) {
  return [
    'lastname' => $faker->lastName,
    'sex' => $faker->randomElement(['male', 'female']),
    'address' => $faker->address
  ];
});