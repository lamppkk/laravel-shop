<?php

use Illuminate\Database\Seeder;

use App\Item;
use App\Color;

class ColorsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * !! Зависимости от сидеров: ItemsTableSeeder !!
   *
   * @return void
   */
  public function run()
  {
    factory(App\Color::class, 10)->create();

    $items = Item::all();
    $colors = Color::all();
    foreach ($items as $item) {
      $item->colors()->saveMany($colors->shuffle()->take(rand(1, 10)));
    }
  }
}
