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

$factory->define(App\User::class, function (Faker\Generator $faker) {
  return [
    'email' => $faker->unique()->safeEmail,
    'password' => bcrypt('secret'),
    'name' => $faker->userName,
    'confirmed' => 1,
    'remember_token' => str_random(60),
  ];
});

$factory->state(App\User::class, 'notConfirmed', function ($faker) {
  return [
    'confirmed' => 0,
  ];
});