<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
  //////////////////////////////////////////////
  // НАСТРОЙКИ
  //////////////////////////////////////////////

  protected $table = 'user_data';


  //////////////////////////////////////////////
  // СВЯЗИ
  //////////////////////////////////////////////

  /**
   * Пользователь, к которому относятся эти персональные данные
   */
  public function user() {
    return $this->belongsTo('App\User');
  }
}
