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
    DB::table('users')->insert(
      [
        'email' => 'TrajanPro@mail.ru',
        'password' => bcrypt('PrintScanCopy'),
        'name' => 'Илья', 'access' => '-a'
      ]
    );
  }
}
