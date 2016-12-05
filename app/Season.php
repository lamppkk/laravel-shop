<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
  /**
   * Все продукты данного сезона
   */
  public function items()
  {
    return $this->hasMany('App\Item');
  }
}
