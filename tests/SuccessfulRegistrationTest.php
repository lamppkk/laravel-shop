<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Тест на удачную регистрацию пользователя в приложении.
 *
 * @return void
 */
class SuccessfulRegistrationTest extends TestCase
{
  use DatabaseTransactions;

  public function test()
  {
//    $this->expectsEvents(App\Events\UserWasRegistered::class);

    $this->dontSeeInDatabase('users', ['email' => $email = str_random(8) . '@email.com']);

    $this->visit('/')
      ->click('Register')
      ->seePageIs('/register')
      ->type(str_random(4), 'name')
      ->type($email, 'email')
      ->type($password = str_random(6), 'password')
      ->type($password, 'password_confirmation')
      ->press('Register')
      ->seePageIs('/panel/confirmation');

    $this->seeInDatabase('users', ['email' => $email]);
    $this->seeInDatabase('confirmations', ['email' => $email]);
  }
}
