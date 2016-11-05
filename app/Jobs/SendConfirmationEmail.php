<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Carbon\Carbon;
use Mail;

class SendConfirmationEmail implements ShouldQueue
{
  use InteractsWithQueue, Queueable, SerializesModels;

  /**
   * @var User
   */
  protected $user;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(User $user)
  {
    $this->user = $user;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    $time = Carbon::now()->toTimeString();
    $user = $this->user;
    Mail::send('emails.test', ['time' => $time], function ($m) use ($user) {
      $m->from('shop@email.ru', 'Title From');
      $m->to($user->email, $user->name)->subject('Title Subject');
    });
  }
}
