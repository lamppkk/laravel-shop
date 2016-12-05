<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(App\Category::class, 3)->create()->each(function ($u) {
      $u->sub_categories()->saveMany(factory(App\SubCategory::class, 4)->make());
    });
  }
}
