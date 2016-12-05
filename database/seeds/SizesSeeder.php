<?php

use Illuminate\Database\Seeder;

use App\SizeType;
use App\SizeValue;
use App\SubCategory;
use App\Item;
use App\Size;

class SizesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * !! Зависимости от сидеров: CategoriesSeeder, ItemsTableSeeder !!
   *
   * @return void
   */
  public function run()
  {
    $types = factory(App\SizeType::class, rand(4, 6))->create();
    $values = factory(App\SizeValue::class, rand(15, 20))->create();


    $types = SizeType::all();
    foreach ($types as $type) {
      $inj_values = $values->shuffle()->take(rand(3, 9));
      $type->size_values()->saveMany($inj_values);
    }


    $sub_categories = SubCategory::all();
    foreach ($sub_categories as $sub_category) {
      $inj_types = $types->shuffle()->take(rand(1, 3));
      $sub_category->size_types()->saveMany($inj_types);
    }


    $items = Item::all();
    $sizes = Size::all();

    foreach ($items as $item) {
      $item_size_types = $item->sub_category->size_types;

      $item_sizes = collect([]);
      foreach ($item_size_types as $item_size_type) {
        $item_sizes = $item_sizes->merge(
          $sizes->where('size_type_id', $item_size_type->id)
        );
      }

      $available_sizes = $item_sizes->shuffle()->take(rand(1, 18));
      $item->sizes()->saveMany($available_sizes);
    }
  }
}
