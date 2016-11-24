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

$factory->define(App\Confirmation::class, function (Faker\Generator $faker) {
  return [
//    'email' => 'not-specified.'.$faker->unique()->safeEmail,
    'token' => str_random(60),
    'lifetime' => Carbon::now()->addMinute(10),

  ];
});

$factory->state(App\Confirmation::class, 'expired', function ($faker) {
  return [
    'lifetime' => Carbon::now()->subMinutes(10),
  ];
});