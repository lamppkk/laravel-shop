<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Carbon\Carbon;

class User extends Authenticatable
{


  //////////////////////////////////////////////
  // НАСТРОЙКИ
  //////////////////////////////////////////////

  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token'
  ];


  //////////////////////////////////////////////
  // ПОДТВЕРЖДЕНИЕ ПОЛЬЗОВАТЕЛЯ
  //////////////////////////////////////////////


  /**
   * Проверка значения поля confirmed (подтвержденный e-mail) у пользователя
   *
   * Вернёт true, если пользователь не подтвердил e-mail (т.е. confirmed = false или 0)
   *
   * @return boolean
   */
  public function notConfirmed()
  {
    $user = self::find($this->id); // только для тестов
    return ($user->confirmed == false) ? true : false; // тут можно было написать просто $this
  }


  /**
   * Проверка значения поля confirmed (подтвержденный e-mail) у пользователя
   *
   * Вернёт true, если пользователь подтвердил e-mail (т.е. confirmed = true или 1)
   *
   * @return boolean
   */
  public function confirmed()
  {
    $user = self::find($this->id); // только для тестов
    return ($user->confirmed == true) ? true : false; // тут можно было написать просто $this
  }


  /**
   * Добавление пользователя в таблицу для подтверждения почты
   *
   * Возвращаем массив с ключом и жизнью ключа (используем данные, чтобы прислать в письме)
   *
   * @return array
   */
  public function scopeAddToConfirmations($query)
  {
    $this->confirmation()->save(new Confirmation([
      'token' => $token = str_random(60),
      'lifetime' => $lifetime = Carbon::now()->addMinute(10)
    ]));
    return $data = ['token' => $token, 'lifetime' => $lifetime];
  }



  //////////////////////////////////////////////
  // СВЯЗИ
  //////////////////////////////////////////////

  /**
   * Таблица с подтверждением почты пользователя
   */
  public function confirmation()
  {
    return $this->hasOne('App\Confirmation', 'email', 'email');
  }

  /**
   * Таблица с персональными данными о пользователе
   */
  public function user_data()
  {
    return $this->hasOne('App\UserData');
  }
}
