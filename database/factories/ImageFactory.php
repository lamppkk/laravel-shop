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

//use App\Item;
//
//$factory->define(App\Image::class, function (Faker\Generator $faker) {
//  $items = Item::all();
//
//  return [
//    'link' => $faker->unique()->imageUrl(200, 200, 'technics'),
//    'alt' => $desc = $faker->sentence(),
//    'title' => $desc,
//    'item_id' => $items->random()->id
//  ];
//});

$factory->define(App\Image::class, function (Faker\Generator $faker) {
  return [
    'link' => $faker->unique()->imageUrl(200, 200, 'technics'),
    'alt' => $desc = $faker->sentence(),
    'title' => $desc
  ];
});