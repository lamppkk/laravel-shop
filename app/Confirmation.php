<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
  protected $fillable = ['email', 'token', 'lifetime'];
  public $timestamps = false;
  public $primaryKey = 'email';

  /**
   * Пользователь, к которому относится запись подтверждения
   */
  public function user()
  {
    return $this->belongsTo('App\User', 'email', 'email');
  }
}
