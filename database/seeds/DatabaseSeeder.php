<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $this->call(UsersSeeder::class);
    $this->call(CategoriesSeeder::class);
    $this->call(SeasonsTableSeeder::class);
    $this->call(BrandsTableSeeder::class);

    $this->call(ItemsTableSeeder::class);

    $this->call(ColorsSeeder::class);
    $this->call(ImagesTableSeeder::class);
    $this->call(SizesSeeder::class);
    $this->call(CommentsTableSeeder::class);
    $this->call(OrdersSeeder::class);
  }
}
