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

$factory->define(App\SizeValue::class, function (Faker\Generator $faker) {
  $size_values = [
    'XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL',
    '23', '24', '25', '26', '27', '28', '29', '30', '31', '32',
    '142', '146', '150', '154', '156', '158', '160'
  ];

  return [
    'name' => $faker->unique()->randomElement($size_values)
  ];
});