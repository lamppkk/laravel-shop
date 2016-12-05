<?php

use Illuminate\Database\Seeder;

use App\Item;

class ImagesTableSeeder extends Seeder
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
//    factory(App\Image::class, 20)->create();

    $images = factory(App\Image::class, 20 + 10)->make();

    $items = Item::all();
    foreach ($images as $image) {
      $image->item_id = $items->random()->id;
      $image->save();
    }
  }
}
