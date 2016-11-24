<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Тесты на НЕ удачную регистрацию пользователя в приложении.
 *
 * @return void
 */
class NotSuccessfulRegistrationTest extends TestCase
{
  use DatabaseTransactions;

  /**
   * Имя не введено
   *
   * @return void
   */
  public function testNameEmpty()
  {
    $this->visit('/')
      ->click('Register')
      ->seePageIs('/register')
      ->type(str_random(8) . '@email.com', 'email')
      ->type($password = str_random(6), 'password')
      ->type($password, 'password_confirmation')
      ->press('Register')
      ->seePageIs('/register');
  }

  /**
   * E-mail не введен
   *
   * @return void
   */
  public function testEmailEmpty()
  {
    $this->visit('/')
      ->click('Register')
      ->seePageIs('/register')
      ->type(str_random(4), 'name')
      ->type($password = str_random(6), 'password')
      ->type($password, 'password_confirmation')
      ->press('Register')
      ->seePageIs('/register');
  }

  /**
   * E-mail введен не корректно
   *
   * @return void
   */
  public function testEmailIncorrect()
  {
    $this->visit('/')
      ->click('Register')
      ->seePageIs('/register')
      ->type(str_random(4), 'name')
      ->type(str_random(8), 'email')
      ->type($password = str_random(6), 'password')
      ->type($password, 'password_confirmation')
      ->press('Register')
      ->seePageIs('/register');
  }

  /**
   * E-mail уже существует
   *
   * @return void
   */
  public function testEmailAlreadyUse()
  {
    $user = factory(\App\User::class)->create();
    $email = DB::table('users')->first()->email;

    $this->visit('/')
      ->click('Register')
      ->seePageIs('/register')
      ->type(str_random(4), 'name')
      ->type($email, 'email')
      ->type($password = str_random(6), 'password')
      ->type($password, 'password_confirmation')
      ->press('Register')
      ->seePageIs('/register');
  }

  /**
   * Пароль пустой
   *
   * @return void
   */
  public function testPasswordEmpty()
  {
    $this->visit('/')
      ->click('Register')
      ->seePageIs('/register')
      ->type(str_random(4), 'name')
      ->type(str_random(8) . '@email.com', 'email')
      ->press('Register')
      ->seePageIs('/register');
  }

  public function testPasswordEmptyWithoutConfirmation()
  {
    $this->visit('/')
      ->click('Register')
      ->seePageIs('/register')
      ->type(str_random(4), 'name')
      ->type(str_random(8) . '@email.com', 'email')
      ->type(str_random(6), 'password_confirmation')
      ->press('Register')
      ->seePageIs('/register');
  }

  /**
   * Пароль слишком короткий
   *
   * @return void
   */
  public function testPasswordTooShort()
  {
    $this->visit('/')
      ->click('Register')
      ->seePageIs('/register')
      ->type(str_random(4), 'name')
      ->type(str_random(8) . '@email.com', 'email')
      ->type($password = str_random(5), 'password')
      ->type($password, 'password_confirmation')
      ->press('Register')
      ->seePageIs('/register');
  }

  /**
   * Пароль не подтвержден
   *
   * @return void
   */
  public function testPasswordNotConfirmed()
  {
    $this->visit('/')
      ->click('Register')
      ->seePageIs('/register')
      ->type(str_random(4), 'name')
      ->type(str_random(8) . '@email.com', 'email')
      ->type(str_random(6), 'password')
      ->type(str_random(6), 'password_confirmation')
      ->press('Register')
      ->seePageIs('/register');
  }
}
