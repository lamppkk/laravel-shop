<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Тесты на успешную аутентификацию пользователя.
 *
 * @return void
 */
class SuccessfulLoginTest extends TestCase
{
  use DatabaseTransactions;

  /**
   * Удачный вход с галочкой на чекбоксе "запомнить меня".
   *
   * @return void
   */
  public function testWithRememberCheck()
  {
    $user = factory(\App\User::class)->create(['password' => bcrypt($password = 'secret')]);
    $this->visit('/')
      ->click('Login')
      ->seePageIs('/login')
      ->type($user->email, 'email')
      ->type($password, 'password')
      ->check('remember')
      ->press('Login')
      ->seePageIs('/panel');
  }

  /**
   * Удачный вход без галочки на чекбоксе "запомнить меня".
   *
   * @return void
   */
  public function testWithoutRememberCheck()
  {
    $user = factory(\App\User::class)->create(['password' => bcrypt($password = 'secret')]);
    $this->visit('/')
      ->click('Login')
      ->seePageIs('/login')
      ->type($user->email, 'email')
      ->type($password, 'password')
      ->press('Login')
      ->seePageIs('/panel');
  }
}
