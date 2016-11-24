<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use Mail;

class SendConfirmationEmail implements ShouldQueue
{
  use InteractsWithQueue, Queueable, SerializesModels;

  /**
   * Модель пользователя, которому отправляем письмо
   *
   * @var User
   */
  protected $user;

  /**
   * Ключ подтверждения почты пользователя
   *
   * @var string
   */
  protected $token;

  /**
   * Время смерти ключа
   *
   * @var string
   */
  protected $lifetime;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(User $user, $token, $lifetime)
  {
    $this->user = $user;
    $this->token = $token;
    $this->lifetime = $lifetime;
  }


  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    $user = $this->user;
    $token = $this->token;
    $lifetime = $this->lifetime;

    Mail::send('emails.test', ['id' => $user->id, 'token' => $token, 'lifetime' => $lifetime], function ($m) use ($user) {
      $m->from('laravel-shop@email.ru', 'From Laravel-Shop');
      $m->to($user->email, $user->name)->subject('Email Confirmation');
    });
  }
}
