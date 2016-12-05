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

//use App\Order;
//use App\Item;
//
//$factory->define(App\OrderItem::class, function (Faker\Generator $faker) {
//  $orders = Order::all();
//  $items = Item::all();
//
//  return [
//    'order_id' => $orders->random()->id,
//    'item_id' => $items->random()->id,
//    'count' => rand(1, 5)
//  ];
//});

$factory->define(App\OrderItem::class, function (Faker\Generator $faker) {
  return [
    'count' => rand(1, 5)
  ];
});