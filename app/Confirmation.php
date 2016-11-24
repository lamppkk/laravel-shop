<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
  protected $fillable = ['email', 'token', 'lifetime'];
  public $timestamps = false;
  public $primaryKey = 'email';

  /**
   * Таблица с подтверждением почты пользователя
   *
   * Связь один к одному с таблицей Confirmations
   *
   * @return HasOne
   */
  public function user() {
    return $this->hasOne('App\User', 'email', 'email');
  }
}
