<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      'email' => 'admin@project.com',
      'password' => bcrypt('secret'),
      'name' => 'Илья',
      'confirmed' => '1',
      'access' => '-a'
    ]);
  }
}
