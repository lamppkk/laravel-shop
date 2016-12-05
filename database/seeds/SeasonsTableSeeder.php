<?php

use Illuminate\Database\Seeder;
use App\Season;

class SeasonsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
//    DB::table('seasons')->insert([
//      ['name' => 'Лето'],
//      ['name' => 'Зима'],
//      ['name' => 'Осень/Весна'],
//      ['name' => 'Демисезон']
//    ]);
    Season::create(['name' => 'Лето']);
    Season::create(['name' => 'Зима']);
    Season::create(['name' => 'Осень/Весна']);
    Season::create(['name' => 'Демисезон']);
  }
}
