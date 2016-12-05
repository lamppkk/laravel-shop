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
//use App\Item;
//
//$factory->define(App\Comment::class, function (Faker\Generator $faker) {
//  $users = User::all();
//  $items = Item::all();
//
//  return [
//    'user_id' => $users->random()->id,
//    'item_id' => $items->random()->id,
//    'text' => $faker->paragraph(rand(1, 3))
//  ];
//});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
  return [
    'text' => $faker->paragraph(rand(1, 3))
  ];
});