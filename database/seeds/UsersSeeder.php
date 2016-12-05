<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(App\User::class, 10)->create()->each(function ($u) {
      $u->user_data()->save(factory(App\UserData::class)->make());
    });
  }
}
