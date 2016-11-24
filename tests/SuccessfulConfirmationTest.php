<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Jobs\SendConfirmationEmail;

/**
 * Тесты на успешное подтверждение почты пользователя.
 *
 * @return void
 */
class SuccessfulConfirmationTest extends TestCase
{
  use DatabaseTransactions;

  /**
   * Тест на подтверждение почты пользователя
   *
   * Без учета истекания срока жизни ключа
   *
   * @return void
   */
  public function testMain()
  {
    // Создаем условия пользователя, ожидающего письмо
    $user = factory(\App\User::class)->states('notConfirmed')->create();
    $user->addToConfirmations();
//    $confirmation = factory(\App\Confirmation::class)->create(['email' => $user->email]); // так тоже можно

    $this->actingAs($user)
      ->visit('/panel')
      ->seePageIs('/panel/confirmation')
      ->see('секунд')
      ->seeInDatabase('confirmations', ['email' => $user->email]);

    // пользователь кликнул по ссылке в письме
    $this->visit('/panel/confirmation/user/' . $user->id . '/token/' . $user->confirmation->token)
      ->seePageIs('panel');
    $this->dontSeeInDatabase('confirmations', ['email' => $user->email]);
  }

  /**
   * Тест на подтверждение почты пользователя
   *
   * Без учета истекания срока жизни ключа
   *
   * @return void
   */
  public function testTokenExpired()
  {
    // Ожидаем во время выполнения теста вызова отправки письма на почту пользователю
    $this->expectsJobs(SendConfirmationEmail::class);

    // Создаем условия пользователя, ожидающего письмо, но прождавшего слишком долго, из-за чего ключ истек
    $user = factory(\App\User::class)->states('notConfirmed')->create();
    $confirmation = factory(\App\Confirmation::class)->states('expired')->create(['email' => $user->email]); // истекший
//    $user->addToConfirmations(); // создает не истекший
//    $confirmation = factory(\App\Confirmation::class)->create(['email' => $user->email]); // так тоже можно (не истекший)

    $this->seeInDatabase('confirmations', ['email' => $user->email])
      ->actingAs($user)
      ->visit('/panel')
      ->seePageIs('/panel/confirmation')
      ->see('повторно')
      ->dontSeeInDatabase('confirmations', ['email' => $user->email])
      ->press('submit')
      ->seeInDatabase('confirmations', ['email' => $user->email]);

    // пользователь кликнул по ссылке в письме
    $this->visit('/panel/confirmation/user/' . $user->id . '/token/' . $user->confirmation->token)
      ->seePageIs('panel');
    $this->dontSeeInDatabase('confirmations', ['email' => $user->email]);
  }
}
