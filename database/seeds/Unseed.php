<?php

use Illuminate\Database\Seeder;

class Unseed extends Seeder
{
  /**
   * Unseed the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    DB::table('available_sizes')->truncate();
    DB::table('brands')->truncate();
    DB::table('categories')->truncate();
    DB::table('colors')->truncate();
    DB::table('color_item')->truncate();
    DB::table('comments')->truncate();
    //
    //
    DB::table('images')->truncate();
    DB::table('items')->truncate();
    //
    //
    DB::table('orders')->truncate();
    DB::table('order_items')->truncate();
    //
    DB::table('seasons')->truncate();
    DB::table('sizes')->truncate();
    DB::table('size_types')->truncate();
    DB::table('size_type_sub_category')->truncate();
    DB::table('size_values')->truncate();
    DB::table('sub_categories')->truncate();
    //
    DB::table('users')->truncate();
    DB::table('user_data')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
  }
}
