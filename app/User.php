<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token'
  ];

  /**
   * Проверка значения поля confirmed (подтвержденный e-mail) у пользователя
   *
   * Вернёт true, если пользователь не подтвердил e-mail (т.е. confirmed = false или 0)
   *
   * @return boolean
   */
  public function NotActive() {
    return ($this->confirmed != true) ? true : false;
  }
}
