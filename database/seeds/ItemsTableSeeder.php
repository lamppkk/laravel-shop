<?php

use Illuminate\Database\Seeder;

use App\SubCategory;
use App\Season;
use App\Brand;

class ItemsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * !! Зависимости от сидеров: CategoriesSeeder, SeasonsTableSeeder, BrandsTableSeeder !!
   *
   * @return void
   */
  public function run()
  {
//    factory(App\Item::class, 20)->create();

    $items = factory(App\Item::class, 20)->make();

    $sub_categories = SubCategory::all();
    $seasons = Season::all();
    $brands = Brand::all();
    foreach ($items as $item) {
      $item->sub_category_id = $sub_categories->random()->id;
      $item->season_id = $seasons->random()->id;
      $item->brand_id = $brands->random()->id;
      $item->save();
    }
  }
}
