<?php

namespace App\Listeners;

use App\Events\UserWasRegistered;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Confirmation;
use Carbon\Carbon;
use App\Jobs\SendConfirmationEmail;
use Queue;

class UserConfirmation
{
  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   *
   * @param  UserWasRegistered $event
   * @return void
   */
  public function handle(UserWasRegistered $event)
  {
    $user = $event->user;
    $data = $user->addToConfirmations();
    dispatch((new SendConfirmationEmail($user, $data['token'], $data['lifetime']))->delay(1));
  }
}
