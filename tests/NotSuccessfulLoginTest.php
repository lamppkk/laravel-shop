<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Тесты на НЕ успешную аутентификацию пользователя.
 *
 * @return void
 */
class NotSuccessfulLoginTest extends TestCase
{
  use DatabaseTransactions;

  /**
   * E-mail пустой
   *
   * @return void
   */
  public function testEmailEmpty()
  {
    $user = factory(\App\User::class)->create(['password' => bcrypt($password = 'secret')]);
    $this->visit('/')
      ->click('Login')
      ->seePageIs('/login')
      ->type($password, 'password')
      ->check('remember')
      ->press('Login')
      ->seePageIs('/login');
  }

  /**
   * E-mail не корректный
   *
   * @return void
   */
  public function testEmailIncorrect()
  {
    $user = factory(\App\User::class)->create(['password' => bcrypt($password = 'secret')]);
    $this->visit('/')
      ->click('Login')
      ->seePageIs('/login')
      ->type(str_random(18), 'email')
      ->type($password, 'password')
      ->check('remember')
      ->press('Login')
      ->seePageIs('/login');
  }

  /**
   * E-mail не существует в базе данных
   *
   * @return void
   */
  public function testEmailWrong()
  {
    $user = factory(\App\User::class)->create(['password' => bcrypt($password = 'secret')]);
    $this->visit('/')
      ->click('Login')
      ->seePageIs('/login')
      ->type(str_random(8).'@email.com', 'email')
      ->type($password, 'password')
      ->check('remember')
      ->press('Login')
      ->seePageIs('/login');
  }

  /**
   * Пароль пустой
   *
   * @return void
   */
  public function testPasswordEmpty()
  {
    $user = factory(\App\User::class)->create();
    $this->visit('/')
      ->click('Login')
      ->seePageIs('/login')
      ->type($user->email, 'email')
      ->check('remember')
      ->press('Login')
      ->seePageIs('/login');
  }

  /**
   * Пароль не подходит
   *
   * @return void
   */
  public function testPasswordWrong()
  {
    $user = factory(\App\User::class)->create(['password' => bcrypt($password = 'secret')]);
    $this->visit('/')
      ->click('Login')
      ->seePageIs('/login')
      ->type($user->email, 'email')
      ->type(str_random(6), 'password')
      ->check('remember')
      ->press('Login')
      ->seePageIs('/login');
  }
}
