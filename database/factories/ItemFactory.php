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

//use App\SubCategory;
//use App\Season;
//use App\Brand;
//
//$factory->define(App\Item::class, function (Faker\Generator $faker) {
//  $sub_categories = SubCategory::all();
//  $seasons = Season::all();
//  $brands = Brand::all();
//
//  return [
//    'price' => rand(300, 15000),
//    'name' => $faker->unique()->words(rand(1, 4), true),
//    'description' => $faker->paragraph(rand(4, 6)),
//    'sub_category_id' => $sub_categories->random()->id,
//    'season_id' => $seasons->random()->id,
//    'brand_id' => $brands->random()->id,
//  ];
//});

$factory->define(App\Item::class, function (Faker\Generator $faker) {
  return [
    'price' => rand(300, 15000),
    'name' => $faker->unique()->words(rand(1, 4), true),
    'description' => $faker->paragraph(rand(4, 6)),
  ];
});