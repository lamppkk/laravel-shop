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

//use App\User;
//
//$factory->define(App\Order::class, function (Faker\Generator $faker) {
//  $users = User::all();
//
//  $status = ['not_paid', 'paid'];
//  return [
//    'status' => $faker->randomElement($status),
//    'user_id' => $users->random()->id
//  ];
//});

$factory->define(App\Order::class, function (Faker\Generator $faker) {
  $status = ['not_paid', 'paid'];
  return [
    'status' => $faker->randomElement($status)
  ];
});