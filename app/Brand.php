<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  /**
   * Все продукты данного бренда
   */
  public function items()
  {
    return $this->hasMany('App\Item');
  }
}
